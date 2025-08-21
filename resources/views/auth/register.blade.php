@extends('layouts.guest')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500"
                    style="max-height: 90vh; overflow-y: auto;">
                    <div class="text-center text-md-center mb-4 mt-md-0">
                        <h1 class="mt-n3 mb-0 h3">{{ __('Create Account') }}</h1>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Form -->
                        <div class="form-group mt-4 mb-4">
                            <label for="name">{{ __('Your Name') }}</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-user-alt fa-fw"></i>
                                </span>
                                <input name="name" id="name" type="name" class="form-control"
                                    placeholder="{{ __('Name') }}" value="{{ old('name') }}" autofocus required>
                            </div>

                            @error('name')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                        <!-- End of Form -->

                        <!-- Form -->
                        <div class="form-group mt-4 mb-4">
                            <label for="email">{{ __('Your Email') }}</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                        </path>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z">
                                        </path>
                                    </svg>
                                </span>
                                <input name="email" id="email" type="email" class="form-control"
                                    placeholder="{{ __('Email') }}" value="{{ old('email') }}" autofocus required>
                            </div>
                            @error('email')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                        <!-- End of Form -->
                        <!-- Form -->
                        <div class="form-group mb-4">
                            <label for="password">{{ __('Your Password') }}</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon2">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                            clip-rule="evenodd">
                                        </path>
                                    </svg>
                                </span>
                                <input name="password" type="password" placeholder="{{ __('Password') }}"
                                    class="form-control" id="password" required autocomplete="new-password">
                            </div>
                            @error('password')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                        <!-- End of Form -->
                        <!-- Form -->
                        <div class="form-group mb-4">
                            <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon3">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                            clip-rule="evenodd">
                                        </path>
                                    </svg>
                                </span>
                                <input name="password_confirmation" type="password"
                                    placeholder="{{ __('Confirm Password') }}" class="form-control"
                                    id="password_confirmation" required>
                            </div>
                        </div>
                        <!-- End of Form -->
                        <!-- Form -->
                        <div class="form-group mb-4">
                            <label for="tanggal_lahir">{{ __('Tanggal Lahir') }}</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon3">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z" />
                                        </svg>
                                    </svg>
                                </span>
                                <input name="tanggal_lahir" type="date" placeholder="{{ __('Tanggal Lahir') }}"
                                    class="form-control" id="tanggal_lahir" required>
                            </div>
                        </div>
                        <!-- End of Form -->
                        <!-- Form -->
                        <div class="form-group mb-4">
                            <label for="status">{{ __('Status') }}</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon3">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336l24 0 0-64-24 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l48 0c13.3 0 24 10.7 24 24l0 88 8 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-80 0c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                        </svg>
                                    </svg>
                                </span>
                                <select id="status" class="form-control" name="status" required>
                                    <option value="PNS">PNS</option>
                                    <option value="Magang">Magang</option>
                                </select>
                            </div>
                        </div>
                        <!-- End of Form -->
                        <!-- Form -->
                        <div class="form-group mb-4">
                            <label for="jenis_kelamin">{{ __('Jenis Kelamin') }}</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon3">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 640 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M80 48a48 48 0 1 1 96 0A48 48 0 1 1 80 48zm40 304l0 128c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-154.8c-8.1 9.2-21.1 13.2-33.5 9.4c-16.9-5.3-26.3-23.2-21-40.1l30.9-99.1C44.9 155.3 82 128 124 128l8 0c42 0 79.1 27.3 91.6 67.4l30.9 99.1c5.3 16.9-4.1 34.8-21 40.1c-12.4 3.9-25.4-.2-33.5-9.4L200 480c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-128-16 0zM320 0c13.3 0 24 10.7 24 24l0 464c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-464c0-13.3 10.7-24 24-24zM464 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zM440 480l0-96-17.8 0c-10.9 0-18.6-10.7-15.2-21.1l9-26.9c-3.2 0-6.4-.5-9.5-1.5c-16.9-5.3-26.3-23.2-21-40.1l29.7-95.2C428.4 156.9 467.6 128 512 128s83.6 28.9 96.8 71.2l29.7 95.2c5.3 16.9-4.1 34.8-21 40.1c-3.2 1-6.4 1.5-9.5 1.5l9 26.9c3.5 10.4-4.3 21.1-15.2 21.1L584 384l0 96c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-96-16 0 0 96c0 17.7-14.3 32-32 32s-32-14.3-32-32z" />
                                        </svg>
                                    </svg>
                                </span>
                                <select id="jenis_kelamin" class="form-control" name="jenis_kelamin" required>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <!-- End of Form -->
                        <!-- Form -->
                        <div class="form-group mb-4">
                            <label for="telepon">{{ __('Telepon') }}</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon3">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path
                                                d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z" />
                                        </svg>
                                    </svg>
                                </span>
                                <input name="telepon" type="text" placeholder="{{ __('Telepon') }}"
                                    class="form-control" id="telepon" required>
                            </div>
                        </div>
                        <!-- End of Form -->
                        <!-- Form -->
                        <div class="form-group mb-4">
                            <label for="role">{{ __('Role') }}</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon4">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4l54.1 0 109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109 0-54.1c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7L352 176c-8.8 0-16-7.2-16-16l0-57.4c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                    </svg>
                                </span>
                                <select id="role" class="form-control" name="role" required>
                                    <option value="pegawai">Pegawai</option>
                                    <!-- Tambahkan opsi lain jika diperlukan -->
                                </select>
                            </div>
                            @error('role')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- End of Form -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-gray-800">{{ __('Register') }}</button>
                        </div>
                    </form>

                    <div class="d-flex justify-content-center align-items-center mt-4">
                        <span class="fw-normal">
                            {{ __('Already have an account?') }}
                            <a href="{{ route('login') }}" class="fw-bold">{{ __('Login here') }}</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
