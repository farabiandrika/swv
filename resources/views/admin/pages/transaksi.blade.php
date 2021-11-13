@extends('admin.layouts.main')

@section('transaksi-nav', 'active open')

@section('title', 'Transaksi')

@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="body">
                <div class="table-responsive">
                    <table id="transaksi-table" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pembeli</th>
                                <th>Resi</th>
                                <th>Status</th>
                                {{-- <th>Item</th> --}}
                                <th>Total</th>
                                <th>Waktu</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Pembeli</th>
                                <th>Resi</th>
                                <th>Status</th>
                                {{-- <th>Item</th> --}}
                                <th>Total</th>
                                <th>Waktu</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <div class="modal fade" id="konfirmPembayaran" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="editModalLabel">Konfirmasi Pembayaran</h4>
                </div>
                <form id="pembayaran">
                <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="no_resi">No. Resi</label>
                            <input type="text" required class="form-control" name="no_resi" required id="no_resi">
                            <input type="hidden" name="id_transaksi" required id="id_transaksi">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-round waves-effect">Save</button>
                        <button type="button" class="btn btn-danger btn-simple btn-round waves-effect" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="detail" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="editModalLabel">Detail INV-<span id="invoiceNumber"></span></h4>
                </div>
                <div class="modal-body">
                    <form id="detailInfo">
                        @csrf
                        <input type="hidden" name="id_transaksi">
                        <div class="form-group">
                            <label for="nama_pembeli">Nama Pembeli</label>
                            <input type="text" class="form-control" disabled required id="nama_pembeli">
                        </div>
                        <div class="form-group">
                            <label for="total">Total</label>
                            <input type="text" class="form-control" disabled required id="total">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" disabled required id="status">
                        </div>
                        <div class="form-group">
                            <label for="ekspedisi">Ekspedisi</label>
                            <input type="text" disabled class="form-control" required id="ekspedisi">
                        </div>
                        <div class="form-group">
                            <label for="resi">Resi</label>
                            <input type="text" class="form-control" name="resi" required id="resi">
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <input type="text" class="form-control" disabled required id="address">
                        </div>
                        <div id="bukti_bayar">

                        </div>
                        <div id="item" class="mt-3">
                            <span>Item</span>
                            <ul id="itemGroup">

                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-round waves-effect">Save</button>
                        <button type="button" class="btn btn-danger btn-simple btn-round waves-effect" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function() {
            $('#transaksi-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{url('/api/getTransaction')}}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'user.name', name: 'user.name'},
                    {data: 'resi', name: 'resi'},
                    {data: 'status_convert', name: 'status_convert'},
                    // {data: 'item', name: 'item'},
                    {data: 'total_rp', name: 'total_rp'},
                    {data: 'waktu', name: 'waktu'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

        })
        $(document).on('click','.konfirmPembayaran',function(e) {
            e.preventDefault()
            let id = $(this).data("id")
            console.log(id)
            $('#id_transaksi').val(id)
            $('#konfirmPembayaran').modal('toggle')
        })

        $('#pembayaran').submit(function(e) {
            e.preventDefault();

            $.ajax({
                method: "POST",
                url: "{{url('/api/updateResi')}}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: $(this).serialize(),
                dataType: 'JSON',
                error: function(xhr, status, error) {
                    for (variable in xhr.responseJSON.data) {
                      toastr.error(xhr.responseJSON.data[variable])
                  }
                },
                success: function(response){
                    $('#transaksi-table').DataTable().ajax.reload();
                    $('#konfirmPembayaran').modal('toggle')
                    $('form#pembayaran').trigger('reset')
                    toastr.success("Berhasil update resi")
                }
            })
        })

        $(document).on('click','.detail', function(e) {
            e.preventDefault()
            let id = $(this).data("id")
            console.log(id)
            $.get("{{ url('/api/transaction') }}" +'/' + id, function (response) {
                console.log(response)
                let str = "" + response.data.id
                let pad = "000000"
                let ans = pad.substring(0, pad.length - str.length) + str
                $('#invoiceNumber').text(ans)
                
                $('form#detailInfo input[id="id_transaksi"]').val(response.data.id)
                $('form#detailInfo input[id="nama_pembeli"]').val(`${response.data.user.name} - ${response.data.user.phone != null ? response.data.user.name : ''}`)
                $('form#detailInfo input[id="total"]').val(response.data.total)
                $('form#detailInfo input[id="status"]').val(response.data.status == 0 ? (response.data.bukti_bayar != null ? 'Sudah bayar' : 'Pending') : (response.data.status == 1 ? 'Dikirim' : 'Sukses'))
                $('form#detailInfo input[id="ekspedisi"]').val(response.data.ekspedisi)
                $('form#detailInfo input[id="resi"]').val(response.data.resi)
                if (response.data.status == 2) {
                    $('form#detailInfo input[id="resi"]').prop('disabled', true)
                } else {
                    $('form#detailInfo input[id="resi"]').prop('disabled', false)
                }
                $('form#detailInfo input[id="address"]').val(response.data.address)

                let buktiBayar = `<span>Bukti Bayar</span><br><img src="/bukti_bayar/${response.data.bukti_bayar}" style="width:300px;"></img>`
                $('div#bukti_bayar').html(buktiBayar)

                response.data.carts.forEach(cart => {
                    let cartElm = `<li>${cart.catalogue.name} - ${cart.catalogue.price * cart.quantity} (${cart.quantity} pcs)</li>`
                    $('#itemGroup').append(cartElm)
                });

            })
        })

        $('#detailInfo').submit(function(e) {
            e.preventDefault();

            $.ajax({
                method: "POST",
                url: "{{url('/api/updateResi')}}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: $(this).serialize(),
                dataType: 'JSON',
                error: function(xhr, status, error) {
                    for (variable in xhr.responseJSON.data) {
                      toastr.error(xhr.responseJSON.data[variable])
                  }
                },
                success: function(response){
                    $('#transaksi-table').DataTable().ajax.reload();
                    $('#konfirmPembayaran').modal('toggle')
                    $('form#pembayaran').trigger('reset')
                    toastr.success("Berhasil update resi")
                }
            })
        })

        $('#detail').on('hidden.bs.modal', function (e) {
            $('#bukti_bayar').html('')
            $('#itemGroup').html('')            
        })
    </script>
@endsection