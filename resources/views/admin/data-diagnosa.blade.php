@extends('layouts.main')
@section('content')
    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
            <img src="/images/profil.png" alt="">
        </div>

        <div class="dash-content">
            <div class="activity">
                <div class="title">
                    <i class="uil uil-medkit"></i>
                    <span class="text">Data Diagnosa</span>
                </div>

                @if (session('success'))
                    <div class="alert alert-success mt-2">{{ session('success') }}</div>
                @endif


                <table id="datatable" class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Usia</th>
                            <th>Jenis Kelamin</th>
                            <th>Prediksi Penyakit</th>
                            <th>Persentase</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($diagnosas as $diagnosa)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $diagnosa->nama_pasien }}</td>
                                <td>{{ $diagnosa->usia }}</td>
                                <td>{{ $diagnosa->jenis_kelamin }}</td>
                                <td>{{ $diagnosa->hasil_penyakit }}</td>
                                <td>{{ $diagnosa->persentase }}%</td>
                                <td>
                                    <a href="{{ route('diagnosa.hasil', $diagnosa->id) }}"
                                        class="btn btn-info btn-sm">Lihat</a>
                                    <form action="{{ route('admin.diagnosa.destroy', $diagnosa->id) }}" method="POST"
                                        style="display:inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Belum ada data diagnosa</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- DataTables CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    paginate: {
                        first: "Awal",
                        last: "Akhir",
                        next: "Berikutnya",
                        previous: "Sebelumnya"
                    },
                    zeroRecords: "Data tidak ditemukan",
                }
            });
        });
    </script>
@endsection
