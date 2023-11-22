@extends('layouts.admin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data Produk Unggulan</h6>
    </div>
    <div class="card-body">
        <form action="/admin/updatekegiatan/{{ $data->id }}" method="POST" enctype="multipart/form-data">
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
                <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                <input type="text" name="nama_kegiatan" value="{{ $data->nama_kegiatan }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="gambar_kegiatan" class="form-label">Gambar</label>
                <br>
                @if($data->gambar_kegiatan)
                    <img src="{{ asset('images/' . $data->gambar_kegiatan) }}" alt="Gambar Sebelumnya" width="200">
                @else
                    <p>Tidak ada gambar sebelumnya.</p>
                @endif
            </div>
            
            <div class="mb-3">
                <label for="gambar_kegiatan" class="form-label">Pilih Gambar Baru</label>
                <input class="form-control" type="file" name="gambar_kegiatan" id="formFileMultiple" multiple>
            </div>
            
            <div class="mb-3">
                <label for="penjelasan" class="form-label">Deskripsi Kegiatan</label>
                <input type="text" name="penjelasan" value="{{ $data->penjelasan }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


@endsection