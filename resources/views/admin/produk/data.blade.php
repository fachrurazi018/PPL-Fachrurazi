@extends('layouts.admin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Produk Unggulan</h6>
    </div>
    <div class="card-body">
        <div class="button-container">
            <a href="{{ route('tambahproduk') }}" class="tambah"><i class="fa fa-plus"></i> Tambah</a>
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
                    <col style="width: 20%;"> 
                    <col style="width: 35%;"> 
                    <col style="width: 20%;"> 
                    <col style="width: 20%;"> 
                </colgroup>
                <thead class="text-center">
                    <tr>
                        <th>No.</th>
                        <th>Nama Usaha</th>
                        <th>Gambar</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($data as $produk)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $produk->nama_usaha}}</td>
                        <td>
                            <img src="{{ asset('images/' . $produk->gambar) }}" alt="Gambar Produk" width="150" height="100">
                        </td>
                        <td>{{ $produk->nama_gambar }}</td>
                        <td>
                            <a href="/admin/tampilkanproduk/{{ $produk->id }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            <button onclick="confirmDelete({{ $produk->id }})" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
            window.location.href = '/admin/deleteproduk/' + id;
        }
    }
</script>

@endsection