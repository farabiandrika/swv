@extends('admin.layouts.main')

@section('setting-nav', 'active open')

@section('title', 'Setting')

@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="body">
                <form id="setting" action="{{ route('config.update') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Store</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ config('company.configs') !== null ? config('company.configs')->name : '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" id="address" value="{{ config('company.configs') !== null ? config('company.configs')->address : '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" class="form-control number" id="phone" value="{{ config('company.configs') !== null ? config('company.configs')->phone : '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ config('company.configs') !== null ? config('company.configs')->email : '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <input type="file" name="logo" class="form-control" id="logo" accept="image/*">
                    </div>
                    <input type="hidden" name="logoOld" value="{{ config('company.configs') !== null ? config('company.configs')->logo : '' }}">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

<script>
    $('form#setting').submit(function(e) {
            e.preventDefault()

            let frm = $('form#setting');
            let formData = new FormData(frm[0]);
            formData.append('file', $('input[type=file]')[0].files[0]);

            $.ajax({
                method: "POST",
                url: "{{route('config.update')}}",
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
                    toastr.success("Berhasil mengupdate setting")
                    $('input[name="logoOld"]').val(response.data.logo)
                    $("#logo").val(null);
                }
            })
        })
</script>

@endsection