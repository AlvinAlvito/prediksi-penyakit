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
                <i class="uil uil-list-ul"></i>
                <span class="text">Data Gejala</span>                
            </div>

            @if (session('success'))
                <div class="alert alert-success mt-2">{{ session('success') }}</div>
            @endif

            <div class="row justify-content-end mb-3">
                <div class="col-lg-3 col-md-4 col-sm-6 text-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahGejala"><i class="uil uil-plus"></i> Tambah Gejala</button>
                </div>
            </div>

            <table id="datatable" class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Gejala</th>
                        <th>Jenis</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($gejalas as $gejala)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $gejala->kode }}</td>
                            <td>{{ $gejala->nama }}</td>
                            <td>{{ $gejala->jenis }}</td>
                            <td>
                                <a class="text-primary" data-bs-toggle="modal" data-bs-target="#modalEditGejala{{ $gejala->id }}"><i class="uil uil-edit"></i></a>
                                <form action="{{ route('gejala.destroy', $gejala->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Yakin ingin menghapus gejala ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link text-danger p-0 m-0"><i class="uil uil-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="modalEditGejala{{ $gejala->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('gejala.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $gejala->id }}">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Gejala</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label>Kode</label>
                                                <input type="text" name="kode" class="form-control" value="{{ $gejala->kode }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Nama</label>
                                                <input type="text" name="nama" class="form-control" value="{{ $gejala->nama }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Jenis</label>
                                                <select name="jenis" class="form-control" required>
                                                    <option value="Dasar" {{ $gejala->jenis == 'Dasar' ? 'selected' : '' }}>Dasar</option>
                                                    <option value="Lanjutan" {{ $gejala->jenis == 'Lanjutan' ? 'selected' : '' }}>Lanjutan</option>
                                                </select>
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
                    @empty
                        <tr><td colspan="5" class="text-center">Belum ada data gejala.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Modal Tambah Gejala -->
<div class="modal fade" id="modalTambahGejala" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('gejala.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Gejala</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Kode</label>
                        <input type="text" name="kode" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Jenis</label>
                        <select name="jenis" class="form-control" required>
                            <option value="Dasar">Dasar</option>
                            <option value="Lanjutan">Lanjutan</option>
                        </select>
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

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
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