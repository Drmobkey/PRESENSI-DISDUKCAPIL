<div class="card-body">
    <div class="table-responsive">
        <table class="table table-centered table-nowrap mb-0 rounded">
            <thead class="thead-light">
                <tr>
                    <th class="border-0 rounded-start">No</th>
                    <th class="border-0">Nama</th>
                    <th class="border-0">Nomor ID</th>
                    <th class="border-0">Status</th>
                    <th class="border-0">Jenis Kelamin</th>
                    {{-- <th class="border-0">Category</th>
                    <th class="border-0">Global Rank</th>
                    <th class="border-0">Traffic Share</th> --}}

                    <th class="border-0 rounded-end text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($karyawans as $karyawan)
                    <tr>
                        <td><span class="fw-normal">{{ $karyawan->id }}</span></td>
                        <td><span class="fw-normal">{{ $karyawan->nama }}</span></td>
                        <td><span class="fw-normal">{{ $karyawan->no_id }}</span></td>
                        <td><span class="fw-normal">{{ $karyawan->status }}</span></td>
                        <td><span class="fw-normal">{{ $karyawan->jenis_kelamin }}</span></td>
                        <td class="fw-normal">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="btn-group">
                                    @include('components.info-button', [
                                        'url' => 'karyawans',
                                        'id' => $karyawan->id,
                                    ])
                                    @include('components.edit-button', [
                                        'url' => 'karyawans',
                                        'id' => $karyawan->id,
                                    ])
                                    @include('components.delete-button', [
                                        'url' => 'karyawans',
                                        'id' => $karyawan->id,
                                    ]) 
                                    {{-- @include('components.reset-password', [
                                        'url' => 'karyawans',
                                        'id' => $karyawan->id,
                                    ]) --}}
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
<div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
    {{ $karyawans->links() }}
</div>
