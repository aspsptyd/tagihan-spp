@extends('layouts.app_sneat')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
    <!-- Content -->

    <div>
        <h4 class="fw-bold py-1 mb-4"><span class="text-muted fw-light"> Home / </span><span class="text-muted fw-light">{{ $access_menu }} /</span> {{ $title }}</h4>

        <div class="row">
            <div class="col-xl-2">
                <!-- File input -->
                <div class="card">
                <div class="card-body">
                    <img src="{{ \Storage::url($model->foto ?? 'images/no-image.png') }}" width="165"/>
                    <h5 class="mt-4" style="text-align: center">{{ $model->name }}</h5>

                    <div class="divider">
                        <div class="divider-text">Prestasi</div>
                    </div>

                    <center>
                        <div class="small-ratings align-items-center">
                            <i class="fa fa-star rating-color"></i>
                            <i class="fa fa-star rating-color"></i>
                            <i class="fa fa-star rating-color"></i>
                            <i class="fa fa-star rating-color"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <h6 class="mt-2">Ranking 5</h6>
                    </center>
                </div>
                </div>
            </div>
        
            <div class="col-md-10">
                <h5>Informasi Wali Murid</h5>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="form-floating">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <td width="25%">ID Wali Murid</td><td style="text-align: center">:</td><td>{{ $model->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Lengkap</td><td style="text-align: center">:</td><td>{{ $model->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>No. Handphone / WA</td><td style="text-align: center; vertical-align: middle">:</td><td>{{ $model->nohp }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td><td style="text-align: center; vertical-align: middle">:</td><td>{{ $model->email }}</td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <h5>Data Anak</h5>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="form-floating">
                            <table class="table table-stripped table-sm">
                                <thead>
                                    <tr>
                                        <th width="5%" style="text-align: center">No</th>
                                        <th>Nama Siswa</th>
                                        <th style="text-align: center">NISN</th>
                                        <th style="text-align: center">Kelas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($model->siswa as $item)
                                        <tr>
                                            <td style="text-align: center">{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td style="text-align: center">{{ $item->nisn }}</td>
                                            <td style="text-align: center">{{ $item->kelas }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="8" style="text-align: center">Data tidak ada</td>
                                        </tr>
                                    @endforelse
                                </tbody>
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
