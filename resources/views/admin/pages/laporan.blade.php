@extends('admin.layouts.main')

@section('laporan-nav', 'active open')

@section('title', 'Laporan Penjualan')

@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="body">
                <form id="laporan">
                    <div class="form-group">
                        <label for="month">Pilih Bulan</label>
                        <input id="month" autocomplete="off" name="month" required class="form-control disabled" type="text" />
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Find</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card" id="cardLaporan" style="display: none;">
            <div class="body">
                <h3>Laporan Penjualan</h3>
                <div class="table-responsive">
                    <table id="laporan-table" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Product</th>
                                <th>Penjualan</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Product</th>
                                <th>Penjualan</th>
                                <th>Total</th>
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

@section('css')
<link rel="stylesheet" href="{{ asset('admins/assets/css/MonthPicker.css') }}" />
@endsection

@section('js')
    <script src="{{ asset('admins/assets/js/MonthPicker.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#month').MonthPicker({ Button: false });
        })

        $('#laporan').submit(function(e) {
            e.preventDefault()
            $('#cardLaporan').css('display', 'block');
            $('#laporan-table').dataTable().fnClearTable();
            $('#laporan-table').dataTable().fnDestroy();
            $('#laporan-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    type: "POST",
                    url: "{{ route('getLaporan') }}",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        month: $('#month').val(),
                    },
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'totalPembelian', name: 'totalPembelian'},
                    {data: 'totalHarga', name: 'totalHarga'},
                ]
            });

            // $.ajax({
            //     method: "POST",
            //     url: "{{route('getLaporan')}}",
            //     headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            //     data: $(this).serialize(),
            //     dataType: 'JSON',
            //     error: function(xhr, status, error) {
            //         for (variable in xhr.responseJSON.data) {
            //             toastr.error(xhr.responseJSON.data[variable])
            //         }
            //     },
            //     success: function(response){
            //         console.log(response)
                    
            //     }
            // })
        })
    </script>
@endsection