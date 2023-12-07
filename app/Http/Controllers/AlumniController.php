<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumni;

class AlumniController extends Controller
{
    function show(){
        $data['alumni'] = Alumni::all();

        return view('alumni', $data);
    }

    function add(){
        $data =[
            'action'=>url('alumni/create'),
            'tombol'=>'simpan',
            'alumni'=>(object)[
                'nis'=>'',
                'password'=>'',
                'nama'=>'',
                'jk'=>'',
                'jurusan'=>'',
                'tgl_lahir'=>'',
                'alamat'=>'',
                'telpon'=>'',
                'thn_ajaran'=>'',
                'foto'=>''
                
            ]
            ];
            return view('form_alumni',$data);
    }
    function create(Request $request){
        Alumni::create([
            'nis'=>$request->nis,
            'password'=>$request->password,
            'nama'=>$request->nama,
            'jk'=>$request->jk,
            'jurusan'=>$request->jurusan,
            'tgl_lahir'=>$request->tgl_lahir,
            'alamat'=>$request->alamat,
            'telpon'=>$request->telpon,
            'thn_ajaran'=>$request->thn_ajaran,
            'foto'=>$request->file('foto')->store('foto') 
        ]);
        return redirect('alumni');
    }
    function delete($nis){
        Alumni::where('nis',$nis)->delete();
        return redirect('alumni');
    }
    function edit($nis){
        $data['alumni'] = Alumni::where('nis',$nis)->first();
        $data['action'] = url('alumni/update').'/'.$data['alumni']->nis;
        $data['tombol'] = 'Update';
        return view('form_alumni',$data);

    }
    function update(Request $request){
        $data = Alumni::where('nis',$request->nis)->first();
        if($request->foto == ''){
            $foto = $data->foto;
        }else{

            $foto = $request->file('foto')->store('foto');
        }
        Alumni::where('nis', $request->nis)->update([
            'nis'=>$request->nis,
            'password'=>$request->password,
            'nama'=>$request->nama,
            'jk'=>$request->jk,
            'jurusan'=>$request->jurusan,
            'tgl_lahir'=>$request->tgl_lahir,
            'alamat'=>$request->alamat,
            'telpon'=>$request->telpon,
            'thn_ajaran'=>$request->thn_ajaran,
            'foto'=>$foto
        ]);
        return redirect('alumni');
    }
}
