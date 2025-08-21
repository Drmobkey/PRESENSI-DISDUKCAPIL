@extends('layouts.app')

@section('content')
    <div class="main py-4">
        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            <h2 class="mb-4 h5">{{ __('List Absensi') }}</h2>
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ route('presensis.index') }}">Presensi</a></li>
                <li class="breadcrumb-item active">Index</li>
            </ol>
            <div class="row align-items-center justify-content-between">
                {{-- <div class="col-auto">
                    <a href="{{ route('presensis.create') }}" class="btn btn-gray-800 d-inline-flex align-items-center">
                        <svg class="icon icon-sm me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Tambah Pegawai
                    </a>
                </div> --}}
                <div class="col col-md-6 col-lg-3 col-xl-4">
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">
                            <svg class="icon icon-xs" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <input type="text" id="search" class="form-control" placeholder="Search Pegawai"
                            value="{{ request()->get('search') }}">
                    </div>
                </div>


            </div>

            <div id="presensi-table">
                @include('admin.presensi.table', ['presensis' => $presensis])
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('search').addEventListener('input', function() {
            let query = this.value;

            fetch(`{{ route('presensis.index') }}?search=${query}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.text())
                .then(data => {
                    document.getElementById('presensi-table').innerHTML = data;
                });
        });
    </script>
@endsection
