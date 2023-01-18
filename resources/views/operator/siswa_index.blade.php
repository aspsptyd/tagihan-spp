@extends('layouts.app_sneat')

@section('content')
    <div class="row justify-content-center">
        
        <h4 class="fw-bold py-1 mb-4"><span class="text-muted fw-light">Home /</span> {{ $title }}</h4>

        <div class="col-md-12">
            <div class="card">
        
                <div class="card-body">
                    <a href="{{ route($routePrefix . '.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
                    <div class="table-responsive mt-4">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Wali Murid</th>
                                    <th>Nama Siswa</th>
                                    <th>NISN</th>
                                    <th>Jurusan</th>
                                    <th>Kelas</th>
                                    <th>Angkatan</th>
                                    <th style="text-align: center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($models as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        @if ($item->wali->name == "Belum ada wali murid")
                                            <td style="color: red"><b>{{ $item->wali->name }}</b></td>
                                        @else 
                                            <td>{{ $item->wali->name }}</td>
                                        @endif
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->nisn }}</td>
                                        <td>{{ $item->jurusan }}</td>
                                        <td>{{ $item->kelas }}</td>
                                        <td>{{ $item->angkatan . '/' . $item->angkatan + 1 }}</td>
                                        <td style="text-align: center">
                                            {!! Form::open([
                                                'route' => [ $routePrefix . '.destroy', $item->id],
                                                'method' => 'DELETE',
                                                'onsubmit' => 'return confirm("Yakin ingin menghapus data ini?")'
                                            ]) !!}
                                            <a href="{{ route($routePrefix . '.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>&emsp;Edit</a>
                                            <a href="{{ route($routePrefix . '.show', $item->id) }}" class="btn btn-info btn-sm"><i class="fa fa-user"></i>&emsp;Details</a>
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&emsp;Hapus</button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" style="text-align: center">Data tidak ada</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {!! $models->links() !!}
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
