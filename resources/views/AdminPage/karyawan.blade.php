@php
    use Illuminate\Support\Facades\Auth;
@endphp
@extends('AdminPage.DashboardAdmin')

@section('content')

<div class="content mt-4">
    <div class="container-fluid" style="background: linear-gradient(135deg, #0077b6, #00395d); border-radius: 10px; padding: 20px;">
        <!-- Judul Halaman -->
        <div class="row align-items-center mt-4">
            <div class="col d-flex justify-content-start">
                <h1 class="mb-2" style="color: white;">Daftar Karyawan</h1>
            </div>
        </div>

        <!-- Menampilkan Data Karyawan -->
        <div class="row">
            @forelse($karyawans as $karyawan)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ asset($karyawan->foto_karyawan) }}" class="card-img-top member-img" alt="Foto Karyawan">
                        <div class="card-body">
                            <h5 class="card-title"><strong>{{ $karyawan->nama_karyawan }}</strong></h5>
                            <p class="card-text">No Telp : {{ $karyawan->no_telp }}</p>
                            <p class="card-text">Email : {{ $karyawan->email }}</p>
                            <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus karyawan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm mt-2">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-white">Belum ada karyawan yang terdaftar.</p>
            @endforelse
        </div>

        <!-- Tombol Tambah Karyawan di Bawah Kanan -->
        <div class="d-flex justify-content-end">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addKaryawanModal" style="margin-top: 20px;">
                Tambah Karyawan
            </button>
        </div>
    </div>
</div>

<!-- Modal Tambah Karyawan -->
<div class="modal fade" id="addKaryawanModal" tabindex="-1" aria-labelledby="addKaryawanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="addKaryawanLabel">Tambah Karyawan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('karyawan.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="foto_karyawan" class="form-label">Foto Karyawan</label>
                        <input type="text" name="foto_karyawan" class="form-control" id="foto_karyawan" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                        <input type="text" name="nama_karyawan" class="form-control" id="nama_karyawan" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_telp" class="form-label">No Telepon</label>
                        <input type="text" name="no_telp" class="form-control" id="no_telp" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>

            @if (session('success'))
                <div class="toast align-items-center text-bg-success border-0 position-fixed bottom-0 end-0 p-3" role="alert" aria-live="assertive" aria-atomic="true" id="toastSuccess">
                    <div class="d-flex">
                        <div class="toast-body">
                            {{ session('success') }}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger mt-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    .member-img {
        height: 300px;
        object-fit: cover;
        border-radius: 10px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var toastEl = document.getElementById('toastSuccess');
        if (toastEl) {
            var toast = new bootstrap.Toast(toastEl);
            toast.show();
        }
    });
</script>

@endsection
