@extends('layouts.admin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Produk Unggulan</h6>
    </div>
    <div class="card-body">
        <form action="/admin/insertproduk" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="umkm_id">Nama Usaha</label>
                <select class="form-select" id="umkm_id" name="umkm_id" aria-label="Choose category">
                    <option selected disabled>Choose an option</option>
                    @foreach ($data as $umkm)
                        <option value="{{ $umkm->id }}">{{ $umkm->nama_usaha }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input class="form-control" type="file" name="gambar" id="formFileMultiple" multiple>
            </div>
            <div class="mb-3">
                <label for="nama_gambar" class="form-label">Keterangan</label>
                <input type="text" name="nama_gambar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


@endsection