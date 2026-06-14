@extends('layouts.app')

@section('content')
    <div class="main py-4">
        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            <h2 class="mb-4 h5">{{ __('Atur Hak Akses Peran: ') }} <span class="badge bg-primary">{{ $role->name }}</span></h2>
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Role</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
            @include('components.back-besar-button', ['url' => 'admin/setup/roles'])

            <div class="card mt-3">
                <div class="card-body">
                    <form action="{{ route('roles.update', $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="role" value="{{ $role->name }}">

                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark fs-6">{{ __('Daftar Hak Akses (Permissions)') }}</label>
                            <p class="text-muted small">{{ __('Pilih hak akses yang ingin dipetakan untuk peran ini.') }}</p>
                            <hr>
                            
                            <div class="row">
                                @foreach ($permissions as $perm)
                                    <div class="col-md-4 mb-3">
                                        <div class="form-check form-switch p-3 border rounded bg-light d-flex align-items-center justify-content-between">
                                            <label class="form-check-label text-gray-800 fw-semibold mb-0" for="check-{{ $perm->id }}" style="cursor: pointer;">
                                                <code>{{ $perm->name }}</code>
                                            </label>
                                            <input class="form-check-input ms-2" type="checkbox" name="permissions[]" 
                                                value="{{ $perm->name }}" id="check-{{ $perm->id }}"
                                                {{ in_array($perm->name, $rolePermissions) ? 'checked' : '' }} style="cursor: pointer;">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-warning float-right">
                                    <i class="fa-solid fa-save me-1"></i> Simpan Hak Akses
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
