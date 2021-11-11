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
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Pembeli</th>
                                <th>Resi</th>
                                <th>Status</th>
                                <th>Total</th>
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
    <!-- Edit Product -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="editModalLabel">Edit Produk</h4>
                </div>
                <div class="modal-body">
                    <form id="editProduct">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Produk</label>
                            <input type="text" class="form-control" name="name" required id="name">
                        </div>
                        <div class="form-group">
                            <label for="size">Ukuran</label>
                            <input type="text" class="form-control" name="size" required id="size">
                        </div>
                        <div class="form-group">
                            <label for="stock">Jumlah Stok</label>
                            <input type="text" class="form-control number" name="stock" required id="stock">
                        </div>
                        <div class="form-group">
                            <label for="price">Harga</label>
                            <input type="text" class="form-control number" name="price" required id="price">
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi Produk</label>
                            <textarea name="description" id="description" class="form-control" required cols="30" rows="10" style="resize: none;"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="gender">Jenis</label>
                            <input type="text" class="form-control" name="gender" required id="gender">
                        </div>
                        <div class="form-group" id="categoryEditGroup">

                        </div>
                        <div class="form-group">
                            <div id="demo2" class="carousel slide" data-ride="carousel">
                                <div id="productImageGroup">
                                    
                                </div>
                                <a class="carousel-control-prev" href="#demo2" data-slide="prev"><span class="carousel-control-prev-icon"></span></a>
                                <a class="carousel-control-next" href="#demo2" data-slide="next"><span class="carousel-control-next-icon"></span></a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gambar[]">Gambar</label>
                            <button class="btn btn-primary btn-sm" id="addGambarEdit" type="button"><i class="zmdi zmdi-plus"></i></button>
                            <button class="btn btn-secondary btn-sm" id="removeGambarEdit" type="button"><i class="zmdi zmdi-minus"></i></button>
                            <div id="gambarGroupEdit">

                            </div>
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
                ajax: "{{route('transaksi.index')}}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'user.name', name: 'user.name'},
                    {data: 'resi', name: 'resi'},
                    {data: 'status', name: 'status'},
                    {data: 'total_rp', name: 'total_rp'},
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
            $('form#editProduct').data("id", id)

            $.get("{{ url('/api/product') }}" +'/' + id, function (response) {
                $('#modal-edit').modal('toggle')
                console.log(response)
                $('form#editProduct input[name="name"]').val(response.data.name)
                $('form#editProduct input[name="size"]').val(response.data.size)
                $('form#editProduct input[name="stock"]').val(response.data.stock)
                $('form#editProduct input[name="price"]').val(response.data.price)
                $('form#editProduct textarea[name="description"]').val(response.data.description)
                $('form#editProduct input[name="gender"]').val(response.data.gender)
                
                imageCarousel(response.data.images)
                spawnCategory(response.categories,response.data.category_id)
                
            })
        })

        function imageCarousel(images) {
            $('#productImageGroup').html('')
            let carouselIndicator = '<ul class="carousel-indicators"></ul><div class="carousel-inner"></div>'
            $('#productImageGroup').append(carouselIndicator)

            images.forEach((image, index) => {
                let indicatorsElm = `<li data-target="#demo2" data-slide-to="${index}" class="${index == 0 ? 'active' : ''}"></li>`
                $('ul.carousel-indicators').append(indicatorsElm)

                let imgElm = `<div class="carousel-item text-center ${index == 0 ? 'active' : ''}"><img src="/images/${image.name}" class="img-fluid" style="height:300px; width:auto;" alt=""><div class="carousel-caption"><button type="button" data-id="${image.id}" class="btn btn-sm delete-img btn-danger"><i class="zmdi zmdi-delete"></i></button></div></div>`
                $('div.carousel-inner').append(imgElm)
            });
        }

        function spawnCategory(categories, selectedCategory) {
            $('#categoryEditGroup').html('')

            let selectElm = '<label for="category_id">Kategori</label><select name="category_id" required class="form-control" id="categoryEdit"></select>'
            $('#categoryEditGroup').append(selectElm)


            categories.forEach(category => {
                let elm = `<option value="${category.id}" ${selectedCategory === category.id ? 'selected' : ''}>${category.nama}</option>`
                $('#categoryEdit').append(elm)
            });
        }

        // DELETE image of product
        $(document).on('click', '.delete-img', function(e) {
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
                            url: "{{ url('/api/image') }}" + "/" + id,
                            type: 'DELETE',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            error: function(xhr, status, error) {
                                for (variable in xhr.responseJSON.data) {
                                    toastr.error(xhr.responseJSON.data[variable])
                                }
                            },
                            success: function (response){
                                console.log(response)
                                imageCarousel(response.data)
                                toastr.success('Berhasil menghapus image')
                            }
                        });
                    swal.close()
                } else {
                    swal.close()
                }
            });
        })

        // DELETE product
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
                            url: "{{ url('/api/product') }}" + "/" + id,
                            type: 'DELETE',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            success: function (response){
                                console.log(response)
                                $('#transaksi-table').DataTable().ajax.reload();
                            }
                        });
                    swal.close()
                    toastr.success('Berhasil menghapus product')
                } else {
                    swal.close()
                }
            });
        })

        // ADD product
        $('form#addProduct').submit(function(e) {
            e.preventDefault()

            let frm = $('form#addProduct');
            let formData = new FormData(frm[0]);
            formData.append('file', $('input[type=file]')[0].files[0]);

            $.ajax({
                method: "POST",
                url: "{{route('product.store')}}",
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
                    $('#transaksi-table').DataTable().ajax.reload();
                    $('#addProduct').modal('toggle')
                    $('form#addProduct').trigger('reset')
                    toastr.success("Berhasil menambahkan product")
                }
            })
        })

        // UPDATE PROJECt
        $('form#editProduct').submit(function(e){
            e.preventDefault()
            let id = $(this).data('id')

            let frm = $('form#editProduct');
            let formData = new FormData(frm[0]);

            formData.append('file', $('input[type=file]')[0].files[0]);

            $.ajax({
                method: "POST",
                url: "{{ url('/api/product') }}" + "/" + id + '/update',
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
                    $('#transaksi-table').DataTable().ajax.reload();
                    $('#editModal').modal('toggle')
                    $('#editProduct').trigger("reset");
                    toastr.success('Berhasil mengupdate product')
                }
            })
        })

    $(document).on('click', '#addGambar', function(e) {
        e.preventDefault();
        let element = '<input type="file" name="gambar[]" accept="image/*" id="gambar[]" required class="form-control gambar">'
        $('#gambarGroup').append(element)
    })

    $(document).on('click', '#addGambarEdit', function(e) {
        e.preventDefault();
        let element = '<input type="file" name="gambar[]" accept="image/*" id="gambar[]" required class="form-control gambar">'
        $('#gambarGroupEdit').append(element)
    })

    $('#editModal').on('hidden.bs.modal', function (e) {
        $('#productImageGroup').html('')
    })

      $(document).on('click', '#removeGambar', function(e) {
        e.preventDefault();
        let numOfDiv = $('.gambar').length;
        if (numOfDiv > 1) {
          $("#gambarGroup").children("input[type=file]:last").fadeOut(300, function() { $(this).remove(); });
        }
        return;
      })

      $(document).on('click', '#removeGambarEdit', function(e) {
        e.preventDefault();
        $("#gambarGroupEdit").children("input[type=file]:last").fadeOut(300, function() { $(this).remove(); });
        return;
      })
    </script>
@endsection