@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Customer') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form method="GET" action="{{ url('customer') }}">
                                <div class="form-group row">
                                    <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Cari') }}</label>
                                    <div class="col-md-5">
                                        <input id="q" type="text" class="form-control @error('q') is-invalid @enderror" name="q" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row mb-0">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Cari') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form method="GET" action="{{ url('customer') }}">
                                <div class="form-group row">
                                    <div class="col-md-5">
                                        <input id="after" type="date" class="form-control" name="after" value="{{ old('after') }}" required autocomplete="name" autofocus>
                                    </div>
                                    <div class="col-md-5">
                                        <input id="before" type="date" class="form-control" name="before" value="{{ old('before') }}" required autocomplete="name" autofocus>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group row mb-0">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Filter') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="text-right">
                        <a href="{{ Route('customer.create')}}" class="btn btn-success"> Tambah Data</a>
                    </div>
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th class="text-center" scope="col">#</th>
                            <th class="text-center" scope="col">Nama</th>
                            <th class="text-center" scope="col">Alamat</th>
                            <th class="text-center" scope="col">No Telepon</th>
                            <th class="text-center" scope="col">Tanggal Registrasi</th>
                            <th class="text-center" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; ?>
                            @foreach($customer as $key)
                            <tr>
                                <td class="text-center"><?php echo $no; ?></td>
                                <td>{{ $key->nama }}</td>
                                <td class="">{{ $key->alamat }}</td>
                                <td class="text-center">{{ $key->nomor_telepon }}</td>
                                <td class="text-center">{{ $key->tanggal_registrasi }}</td>
                                <td class="text-center" style="width:150px">
                                    <a href="{{ url('customer/destroy')}}/{{ $key->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-primary btn-sm"> Hapus</a> |
                                    <a href="{{ url('customer/edit')}}/{{ $key->id }}" class="btn btn-success btn-sm"> Edit</a>
                                </td>
                            </tr>
                            <?php $no++; ?>
                            @endforeach
                            {{ $customer->links() }}
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
