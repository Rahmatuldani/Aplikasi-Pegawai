@extends('layouts.app')

@section('content')
<h4 class="mt-2">Data Pegawai</h4>
<hr>
<a href="{{ route('pegawai.create') }}" class="btn btn-success"><i class="oi oi-plus"></i>Tambah</a>

@if ($message = Session::get('success'))
<div class="alert alert-success mt-3 pb-0">
    <p>{{ $message }}</p>
</div>
@endif

<div class="table-responsive mt-3">
    <table class="table table-stripped table-hover table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Jabatan</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pegawai as $data)
            <tr>
                <td><?= ++$no ?></td>
                <td><img src="{{ asset('images/'.$data['foto']) }}" alt="" width="100"></td>
                <td><?= $data['nama_pegawai'] ?></td>
                <td><?= $data['jenis_kelamin'] ?></td>
                <td><?= $data['tgl_lahir'] ?></td>
                <td><?= $data['nama_jabatan'] ?></td>
                <td><?= $data['keterangan'] ?></td>
                <td>
                    <a href="{{ route('pegawai.edit', $data['id_pegawai']) }}" class="btn btn-sm btn-info"><i class="oi oi-pencil"></i>Edit</a>
                    <form action="{{ route('pegawai.destroy', $data['id_pegawai']) }}" method="post" class="d-inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-sm btn-danger"><i class="oi oi-trash"></i>Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection