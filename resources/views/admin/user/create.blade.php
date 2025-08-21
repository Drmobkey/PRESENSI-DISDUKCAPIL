@extends('layouts.app')

@section('content')
    <div class="main py-4">
        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            <h2 class="mb-4 h5">{{ __('Tambah Pegawai') }}</h2>
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">User</a></li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
            @include('components.back-besar-button', ['url' => url('users')])

            <div class="card mt-3">
                <div class="card-body">
                    <form action="{{ url('users') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Nama -->
                            <div class="col-md-6 mb-3">
                                <div><label for="name">Nama</label>
                                    <input class="form-control" id="name" type="text" name="name"
                                        placeholder="Masukkan Nama" required="">
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6 mb-3">
                                <div><label for="email">Email</label>
                                    <input class="form-control" id="email" type="email" name="email"
                                        placeholder="Masukkan Email" required="">
                                </div>
                            </div>

                            {{-- <!-- No ID -->
                            <div class="col-md-6 mb-3">
                                <label for="no_id" class="form-label">No ID</label>
                                <input type="text" class="form-control" id="no_id" name="no_id"
                                    placeholder="Biarkan kosong untuk auto-generate">
                            </div> --}}

                            <!-- Tanggal Lahir -->
                            <div class="col-md-6 mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                            </div>

                            <!-- Status -->
                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="PNS">PNS</option>
                                    <option value="Magang">Magang</option>
                                </select>
                            </div>

                            <!-- Jenis Kelamin -->
                            <div class="col-md-6 mb-3">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <!-- Telepon -->
                            <div class="col-md-6 mb-3">
                                <label for="telepon">Telepon</label>
                                <input class="form-control" id="telepon" type="text" name="telepon"
                                    placeholder="Masukkan Nomor Telepon" required>
                            </div>


                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-warning float-right"><i class="far fa-save"></i>
                                    Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    @if (Session::has('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ Session::get('success') }}',
                onClose: () => {
                    window.location.replace =
                        "{{ url('users') }}"; // Redirect ke halaman users setelah pesan alert ditutup
                }
            });
        </script>
    @endif
@endsection
