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
                        <img src="{{ $karyawan->profile_image_url ?? 'https://ui-avatars.com/api/?background=random&name=' . urlencode($karyawan->nama) }}"
                            class="avatar-xl rounded-circle mx-auto mt-n7 mb-2" alt="{{ $karyawan->nama }}">

                        <h4 class="h3 p-2">{{ $karyawan->nama }}</h4>

                        <div class="text-start">
                            <p><strong>No Id: </strong>{{ $karyawan->no_id }}</p>
                            <p><strong>Status: </strong>{{ $karyawan->status }}</p>
                            <p><strong>Jenis Kelamin: </strong>{{ $karyawan->jenis_kelamin }}</p>
                            <p><strong>Telepon: </strong>{{ $karyawan->telepon }}</p>
                            {{-- <p><strong>Role: </strong>{{ $karyawan->user->role }}</p> --}}
                            <div class="d-flex justify-content-center pt-2">
                                <span class="mx-2 ">
                                    @include('components.back-besar-button', [
                                        'url' => 'karyawans',
                                        'id' => $karyawan->id,
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
                                    ])
                                </span> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
