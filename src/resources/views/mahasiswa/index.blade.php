@extends('layout.template')
@section('konten')

{{-- pengkondisian --}}
@if (Session::has('success'))
<div class="pt-3">
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
</div>
@endif

<!-- START DATA -->
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <!-- FORM PENCARIAN -->
    <div class="pb-3">
        <form class="d-flex" action="" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}"
                placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
    </div>

    <!-- TOMBOL TAMBAH DATA -->
    <div class="pb-3">
        <a href='{{ url('mahasiswa/create') }}' class="btn btn-primary">+ Tambah Data</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-3">NIM</th>
                <th class="col-md-4">Nama</th>
                <th class="col-md-2">Jurusan</th>
                <th class="col-md-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = $datamahasiswa->firstItem() ?>
            @foreach ($datamahasiswa as $item)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $item->NIM }}</td>
                <td>{{ $item->Nama }}</td>
                <td>{{ $item->Jurusan }}</td>
                <td>
                    <a href='{{ url('mahasiswa/'.$item->NIM.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                    <form class="d-inline" action="{{ url('mahasiswa/'.$item->NIM) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                    
                    </form>
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach

        </tbody>
    </table>
    {{ $datamahasiswa->links() }}
</div>
<!-- AKHIR DATA -->
@endsection