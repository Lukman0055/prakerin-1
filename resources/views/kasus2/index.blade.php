@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        Data Kasus Lokal
                        
                    </div>
                    
                    <div class="card-body">
                        <a href="{{route('kasus2.create')}}" class="btn btn-success mb-3 float-right"><i class="fa fa-plus-circle"></i>
                                Tambah Data
                        </a>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th><center>Lokasi</center></th>
                                        <th><center>RW</center></th>
                                        <th><center>Kasus Positif</center></th>
                                        <th><center>Kasus Meninggal</center></th>
                                        <th><center>Kasus Sembuh</center></th>
                                        <th><center>Tanggal</center></th>
                                        <th><center>Aksi</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach($kasus2 as $data)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td><center>
                                            Kelurahan : {{ $data->rw->kelurahan->nama_kelurahan }} <br>
                                            Kecamatan : {{ $data->rw->kelurahan->kecamatan->nama_kecamatan }} <br>
                                            Kota : {{ $data->rw->kelurahan->kecamatan->kota->nama_kota }} <br>
                                            Provinsi : {{ $data->rw->kelurahan->kecamatan->kota->provinsi->nama_provinsi }}
                                            </center>
                                        </td>
                                        <td><center>{{ $data->rw->nama }}</center></td>
                                        <td><center>{{ $data->jml_positif }}</center></td>
                                        <td><center>{{ $data->jml_meninggal}}</center></td>
                                        <td><center>{{ $data->jml_sembuh }}</center></td>
                                        <td><center>{{ $data->tanggal }}</center></td>
                                        <td style="text-align: center;">
                                            <form action="{{route('kasus2.destroy',$data->id)}}" method="POST">
                                                @csrf
                                                <a href="{{route('kasus2.edit',$data->id)}}" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"> Edit</i></a> 
                                                <button type="submit" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-alt"> Hapus</i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection