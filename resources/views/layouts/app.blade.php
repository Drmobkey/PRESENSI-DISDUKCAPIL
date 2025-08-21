<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    @vite('resources/sass/app.scss')

    <!-- Scripts -->
    @vite('resources/js/app.js')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
    @include('layouts.nav')
    @include('layouts.sidenav')
    <main class="content">
        {{-- TopBar --}}
        @include('layouts.topbar')
        @yield('content')
        {{-- Footer --}}
        @include('layouts.footer')
    </main>

    @yield('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if (Session::has('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ Session::get('success') }}',
                onClose: () => {
                    window.location.replace =
                        "{{ url('users') }}"; // Redirect ke halaman users setelah pesan alert ditutup
                }
            });
        @endif
    </script>

    <script>
        document.getElementById('delete-form').addEventListener('submit', function(e) {
            e.preventDefault(); // Menahan form untuk disubmit secara langsung

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus saja!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Form disubmit jika pengguna menekan "Ya, hapus saja!"
                    this.submit();
                }
            });
        });
    </script>


    <script>
        @if (Session::has('danger'))
            Swal.fire({
                icon: 'error',
                title: 'Hapus',
                text: '{{ Session::get('danger') }}',
                onClose: () => {
                    window.location.reload(); // Refresh halaman saat pesan alert ditutup
                }
            });
        @endif
    </script>

    <script>
        function deleteConfirmation(id) {
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Yakin ingin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>

    <script>
        function confirmResetPassword(url) {
            Swal.fire({
                title: 'Konfirmasi Reset Password',
                text: "Apakah Anda yakin ingin mereset password pengguna ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Reset Password',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url; // Redirect to the reset password URL
                }
            });
        }
    </script>
</body>

</html>
