@extends('layouts.app_sneat')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
    <!-- Content -->

    <div>
        <h4 class="fw-bold py-1 mb-4"><span class="text-muted fw-light">{{ $access_menu }} /</span> {{ $title }}</h4>

        <div class="row">
            <div class="col-xl-2">
                <!-- File input -->
                <div class="card">
                <div class="card-body">
                    <img src="{{ \Storage::url($model->foto ?? 'images/no-image.png') }}" width="165"/>
                </div>
                </div>
            </div>
        
            <div class="col-md-10">
                <h5>Biodata Siswa</h5>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="form-floating">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <td width="25%">ID Siswa</td><td style="text-align: center">:</td><td>{{ $model->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Lengkap</td><td style="text-align: center">:</td><td>{{ $model->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>No. Induk Sekolah Nasional</td><td style="text-align: center; vertical-align: middle">:</td><td>{{ $model->nisn }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kelas / Jurusan</td><td style="text-align: center; vertical-align: middle">:</td><td>{{ $model->kelas . ' - ' . $model->jurusan . ' - ' . $model->angkatan . '/' . $model->angkatan + 1}}</td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-2">
            </div>
        
            <div class="col-md-10">
                <h5>Data Wali Murid</h5>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="form-floating">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <td width="26%">Nama Wali / Orang Tua</td><td style="text-align: center">:</td><td>{{ $model->wali->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td><td style="text-align: center">:</td><td>{{ $model->wali->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>No. HP</td><td style="text-align: center">:</td><td>{{ $model->wali->nohp }}</td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
    </div>
    <!-- Content wrapper -->
@endsection
