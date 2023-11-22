@extends('layouts.admin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data UMKM</h6>
    </div>
    <div class="card-body">
        <form action="/admin/insertumkm" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nib" class="form-label">NIB</label>
                <input type="number" name="nib" class="form-control" min="0" id="exampleInputEmail1" aria-describedby="emailHelp">
                <p class="text-warning m-1" id="error-message" style="font-size: 0.9em"></p>
            </div>
            <div class="mb-3">
                <label for="nama_usaha" class="form-label">Nama Usaha</label>
                <input type="text" name="nama_usaha" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="pemilik_usaha" class="form-label">Pemilik Usaha</label>
                <input type="text" name="pemilik_usaha" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="jenis">Jenis</label>
                <select class="form-select" id="jenis" name="jenis" aria-label="Choose category">
                    <option selected disabled>Choose an option</option>
                    <option value="Perdagangan">Perdagangan</option>
                    <option value="Jasa">Jasa</option>
                    <option value="Industri Kreatif">Industri Kreatif</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="no_telpon" class="form-label">Kontak</label>
                <input type="number"  min="0" name="no_telpon" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" onblur="validateInput(this)">
                <div id="passwordHelpBlock" class="form-text">
                    Masukkan nomor telpon dengan format (+62) dan tidak menggunakan awalan 0, misalnya 812-7080-9090
                </div>
            </div>
            <div class="mb-3">
                <label for="media_promosi" class="form-label">Media Promosi</label>
                <input type="text" name="media_promosi" placeholder="Nama Akun Instagram (Awali dengan @)" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<script>

    function validateInput(input) {
    let inputValue = input.value;

    if (inputValue.length > 0 && inputValue.length < 13) {
        let errorMessage = 'Panjang Angka yang anda masukkan kurang dari 13';
        document.getElementById('error-message').innerHTML = errorMessage;
        input.value = '';
    }
}

</script>

@endsection