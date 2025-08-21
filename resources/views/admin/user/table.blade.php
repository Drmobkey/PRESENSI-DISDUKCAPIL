<div class="card-body">
    <div class="table-responsive">
        <table class="table table-centered table-nowrap mb-0 rounded">
            <thead class="thead-light">
                <tr>
                    <th class="border-0 rounded-start">No</th>
                    <th class="border-0">Nama</th>
                    {{-- <th class="border-0">Role</th> --}}
                    <th class="border-0">Nomor ID</th>
                    <th class="border-0">Jenis Kelamin</th>
                    <th class="border-0">Status</th>
                    <th class="border-0">Telepon</th>
                    {{-- <th class="border-0">Traffic Share</th> --}}

                    <th class="border-0 rounded-end text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td><span class="fw-normal">{{ $loop->iteration }}</span></td>
                        <td><span class="fw-normal">{{ $user->name }}</span></td>
                        {{-- <td><span class="fw-normal">{{ $user->role }}</span></td> --}}
                        <td><span class="fw-normal">{{ $user->no_id }}</span></td>
                        <td><span class="fw-normal">{{ $user->jenis_kelamin ?? '-' }}</span></td>
                        <td><span class="fw-normal">{{ $user->status ?? '-'}}</span></td>
                        <td><span class="fw-normal">{{ $user->telepon }}</span></td>
                        <td class="fw-normal">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="btn-group">
                                    @include('components.info-button', [
                                        'url' => 'admin/users',
                                        'id' => $user->id,
                                    ])
                                    @include('components.edit-button', [
                                        'url' => 'admin/users',
                                        'id' => $user->id,
                                    ])
                                    @include('components.delete-button', [
                                        'url' => 'admin/users',
                                        'id' => $user->id,
                                    ]) 
                                    @include('components.reset-password', [
                                        'url' => 'admin/users',
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
</div>
<div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
    {{ $users->links() }}
</div>
