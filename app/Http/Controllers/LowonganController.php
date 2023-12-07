<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lowongan;
use App\Models\Alumni;
use App\Models\Perusahaan;
use DB;



class LowonganController extends Controller
{
    //
    function show(){
        $data['lowongan'] =DB::table('lowongan')
        ->leftJoin('perusahaan','lowongan.id_perusahaan','=','perusahaan.id_perusahaan')
        ->get();
        $data['lowongan'] =DB::table('lowongan')
        ->leftJoin('alumni','lowongan.nis','=','alumni.nis')
        ->get();
        $data['lowongan'] =Lowongan::all();
        return view('lowongan',
        $data);
    }

    function add(){
        $data=[
            'action'=>url('lowongan/create'),
            'tombol'=>'simpan',
            'lowongan'=>(object)[
                'nis'=>'',
                'id_perusahaan'=>'',
                'tanggal'=>'',
                'judul'=>'',
                'deskripsi'=>'',
                'status'=>'',

            ]
            ];
            $data ['alumni'] = Alumni::all();
            $data ['perusahaan'] = Perusahaan::all();
            return view('form_lowongan',$data);
    }

    function create(Request $request){
        Lowongan::create([
            'nis'=> $request->nis,
            'id_perusahaan'=> $request->id_perusahaan,
            'tanggal'=>$request->tanggal,
            'judul'=> $request->judul,
            'deskripsi'=> $request->deskripsi,
            'status'=>'active'

        ]);
        return redirect('lowongan');
    }

    function edit($id){
        $data['perusahaan'] = Perusahaan::all();
        $data['alumni'] = Alumni::all();
        $data['lowongan'] = Lowongan::where('id_loker', $id)->first();
        $data['action'] = url('lowongan/update').'/'.$data['lowongan']->id_loker;
        $data['tombol'] = "Update";

        return view('form_lowongan'.$data);
    }

    function update(Request $request){
        Lowongan::where('id_loker', $request->id_loker)->update([
            'id_perusahaan'=>$request->id_perusahaan,
            'nis'=>$request->nis,
            'tanggal'=>$request->tanggal,
            'judul'=>$request->judul,
            'deskripsi'=>$request->deskripsi,
            'status'=>$request->status,
        ]);
        return redirect('lowongan');
    }
    function delete($id_loker){
        Lowongan::where('id_loker',$id_loker)->delete();
        return redirect('lowongan');
}
}