@extends('layouts.admin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data UMKM</h6>
    </div>
    <div class="card-body">
        <div class="button-container">
            <a href="{{ route('tambahumkm') }}" class="tambah"><i class="fa fa-plus"></i> Tambah</a>
        </div>
        <div class="table-responsive">
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <colgroup>
                    <col style="width: 5%;"> 
                    <col style="width: 10%;"> 
                    <col style="width: 10%;"> 
                    <col style="width: 12%;"> 
                    <col style="width: 10%;"> 
                    <col style="width: 20%;"> 
                    <col style="width: 10%;"> 
                    <col style="width: 13%;"> 
                    <col style="width: 10%;"> 
                </colgroup>
                <thead class="text-center">
                    <tr>
                        <th>No.</th>
                        <th>NIB</th>
                        <th>Nama Usaha</th>
                        <th>Pemilik Usaha</th>
                        <th>Jenis</th>
                        <th>Alamat</th>
                        <th>Kontak</th>
                        <th>Media Promosi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($data as $umkm)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $umkm->nib }}</td>
                        <td>{{ $umkm->nama_usaha }}</td>
                        <td>{{ $umkm->pemilik_usaha }}</td>
                        <td>{{ $umkm->jenis }}</td>
                        <td>{{ $umkm->alamat }}</td>
                        <td>(+62){{ $umkm->no_telpon }}</td>
                        <td>{{ $umkm->media_promosi }}</td>
                        <td>
                            <a href="/admin/tampilkanumkm/{{ $umkm->id }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            <button onclick="confirmDelete({{ $umkm->id }})" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function confirmDelete(id) {
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            // Redirect ke route delete jika konfirmasi diterima
            window.location.href = '/admin/delete/' + id;
        }
    }
</script>
  
@endsection