<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dokument</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    </head>
    @extends('admin')
    @section('content')
<body>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-600">Lowongan-Input</h1>
    </div>
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0 font-bold text-primary">Input Data Lowongan</h6>
                </div>
                <div class="card-body">
                    <form action="{{ $action }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label for="" class="form-label">Alumni</label>
                            <select name="nis" id="nis" class="form-select" >
                                <option value="">Alumni</option>
                                @foreach ($alumni as $item)
                                <option value="{{ $item->nis }}" name="nis" {{ $item->nis==$lowongan->nis?'selected':'' }}>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div> 
                        <div class="mb-2">
                            <label for="" class="form-label">Perusahaan</label>
                            <select name="id_perusahaan" id="id_perusahaan" class="form-select" >
                                <option value="">Perusahaan</option>
                                @foreach ($perusahaan as $item)
                                <option value="{{ $item->id_perusahaan }}" name="id_perusahaan" {{ $item->id_perusahaan==$lowongan->id_perusahaan?'selected':'' }}>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div> 
                        <div class="mb-2">
                            <label for="" class="form-label">Judul</label>
                            <input type="text" name="judul" id="judul" class="form-control" value="{{ $lowongan->judul }}" placeholder="Masukan Judul">
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Deskripsi</label>
                            <input type="text" name="deskripsi" id="deskripsi" class="form-control" value="{{ $lowongan->deskripsi }}" placeholder="Masukan Deskripsi">
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $lowongan->tanggal }}" placeholder="Masukan Tanggal">
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Status</label>
                           <select name="status" id="status" class="form-select">
                           <option value="">--Pilih--</option>
                           <option value="Aktif"{{ $lowongan->status=='Aktif'?'selected':''}}>Aktif</option>
                           <option value="Tidak Aktif"{{ $lowongan->status=='Tidak Aktif'?'selected':''}}>Tidak Aktif</option>
                           </select>
                        </div>
                        <div class="mb-2">
                            <td colspan="2" align="center">    
                                <input class="btn btn-primary" type="submit" value="{{ $tombol }}" style="width: 100%">
                            </td>
                        </div>
                    </form>
                </div>
            </div>
</body>
</html>
@endsection