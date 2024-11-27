@extends('layout.app')

@section('content')
    <div class="">
        <div class=" overflow-y-auto max-h-98 border-zinc-400 rounded-lg">
            <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
            <a href="javascript:void(0)" id="exportExcel" class="btn btn-success mb-3">Export ke Excel</a>
            <input type="text" id="searchBar" class="form-control mb-3" placeholder="Cari data...">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            
            <!-- Table -->
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tujuan</th>
                    <th>Instansi</th>
                    <th>Tanggal Kunjungan</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>No</th>
                    <th>Aksi</th>
                </tr>
                @if($posts->isEmpty())
                    <tr>
                        <td colspan="8" class="text-center">Data tidak ditemukan.</td>
                    </tr>
                @else
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->nama }}</td>
                        <td>{{ $post->tujuan }}</td>
                        <td>{{ $post->instansi }}</td>
                        <td>{{ $post->tanggal }}</td>
                        <td>{{ $post->alamat }}</td>
                        <td>{{ $post->email }}</td>
                        <td>{{ $post->no }}</td>
                        <td>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block">
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>    
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </table>

            {{ $posts->links() }}
        </div>
    </div>
    <script>
    document.getElementById('exportExcel').addEventListener('click', function() {
        // Ambil data dari tabel
        var table = document.querySelector("table");
        var data = [];
        var rows = table.querySelectorAll("tr");
        
        // Loop melalui setiap baris di tabel
        for (var i = 0; i < rows.length; i++) {
            var row = [],
                cols = rows[i].querySelectorAll("td, th");

            for (var j = 0; j < cols.length; j++) {
                row.push(cols[j].innerText);
            }

            data.push(row);
        }

        // Buat workbook dan worksheet
        var worksheet = XLSX.utils.aoa_to_sheet(data);
        var workbook = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(workbook, worksheet, "DataTamu");

        // Ekspor ke file Excel
        XLSX.writeFile(workbook, "data_tamu.xlsx");
    });

    // Fungsi pencarian
    document.getElementById('searchBar').addEventListener('keyup', function() {
        var input = document.getElementById('searchBar').value.toLowerCase();
        var rows = document.querySelectorAll("table tr");

        // Loop untuk setiap baris di tabel
        rows.forEach(function(row, index) {
            // Jangan sertakan baris header dalam pencarian
            if (index !== 0) {
                var cells = row.querySelectorAll('td');
                var match = false;

                // Loop untuk setiap kolom di baris
                cells.forEach(function(cell) {
                    if (cell.innerText.toLowerCase().indexOf(input) > -1) {
                        match = true;
                    }
                });

                // Tampilkan atau sembunyikan baris
                if (match) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            }
        });
    });
</script>

@endsection
