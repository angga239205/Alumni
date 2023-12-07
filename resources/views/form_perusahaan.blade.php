<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dokument</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    </head>
    <body>
@extends('admin')
@section('content') 
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-600">Perusahaan-Input</h1>
    </div>
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0 font-bold text-primary">Input Data Perusahaan</h6>
                </div>
                <div class="card-body">
                    <form action="{{ $action }}" method="post" enctype="multipart/form-data">
                        @csrf
                      <div class="mb-2">
                        <label for="" class="form_label">Nama</label>
                        <input type="text" nama="nama_per" id="nama_per" class="form-control" value="{{ $perusahaan->nama_per}}" pleceholder="masukan nama perusahaan">
                      </div>
                      <div class="mb-2">
                        <label for="" class="form_label">Telepon</label>
                        <input type="text" nama="telpon" id="telpon" class="form-control" value="{{ $perusahaan->telpon}}" pleceholder="masukan telepon perusahaan">
                      </div>
                      <div class="mb-2">
                        <label for="" class="form_label">Alamat</label>
                        <input type="text" nama="alamat" id="alamat" class="form-control" value="{{ $perusahaan->alamat}}" pleceholder="masukan alamat perusahaan">
                      </div>
                      
                        <div class="mb-2">
                            <td colspan="2" align="center">    
                                <input class="btn btn-primary" type="submit" value="simpan" style="width: 100%">
                            </td>
                        </div>
                    </form>
                </div>
            </div>
</body>
</html>
@endsection