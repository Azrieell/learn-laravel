<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Jurusan;
use App\Imports\SiswaImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::all();
        return view('siswa.index', compact('siswa')); //mengirim data ke halaman
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $siswa = Siswa::all();
        $siswa = Jurusan::all();
        return view('siswa.tambah', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $siswa = new Siswa(); //nama model
        $siswa->nama = $request->nama;
        $siswa->alamat = $request->alamat;
        $siswa->no_telpon = $request->no_telpon;
        $siswa->jurusan_id = $request->jurusan_id;

        $siswa->save(); return redirect('/siswa');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $siswa = Siswa::find($id);
        return view('siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $siswa= Siswa::find($id);

        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id); //nama model
        $siswa->nama = $request->nama;
        $siswa->alamat = $request->alamat;
        $siswa->no_telpon = $request->no_telpon;

        $siswa->save(); return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        if($siswa){
            $siswa->delete();
        }
        return redirect('/');
    }


    public function import(){
        return view('siswa.import');
    }

    public function importExcelData(Request $request){
        $request->validate([
            'import_file' => [
                'required',
                'file'
            ],
        ]);

        Excel::import(new SiswaImport, $request->file('import_file'));

        return redirect()->back()->with('status', 'Imported Successfully');
    }
}
