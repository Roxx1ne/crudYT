<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use App\Http\Controllers\mahasiswaController\length;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\FlareClient\Truncation;

class mahasiswacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = mahasiswa::orderBy('NIM', 'asc')->paginate(5);
        return view('mahasiswa.index')->with('datamahasiswa', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       Session::flash('NIM', $request->nim);
       Session::flash('Nama', $request->nama);
       Session::flash('Jurusan', $request->jurusan);

        $request->validate([
            'nim' => 'required|numeric|unique:mahasiswa,NIM',
            'nama' => 'required',
            'jurusan' => 'required',
        ],[
            'nim.numeric'=>'NIM wajib diisi dengan angka',
            'nim.unique'=> 'NIM sduah terpakai di database',
        ]);
        $data = [
            'NIM'=>$request->nim,
            'Nama'=>$request->nama,
            'Jurusan'=>$request->jurusan,

        ];
        mahasiswa::create($data);
        return redirect()->to('mahasiswa')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = mahasiswa::where('NIM', $id)->first();
        return view('mahasiswa.edit')->with('datamahasiswa', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jurusan' => 'required',
        ]
        );
        $data = [
            'Nama'=>$request->nama,
            'Jurusan'=>$request->jurusan,

        ];
        mahasiswa::where('NIM', $id)->update($data);
        return redirect()->to('mahasiswa')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        mahasiswa::where('NIM', $id)->delete();
        return redirect()->to('mahasiswa')->with('success', 'Berhasil melakukan delete data');
    }
}
