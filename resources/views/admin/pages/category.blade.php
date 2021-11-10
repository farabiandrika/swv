@extends('admin.layouts.main')

@section('category-nav', 'active open')

@section('title', 'Management Category')

@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header align-right">
                <a href="javascript:;" aria-modal="true" data-toggle="modal" data-target="#addCategory" type="button" class="btn btn-primary">Tambah Category</a>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table id="category-table" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Category</th>
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
    <!-- Edit Project -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="editModalLabel">Edit Project</h4>
                </div>
                <div class="modal-body">
                    <form id="editCategory">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama">Nama Project</label>
                            <input type="text" class="form-control" name="nama" required id="nama">
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

    {{-- Tambah Project --}}
    <div class="modal fade" id="addCategory" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="addCategoryLabel">Add Project</h4>
                </div>
                <div class="modal-body">
                    <form id="addCategory">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Category</label>
                            <input type="text" class="form-control" name="nama" required id="nama">
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
            $('#category-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{route('category.index')}}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'nama', name: 'nama'},
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
            let nama = $(this).data("nama")
            
            $('form#editCategory').data("id", $(this).data('id'))
            $('form#editCategory input[name="nama"]').val(nama)
        })

        // DELETE category
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
                            url: "{{ url('/api/category') }}" + "/" + id,
                            type: 'DELETE',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            error: function(xhr, status, error) {
                                for (variable in xhr.responseJSON.data) {
                                    toastr.error(xhr.responseJSON.data[variable])
                                }
                            },                          
                            success: function (response){
                                console.log(response)
                                $('#category-table').DataTable().ajax.reload();
                                toastr.success('Berhasil menghapus category')
                            }
                        });
                    swal.close()
                } else {
                    swal.close()
                }
            });
        })

        // ADD category
        $('form#addCategory').submit(function(e) {
            e.preventDefault()

            $.ajax({
                method: "POST",
                url: "{{route('category.store')}}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: $(this).serialize(),
                dataType: 'JSON',
                error: function(xhr, status, error) {
                    if (typeof xhr.responseJSON.nama !== 'undefined') {
                        toastr.error(xhr.responseJSON.nama)
                    }
                },
                success: function(response){
                    $('#category-table').DataTable().ajax.reload();
                    $('#addCategory').modal('toggle')
                    $('form#addCategory').trigger('reset')
                    toastr.success("Berhasil menambahkan category")
                }
            })
        })

        // UPDATE PROJECt
        $('form#editCategory').submit(function(e){
            e.preventDefault()
            let id = $(this).data('id')

            $.ajax({
                method: "PUT",
                url: "{{ url('/api/category') }}" + "/" + id,
                data: $(this).serialize(),
                dataType: 'JSON',
                error: function(xhr, status, error) {
                    if (typeof xhr.responseJSON.nama !== 'undefined') {
                        toastr.error(xhr.responseJSON.nama)
                    }
                },
                success: function(response){
                    $('#category-table').DataTable().ajax.reload();
                    $('#editModal').modal('toggle')
                    $('#editCategory').trigger("reset");
                    toastr.success('Berhasil mengupdate category')
                }
            })
        })
    </script>
@endsection