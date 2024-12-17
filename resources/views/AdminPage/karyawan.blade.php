@extends('AdminPage.DashboardAdmin')

@section('content')

<div class="content mt-4">
    <div class="container-fluid" style="background: linear-gradient(135deg, #0077b6, #00395d); border-radius: 10px; padding: 20px;">          
        <div class="row align-items-center mt-4">
            <div class="col d-flex justify-content-start" style="color: hsla(0, 0%, 0%, 0.8)">
                <h4 class="mb-2">Selamat Datang, Admin</h4>
            </div>
            <div class="col text-end">
                <!-- Button Tambah Karyawan -->
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addKaryawanModal">Tambah Karyawan</button>
            </div>
        </div>
        <div class="row align-items-center mt-0">
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
                            <h5 class="card-title">{{ $karyawan->nama_karyawan }}</h5>
                            <p class="card-text">No Telp: {{ $karyawan->no_telp }}</p>
                            <p class="card-text">Email: {{ $karyawan->email }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-white">Belum ada karyawan yang terdaftar.</p>
            @endforelse
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
            <form action="{{ route('karyawan.create') }}" method="POST">
                @csrf
                <div class="modal-body">
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
                    <div class="mb-3">
                        <label for="foto_karyawan" class="form-label">Foto Karyawan (URL)</label>
                        <input type="text" name="foto_karyawan" class="form-control" id="foto_karyawan" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
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

@endsection
