@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <h5 class="text-success" style="padding:10px" id="msg"></h5>
                <div class="card-body">
                @foreach($cust as $customer)
                    <form method="POST" action="#">
                        @csrf
                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $customer->nama }}" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"  value="{{ $customer->alamat }}" required autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nomor_telepon" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Telepon') }}</label>

                            <div class="col-md-6">
                                <input id="nomor_telepon" type="text" value="{{ $customer->nomor_telepon }}" class="form-control @error('nomor_telepon') is-invalid @enderror" name="nomor_telepon" required>
                                <input type="hidden" id="id" value="{{ $customer->id }}">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" onclick="submit_ajax()" class="btn btn-primary">
                                    {{ __('Simpan') }}
                                </button>
                                <a href="{{ Route('customer.index')}}" class="btn btn-warning">
                                    {{ __('Kembali') }}
</a>
                            </div>
                        </div>
                    </form>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function submit_ajax() {
    var id = $("#id").val();

    $.ajax({
        type:'PUT',
        url:'/customer/update/'+id,
        data:{
        "nama": $('#nama').val(),
        "alamat": $('#alamat').val(),
        "nomor_telepon": $("#nomor_telepon").val(),
        "_token":' <?php echo csrf_token() ?>',
    },
        success:function(data) {
            $("#msg").html(data.msg);
        },
        error: function(response){
            $("#msg").html(response);
        },
    });
    }
</script>
@endsection
