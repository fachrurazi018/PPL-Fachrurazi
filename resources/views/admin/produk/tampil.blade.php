@extends('layouts.admin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data Produk Unggulan</h6>
    </div>
    <div class="card-body">
        <form action="/admin/updateproduk/{{ $data->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="umkm_id">Nama Usaha</label>
                <select class="form-select" id="umkm_id" name="umkm_id" aria-label="Choose category">
                    @foreach ($item as $umkm)
                        <option selected disabled>{{ $umkm->nama_usaha}}</option>
                        <option value="{{ $umkm->id }}">{{ $umkm->nama_usaha }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <br>
                @if($data->gambar)
                    <img src="{{ asset('images/' . $data->gambar) }}" alt="Gambar Sebelumnya" width="200">
                @else
                    <p>Tidak ada gambar sebelumnya.</p>
                @endif
            </div>
            
            <div class="mb-3">
                <label for="gambar" class="form-label">Pilih Gambar Baru</label>
                <input class="form-control" type="file" name="gambar" id="formFileMultiple" multiple>
            </div>
            
            <div class="mb-3">
                <label for="nama_gambar" class="form-label">Keterangan</label>
                <input type="text" name="nama_gambar" value="{{ $data->nama_gambar }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


@endsection