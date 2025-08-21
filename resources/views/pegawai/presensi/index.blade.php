@extends('layouts.app')

@section('content')
    <div class="main py-4">
        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            <h2 class="mb-4 h5">{{ __('List Data Pegawai') }}</h2>

            <!-- Breadcrumb -->
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Pegawai</a></li>
                <li class="breadcrumb-item active">Index</li>
            </ol>

            <!-- Form Presensi -->
            <div class="container mt-4">

                @if (!empty($konfigurasi) && $konfigurasi->status_presensi === 'buka')
                    <form id="presensiForm" action="{{ route('karyawan.presensi.store') }}" method="post">
                        @csrf
                        <p class="alert alert-info text-dark">
                            Absen masuk telah dibuka. Silahkan absen dengan mengambil lokasi dahulu lalu klik Absen. Jika
                            sudah, abaikan teks ini.
                        </p><br />

                        @if (!$presensiHariIni->isNotEmpty() || ($presensiHariIni->isNotEmpty() && $presensiHariIni->first()->jam_pulang))
                            <label for="lokasi">Lokasi:</label><br /><br />
                            <select name="lokasi" id="lokasiSelect" required></select><br /><br />
                            <button class="btn btn-secondary text-white" type="button" onclick="getLocation()">Ambil
                                Lokasi</button><br /><br />
                            <button class="btn btn-primary" type="submit">Absen Masuk</button>
                        @else
                            <p class="btn btn-danger">Anda sudah melakukan absen masuk hari ini.</p>
                        @endif
                    </form>
                @else
                    <p class="btn btn-danger">Absen masuk ditutup oleh admin.</p>
                @endif
            </div>

            <!-- Table -->
            <div class="table-responsive" id="user-table">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">No ID:</th>
                            <th class="border-0">Nama</th>
                            <th class="border-0">Nomor ID</th>
                            <th class="border-0">Jenis Kelamin</th>
                            <th class="border-0">Status</th>
                            <th class="border-0">Telepon</th>
                            <th class="border-0 rounded-end text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td><span class="fw-normal">{{ $loop->iteration }}</span></td>
                                <td><span class="fw-normal">{{ $user->name }}</span></td>
                                <td><span class="fw-normal">{{ $user->no_id }}</span></td>
                                <td><span class="fw-normal">{{ $user->jenis_kelamin ?? '-' }}</span></td>
                                <td><span class="fw-normal">{{ $user->status ?? '-' }}</span></td>
                                <td><span class="fw-normal">{{ $user->telepon }}</span></td>
                                <td class="fw-normal text-center">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="btn-group">
                                            @include('components.info-button', [
                                                'url' => 'users',
                                                'id' => $user->id,
                                            ])
                                            @include('components.edit-button', [
                                                'url' => 'users',
                                                'id' => $user->id,
                                            ])
                                            @include('components.delete-button', [
                                                'url' => 'users',
                                                'id' => $user->id,
                                            ])
                                            @include('components.reset-password', [
                                                'url' => 'users',
                                                'id' => $user->id,
                                            ])
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div
                class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('search').addEventListener('input', function() {
            let query = this.value;

            fetch(`{{ route('users.index') }}?search=${query}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.text())
                .then(data => {
                    document.getElementById('user-table').innerHTML = data;
                });
        });

        // Function to get the user's location
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function showPosition(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            var locationString = latitude + ', ' + longitude;

            // Add location to the select input
            var lokasiSelect = document.getElementById('lokasiSelect');
            var option = document.createElement('option');
            option.value = locationString;
            option.text = locationString;
            lokasiSelect.add(option);
        }
    </script>
@endsection
