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

                <div class="row justify-content-end mb-3">
                    <div class="col-lg-3 col-md-4 col-sm-6 text-end">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahPenyakit"><i
                                class="uil uil-plus"></i> Tambah Penyakit</button>
                    </div>
                </div>

                <table id="datatable" class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Pertolongan Pertama</th>
                            <th>Saran Lanjut</th>
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
                                <a href="{{ route('diagnosa.hasil', $diagnosa->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                <a href="{{ route('admin.diagnosa.edit', $diagnosa->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.diagnosa.destroy', $diagnosa->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center">Belum ada data diagnosa</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Modal Tambah Penyakit -->
    <div class="modal fade" id="modalTambahPenyakit" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('penyakit.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Penyakit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Pertolongan Pertama</label>
                            <textarea name="pertolongan_pertama" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Saran Lanjut</label>
                            <textarea name="saran_lanjut" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
