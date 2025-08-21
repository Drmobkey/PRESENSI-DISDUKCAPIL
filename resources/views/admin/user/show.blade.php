@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4 mb-4">
                <div class="card shadow border-0 text-center p-0">
                    <div class="profile-cover rounded-top">
                        <img src="{{ asset('img/sm.jpg') }}" alt="profile-cover" class="img-fluid rounded-top">
                    </div>
                    <div class="card-body pb-5">
                        <img src="{{ $user->profile_image_url ?? 'https://ui-avatars.com/api/?background=random&name=' . urlencode($user->name) }}"
                            class="avatar-xl rounded-circle mx-auto mt-n7 mb-2" alt="{{ $user->name }}">

                        <h4 class="h3 p-2">{{ $user->name }}</h4>

                        <div class="text-start">
                            <p><strong>Role: </strong>{{ $user->role }}</p>
                            <p><strong>No Id: </strong>{{ $user->no_id }}</p>
                            <p><strong>Nama: </strong>{{ $user->name }}</p>
                            <p><strong>Email: </strong>{{ $user->email }}</p>
                            <p><strong>Tanggal Lahir: </strong>{{ $user->tanggal_lahir ?? '-' }}</p>
                            <p><strong>Telepon: </strong>{{ $user->telepon ?? '-'}}</p>
                            <div class="d-flex justify-content-center pt-2">
                                <span class="mx-2 ">
                                    @include('components.back-besar-button', [
                                        'url' => 'admin/users',
                                        'id' => $user->id,
                                    ])
                                </span>
                                {{-- <span class="mx-2">
                                    @include('components.edit-button', [
                                        'url' => 'karyawans',
                                        'id' => $karyawan->id,
                                    ])
                                </span>
                                <span class="mx-2">
                                    @include('components.delete-button', [
                                        'url' => 'karyawans',
                                        'id' => $karyawan->id,
                                    ]) --}}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
