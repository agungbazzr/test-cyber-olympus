@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Users') }}</div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; ?>
                            @foreach($user as $key)
                            <tr>
                                <td class="text-center"><?php echo $no; ?></td>
                                <td>{{ $key->name }}</td>
                                <td class="">{{ $key->email }}</td>
                            </tr>
                            <?php $no++; ?>
                            @endforeach
                            {{ $user->links() }}
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
