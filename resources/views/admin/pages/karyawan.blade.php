@extends('admin.layouts.main')

@section('karyawan-nav', 'active open')

@section('title', 'Management Karyawan')

@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header align-right">
                <a href="javascript:;" aria-modal="true" data-toggle="modal" data-target="#addKaryawan" type="button" class="btn btn-primary">Tambah Karyawan</a>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table id="karyawan-table" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
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
    <!-- Edit Karyawan -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="editModalLabel">Edit Karyawan</h4>
                </div>
                <div class="modal-body">
                    <form id="editKaryawan">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="name" required id="name">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" onkeyup="nospaces(this)" name="username" required id="username">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email">
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

    {{-- Tambah Karyawan --}}
    <div class="modal fade" id="addKaryawan" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="addKaryawanLabel">Tambah Karyawan</h4>
                </div>
                <div class="modal-body">
                    <form id="addKaryawan">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" class="form-control" name="name" required id="name">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" onkeyup="nospaces(this)" name="username" required id="username">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-round waves-effect">Tambah</button>
                        <button type="button" class="btn btn-danger btn-simple btn-round waves-effect" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#karyawan-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{route('karyawan.index')}}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'username', name: 'username'},
                    {data: 'email', name: 'email'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

        })

        $(document).on('click','.edit',function() {
            let id = $(this).data("id")
            $('form#editKaryawan').data("id", id)

            $.get("{{ url('/api/karyawan') }}" +'/' + id, function (response) {
                $('#modal-edit').modal('toggle')
                console.log(response)
                $('form#editKaryawan input[name="name"]').val(response.data.name)
                $('form#editKaryawan input[name="username"]').val(response.data.username)
                $('form#editKaryawan input[name="email"]').val(response.data.email)
            })
        })

        // DELETE karyawan
        $(document).on('click', '.delete', function(e) {
            e.preventDefault()
            let id = $(this).data("id")

            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
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
                            url: "{{ url('/api/karyawan') }}" + "/" + id,
                            type: 'DELETE',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            error: function(xhr, status, error) {
                                for (variable in xhr.responseJSON.data) {
                                    toastr.error(xhr.responseJSON.data[variable])
                                }
                            },                          
                            success: function (response){
                                console.log(response)
                                $('#karyawan-table').DataTable().ajax.reload();
                                toastr.success('Berhasil menghapus karyawan')
                            }
                        });
                    swal.close()
                } else {
                    swal.close()
                }
            });
        })

        // ADD Karyawan
        $('form#addKaryawan').submit(function(e) {
            e.preventDefault()

            $.ajax({
                method: "POST",
                url: "{{route('karyawan.store')}}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: $(this).serialize(),
                dataType: 'JSON',
                error: function(xhr, status, error) {
                    for (variable in xhr.responseJSON.data) {
                        toastr.error(xhr.responseJSON.data[variable])
                    }
                },
                success: function(response){
                    $('#karyawan-table').DataTable().ajax.reload();
                    $('#addKaryawan').modal('toggle')
                    $('form#addKaryawan').trigger('reset')
                    toastr.success("Berhasil menambahkan karyawan")
                }
            })
        })

        // UPDATE PROJECt
        $('form#editKaryawan').submit(function(e){
            e.preventDefault()
            let id = $(this).data('id')

            $.ajax({
                method: "PUT",
                url: "{{ url('/api/karyawan') }}" + "/" + id,
                data: $(this).serialize(),
                dataType: 'JSON',
                error: function(xhr, status, error) {
                    for (variable in xhr.responseJSON.data) {
                        toastr.error(xhr.responseJSON.data[variable])
                    }
                },
                success: function(response){
                    $('#karyawan-table').DataTable().ajax.reload();
                    $('#editModal').modal('toggle')
                    $('#editKaryawan').trigger("reset");
                    toastr.success('Berhasil mengupdate karyawan')
                }
            })
        })
    </script>
@endsection