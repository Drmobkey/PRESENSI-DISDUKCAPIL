@extends('layouts.app')

@section('content')
    <div class="main py-4">
        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            <h2 class="mb-4 h5">Edit Data User</h2>
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">User</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
            @include('components.back-besar-button', ['url' => 'admin/users', 'id' => $user->id])

            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                            class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="no_id">No ID</label>
                        <input type="text" name="no_id" id="no_id" value="{{ old('no_id', $user->no_id) }}"
                            class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                            value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="telepon">Phone Number</label>
                        <input type="text" name="telepon" id="telepon" value="{{ old('telepon', $user->telepon) }}"
                            class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki"
                                {{ old('jenis_kelamin', $user->jenis_kelamin) === 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                            </option>
                            <option value="Perempuan"
                                {{ old('jenis_kelamin', $user->jenis_kelamin) === 'Perempuan' ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="PNS" {{ old('status', $user->status) === 'PNS' ? 'selected' : '' }}>PNS
                            </option>
                            <option value="Magang" {{ old('status', $user->status) === 'Magang' ? 'selected' : '' }}>Magang
                            </option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-select" required>
                            <option value="pegawai" {{ old('role', $user->role) === 'pegawai' ? 'selected' : '' }}>pegawai
                            <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>admin
                            </option>
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-warning">Update Pegawai</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
