@extends('layouts.app')

@section('content')
    <div class="main py-4">
        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            <h2 class="mb-4 h5">{{ __('Daftar Hak Akses (Permissions)') }}</h2>
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permission</a></li>
                <li class="breadcrumb-item active">Index</li>
            </ol>
            
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('danger'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('danger') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row align-items-center justify-content-between mb-3">
                <div class="col-auto">
                    <a href="{{ route('permissions.create') }}" class="btn btn-gray-800 d-inline-flex align-items-center">
                        <svg class="icon icon-sm me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Tambah Permission
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">No</th>
                            <th class="border-0">Nama Permission</th>
                            <th class="border-0 rounded-end text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td><span class="fw-normal">{{ $loop->iteration + ($permissions->currentPage() - 1) * $permissions->perPage() }}</span></td>
                                <td><code class="text-danger fw-bold fs-6">{{ $permission->name }}</code></td>
                                <td class="fw-normal text-center">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="btn-group">
                                            <!-- Edit button -->
                                            <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-secondary btn-sm rounded mx-1" title="Ubah Nama">
                                                <i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i>
                                            </a>
                                            <!-- Delete button -->
                                            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" id="delete-form-{{ $permission->id }}" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="deleteConfirmation({{ $permission->id }})" class="btn btn-danger btn-sm rounded mx-1" title="Hapus Permission">
                                                    <i class="fa-solid fa-trash-can" style="color: #ffffff;"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
                {{ $permissions->links() }}
            </div>
        </div>
    </div>
@endsection
