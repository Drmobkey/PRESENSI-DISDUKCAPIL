@extends('layouts.app')

@section('content')
    <div class="main py-4">
        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            <h2 class="mb-4 h5">{{ __('Ubah Hak Akses (Permission)') }}</h2>
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permission</a></li>
                <li class="breadcrumb-item active">Ubah</li>
            </ol>
            @include('components.back-besar-button', ['url' => 'admin/setup/permissions'])

            <div class="card mt-3">
                <div class="card-body">
                    <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div>
                                    <label for="name">Nama Permission</label>
                                    <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name"
                                        placeholder="Masukkan Nama Permission" required value="{{ old('name', $permission->name) }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-warning float-right">
                                    <i class="far fa-save"></i> Perbarui
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
