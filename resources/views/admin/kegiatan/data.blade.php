@extends('layouts.admin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Kegiatan</h6>
    </div>
    <div class="card-body">
        <div class="button-container">
            <a href="{{ route('tambahkegiatan') }}" class="tambah"><i class="fa fa-plus"></i> Tambah</a>
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
                    <col style="width: 15%;"> 
                    <col style="width: 15%;"> 
                    <col style="width: 30%;"> 
                    <col style="width: 20%;"> 
                    <col style="width: 15%;"> 
                </colgroup>
                <thead class="text-center">
                    <tr>
                        <th>No.</th>
                        <th>Nama Usaha</th>
                        <th>Nama Kegiatan</th>
                        <th>Gambar</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($data as $kegiatan)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $kegiatan->nama_usaha}}</td>
                        <td>{{ $kegiatan->nama_kegiatan }}</td>
                        <td>
                            <img src="{{ asset('images/' . $kegiatan->gambar_kegiatan) }}" alt="Gambar Produk" width="150" height="100">
                        </td>
                        <td>{{ $kegiatan->penjelasan }}</td>
                        <td>
                            <a href="/admin/tampilkankegiatan/{{ $kegiatan->id }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            <button onclick="confirmDelete({{ $kegiatan->id }})" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
            window.location.href = '/admin/deletekegiatan/' + id;
        }
    }
</script>

@endsection