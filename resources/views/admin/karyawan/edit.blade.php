@extends('layouts.app')

@section('content')
    <div class="main py-4">
        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            <h2 class="mb-4 h5">Edit Data User</h2>
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ route('karyawans.index') }}">User</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
            @include('components.back-besar-button', ['url' => url('karyawans/' . $karyawan->id)])

            <form action="{{ url('karyawans/' . $karyawan->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" value="{{ $karyawan->nama }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="no_id">No Id</label>
                    <input type="text" name="no_id" id="no_id" value="{{ $karyawan->no_id }}" readonly
                        class="form-control">
                </div>

                <div class="form-group">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                        value="{{ $karyawan->tanggal_lahir }}">
                </div>

                <div class="form-group">
                    <label for="telepon">Phone Number</label>
                    <input type="text" name="telepon" id="telepon"
                        value="{{ old('phone_number', $karyawan->telepon) }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <input type="text" name="jenis_kelamin" id="jenis_kelamin"
                        value="{{ old('jenis_kelamin', $karyawan->jenis_kelamin) }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="PNS" {{ $karyawan->status === 'PNS' ? 'selected' : '' }}>PNS</option>
                        <option value="Magang" {{ $karyawan->status === 'Magang' ? 'selected' : '' }}>Magang</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="user_id">Role</label>
                    <select name="user_id" id="user_id" class="form-select">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $karyawan->user_id === $user->id ? 'selected' : '' }}>
                                {{ $user->role }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-warning">Update Pegawai</button>
                </div>
            </form>
        </div>
    </div>
@endsection
