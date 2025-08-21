<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logbook Index</title>
</head>
<body>
    <h1>Daftar Logbook</h1>
    <a href="{{ route('logbook.create') }}">Tambah Logbook Baru</a>
    <ul>
        @foreach ($logbook as $item)
            <li>
                {{ $item->description }}
                <a href="{{ route('logbook.show', $item->id) }}">Lihat</a>
                <a href="{{ route('logbook.edit', $item->id) }}">Edit</a>
                <form action="{{ route('logbook.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </li>
        @endforeach
    </ul>
    {{ $logbook->links() }} <!-- Pagination links -->
</body>
</html>
