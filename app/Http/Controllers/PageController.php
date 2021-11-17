<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use App\Models\Transaction;
use App\Models\User;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PageController extends Controller
{
    public function index() {
        $products = Catalogue::where('isActive', 1)->with('images')->get();
        return view('customer.pages.index', compact('products'));
    }

    public function checkout() {
        if (auth()->user()->carts->isEmpty()) {
            abort(404);
        }
        return view('customer.pages.checkout');
    }

    public function forgot()
    {
        return view('auth.forget');
    }

    public function resetPassword(Request $request)
    {
        $user = User::orWhere('username', $request->username)->orWhere('email', $request->username)->first();
        
        if (!$user) {
            Alert::error('Error','Username or Email not found');
            return redirect()->back();
        }

        $user->update([
            'password' => $request->username,
        ]);

        Alert::success('Berhasil', 'Harap login menggunakan password berupa email/username anda');
        return redirect('/login');
    }

    public function processCheckout(Request $request) {
        try {
            $error_msg = collect();
            $subtotal = 0;
            $transaction = Transaction::create([
                'user_id' => auth()->user()->id,
                'total' => $subtotal,
                'ekspedisi' => $request->ekspedisi,
                'address' => $request->address
            ]);
            
            foreach (auth()->user()->carts as $key => $cart) {
                if ($cart->catalogue->stock >= $cart->quantity) {
                    $cart->catalogue->stock -= $cart->quantity;
                    $cart->catalogue->save();
                    $cart->transaction_id = $transaction->id;
                    $cart->status = 1;
                    $cart->save();
                    $subtotal += $cart->quantity * $cart->catalogue->price;
                } else {
                    $error_msg->push($cart->catalogue->name. ' stock tidak cukup');
                }
            }

            $transaction->total = $subtotal;
            $transaction->save();

            if (!empty($error_msg)) {
                Alert::success('Berhasil Checkout', 'Harap hubungi admin setelah melakukan pembayaran');
            } else {
                Alert::warning('Berhasil Checkout', $error_msg);
            }

            return redirect('/transaction');
        } catch (QueryException $e) {
            Alert::error('Error', $e->errorInfo);
            return redirect()->back();
        }
    }

    public function transaction() {
        return view('customer.pages.transaction');
    }

    public function product(Request $request) {
        if ($request->page && $request->page <= 0) {
            abort(404);
        }
        $page = $request->page == null ? 1 : $request->page;
        $limit = 20;
        $offset = ($page*$limit)-$limit;

        $totalRow = Catalogue::all()->count();

        $products = Catalogue::offset($offset)->limit($limit)->with('images')->get(); 
        $currentPage = $page;
        $nextPage = $page+1;
        $prevPage = $page-1;
        $totalPage = ceil($totalRow / $limit);

        if ($request->page && $request->page > $totalPage) {
            abort(404);
        }

        return view('customer.pages.product', compact('products', 'currentPage', 'nextPage', 'prevPage', 'totalPage'));
    }

    public function detail($slug) {
        try {
            $product = Catalogue::where('slug',$slug)->where('isActive', 1)->first();

            return view('customer.pages.detail', compact('product'));
        } catch (QueryException $e) {
            Alert::error('Error', $e);
            return redirect()->back();
        }
    }

    public function profile()
    {
        return view('customer.pages.profile');
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,'.auth()->user()->id,
            'username' => 'required|string|unique:users,username,'.auth()->user()->id,
            'address' => 'required',
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', $validator->errors());
            return redirect()->back();
        }

        $user = User::findOrFail(auth()->user()->id);
        $user->update($validator->validated());
        
        if($request->password || $request->password != '') {
            $validator1 = Validator::make($request->all(), [
                'password' => 'required|confirmed',
            ]);

            if ($validator->fails()) {
                Alert::error('Gagal', $validator1->errors());
                return redirect()->back();
            }

            $user->update($validator1->validated());
        }

        Alert::success("Berhasil", 'Berhasil update profile');
        return redirect('/profile');
    }
}
