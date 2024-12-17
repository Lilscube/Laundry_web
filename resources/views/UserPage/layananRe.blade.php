@extends('UserPage.DashboardUser')
@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header text-center text-white" style="background: linear-gradient(135deg, #005082, #00a5cf);">
                    <h2>Input Layanan Reguler</h2>
                </div>
                <div class="card-body p-5">
                    <form id="serviceForm" action="{{ url('api/layanan/store') }}" method="POST">
                        @csrf
                        <!-- Input fields -->
                        <input type="hidden" name="id_user" value="1"> <!-- Sesuaikan ID user -->
                        <div class="form-group mb-4">
                            <label for="berat">Berat Cucian (kg)</label>
                            <input type="number" id="berat" name="berat" class="form-control" required placeholder="Masukkan berat cucian">
                        </div>
                        <div class="form-group mb-4">
                            <label for="durasi">Durasi</label>
                            <input type="text" id="durasi" name="durasi" class="form-control" required placeholder="Durasi laundry">
                        </div>
                        <div class="form-group mb-4">
                            <label for="harga">Harga</label>
                            <input type="number" id="harga" name="harga" class="form-control" required placeholder="Harga layanan">
                        </div>
                        <div class="form-group mb-4">
                            <label for="detail_layanan">Detail Layanan</label>
                            <select id="detail_layanan" name="detail_layanan" class="form-control" required>
                                <option value="express">Reguler</option>
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label for="metode_pembayaran" class="font-weight-bold">Metode Pembayaran</label>
                            <select id="metode_pembayaran" name="metode_pembayaran" class="form-control" required>
                                <option value="" disabled selected>Pilih metode pembayaran</option>
                                <option value="ewallet">E-Wallet (OVO, GoPay, DANA)</option>
                                <option value="bank_transfer">Transfer Bank</option>
                                <option value="credit_card">Kartu Kredit</option>
                                <option value="cash_on_delivery">Cash on Delivery (COD)</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-block text-white" style="background: linear-gradient(135deg, #005082, #00a5cf); font-size: 1.1rem; padding: 10px 0; border-radius: 5px;">Kirim Permintaan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('serviceForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = {
        detail_layanan: 'reguler',
        berat: document.getElementById('berat').value,
        durasi: document.getElementById('durasi').value,
        harga: document.getElementById('harga').value,
        metode_pembayaran: document.getElementById('metode_pembayaran').value,
    };

    fetch('http://127.0.0.1:8000/api/layanan/store', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'Authorization': 'Bearer ' + localStorage.getItem('auth_token'), // Token dari login
        },
        body: JSON.stringify(formData),
    })
    .then(response => response.json())
    .then(data => {
        console.log("Server Response:", data);

        if (data.status) {
            alert("Layanan berhasil ditambahkan!");
            document.getElementById('serviceForm').reset();
        } else {
            alert("Gagal menambahkan layanan: " + JSON.stringify(data.message));
        }
    })
    .catch(error => {
        console.error("Error:", error);
        alert("Terjadi kesalahan saat mengirim data!");
    });
});
</script>

@endsection
