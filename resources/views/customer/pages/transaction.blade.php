@extends('customer.layouts.layout')

@section('title')
{{ config('company.configs') !== null ? config('company.configs')->name : '' }}
@endsection

@section('content')
<!--== Start Product Area Wrapper ==-->
<section class="product-area shopping-cart-area">
  <div class="container">
    <h1 class="text-center">Transaction History</h1>
    <div class="row mt-5 mb-5">
      <div class="col-12">
        <div class="shopping-cart-wrap">
          <div class="cart-table table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th class="indecor-product-thumbnail">No Resi</th>
                  <th class="indecor-product-thumbnail">Invoice</th>
                  <th class="indecor-product-name">Product</th>
                  <th class="indecor-product-price">Total</th>
                  <th class="indecor-product-subtotal">Status</th>
                  <th class="indecor-product-thumbnail">Action</th>
                </tr>
              </thead>
              <tbody>
                @if (auth()->user()->transactions->isEmpty())    
                <tr>
                  <td colspan="6">No Transaction</td>
                </tr>
                @else
                @foreach (auth()->user()->transactions as $transaction)
                <tr>
                  <td class="indecor-product-thumbnail">
                    {{ $transaction->resi }}
                  </td>
                  <td class="indecor-product-thumbnail">
                    INV-{{ str_pad($transaction->id, 6, '0', STR_PAD_LEFT) }}
                  </td>
                  <td class="indecor-product-name">
                    <ul style="margin-bottom: -2px;">
                      @foreach ($transaction->carts as $key => $item)
                          <li>
                            {{ $key+1 }}. {{ $item->catalogue->name }}, Rp. {{ number_format($item->quantity * $item->catalogue->price,0,',','.') }} ({{ $item->quantity }} pcs)
                          </li>
                      @endforeach
                    </ul>
                  </td>
                  <td class="indecor-product-price"><span class="price">Rp. {{ number_format($transaction->total,0,',','.') }}</span></td>
                  <td>
                    <button class="btn btn-sm {{ $transaction->status == 0 ? "btn-danger" : "btn-success" }}"><span class="text-white">{{ $transaction->status == 0 ? 'Pending' : ($transaction->status == 1 ? 'Dikirim' : 'Sukses') }}</span></button>
                  </td>
                  <td class="indecor-product-quantity">
                    @if ($transaction->status === 0)
                    <button data-id="{{ $transaction->id }}" class="btn cancelTransaction btn-danger btn-sm">
                      <i class="fa fa-trash"></i>
                    </button>
                    @endif
                    @if ($transaction->status === 0 && $transaction->bukti_bayar == null)
                    <a class="add-quick-view btn btn-info btn-sm" data-id="{{ $transaction->id }}" href="javascript:void(0);">
                      <i class="zmdi zmdi-search icon"></i>
                    </a>
                    <!--== Start Quick View Menu ==-->
                    <aside class="product-quick-view-modal" id="qv-{{ $transaction->id }}">
                      <div class="product-quick-view-inner">
                        <div class="product-quick-view-content">
                          <button type="button" class="btn-close">
                            <span class="close-icon"><i class="fa fa-close"></i></span>
                          </button>
                          <div class="row">
                            <div class="my-2 col-lg-12 col-md-12 col-12">
                              <div class="thumb">
                                <h3>Upload Bukti Bayar</h3>
                              </div>
                            </div>
                            <form class="uploadBuktiBayar" data-id="{{ $transaction->id }}">
                            <div class="my-2 col-lg-12 col-md-12 col-12">
                              <input accept="image/*" class="form-control" name="bukti_bayar" required type="file">
                            </div>
                            <div class="my-2 col-lg-12 col-md-12 col-12">
                              <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="canvas-overlay"></div>
                    </aside>
                    <!--== End Quick View Menu ==-->
                    @elseif ($transaction->status == 1)
                    <a class="btn terimaBarang btn-info btn-sm" data-id="{{ $transaction->id }}" href="javascript:void(0);">
                      <i class="zmdi zmdi-check icon"></i>
                    </a>
                    @endif
                    <a class="btn btn-success btn-sm" target="_blank" href="https://wa.me/{{ config('company.configs') != null ? config('company.configs')->phone : '' }}">
                      <i class="fa fa-phone"></i>
                    </a>
                  </td>
                </tr>
                @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--== End Product Area Wrapper ==-->
@endsection

@section('js')
<script>
  $(document).ready(function(e) {
    $('.cancelTransaction').on('click', function(e) {
      e.preventDefault();
      const id = $(this).data('id')
      
      swal({
                title: "Are you sure?",
                text: "You will not be able to recover this transaction!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm){
                if (isConfirm) {
                    $.ajax({
                            url: "{{ url('/api/transaction') }}" + "/" + id,
                            type: 'DELETE',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            error: function(xhr, status, error) {
                                for (variable in xhr.responseJSON.data) {
                                    toastr.error(xhr.responseJSON.data[variable])
                                }
                            },                          
                            success: function (response){
                                console.log(response)
                            }
                        });
                        location.reload();
                    swal.close()
                } else {
                    swal.close()
                }
            });
    })

    $('.uploadBuktiBayar').submit(function(e) {
      e.preventDefault()
      let id = $(this).data('id')

      let frm = $(this);
      let formData = new FormData(frm[0]);

      formData.append('file', $('input[type=file]')[0].files[0]);

      $.ajax({
          method: "POST",
          url: "{{ url('/api/transaction') }}" + "/" + id + '/update',
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          data: formData,
          dataType: 'JSON',
          processData: false,
          contentType: false,
          error: function(xhr, status, error) {
              for (variable in xhr.responseJSON.data) {
                toastr.error(xhr.responseJSON.data[variable])
            }
          },
          success: function(response){
              console.log(response)
              location.reload()
          }
      })
    })

    $('.terimaBarang').on('click', function(e) {
      e.preventDefault()
      const id = $(this).data('id')
      
      swal({
                title: "Barang telah diterima?",
                text: "Pastikan barang telah diterima!",
                type: "success",
                showCancelButton: true,
                confirmButtonColor: "#198754",
                confirmButtonText: "Pesanan Sudah Diterima!",
                cancelButtonText: "Cancel!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm){
                if (isConfirm) {
                    $.ajax({
                            url: "{{ url('/api/transaction') }}" + "/" + id + "/diterima",
                            type: 'PUT',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            error: function(xhr, status, error) {
                                for (variable in xhr.responseJSON.data) {
                                    toastr.error(xhr.responseJSON.data[variable])
                                }
                            },                          
                            success: function (response){
                              location.reload();
                            }
                        });
                    swal.close()
                } else {
                    swal.close()
                }
            });
    })
  })
</script>
@endsection