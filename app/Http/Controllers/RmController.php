<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RekamMedis;
use App\Models\Retensi;
use Illuminate\Support\Facades\File;

class RmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rm = RekamMedis::all();
        return view('rm-library.index', compact(
            'rm'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rm-library.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $rm = new RekamMedis();
            $rm->rm = $request->rm; 
            $rm->nama = $request->nama; 
            $rm->tahun = $request->tahun; 
            $rm->jenis_kelamin = $request->jenis_kelamin;

            //upload foto_kelas
           

            $rm->save();

            $retensi = new Retensi();
            $retensi->rekam_medis_id = $rm->id;
            $file_rm = '';
            if ($request->hasFile('file_rm')) {
                $file = $request->file('file_rm');
                $originalName1 = $rm->rm . '-' . $file->getClientOriginalName();
                $file_rm = $originalName1;
                $file->move('uploads/file/rm/'. $rm->rm, $file_rm);
            }
            $retensi->nama_file = $file_rm;

            $retensi->save();
            
            //$totalBerkas = count($request->file);
            // dd($totalBerkas);
            // if (!empty($request->file)) {
            //     // buat data berkas
            //     $totalBerkas = count($request->file);
            //     $collectNamaBerkas = [];
            //     //$destinationPath = 'uploads/rm/'.$rm->rm;
    
            //     for ($i = 0; $i < $totalBerkas; $i++) {
            //         if ($request->hasFile('file.'.$i)) {
            //             $file = $request->file('file')[$i];
            //             $originalName = $rm->rm . '-' . $file->getClientOriginalName();
            //             $file = $originalName;
            //             $file->move('uploads/rm', $file);
    
            //             array_push($collectNamaBerkas, $file);
            //         }
            //     }
    
            //     $saveBerkas = count($collectNamaBerkas);
    
            //     $retensi = new Retensi();
            //     $retensi->rekam_medis_id = $rm->id;
    
            //     for ($i = 0; $i < $saveBerkas; $i++) {
            //         $retensi->nama_file = $collectNamaBerkas[$i];
            //     }
            //     $retensi->save();
               
            // }
            // dd($retensi);

            // for ($i = 0; $i < $totalBerkas; $i++) {
            //     $retensi = new Retensi();
            //     $retensi->rekam_medis_id = $rm->id;

            //     $file = '';
            //     if ($request->hasFile('file')[$i]) {
            //         $retensi = $request->file('file')[$i];
            //         $originalName1 = $rm->rm . '-' . $file->getClientOriginalName();
            //         $file = $originalName1;
            //         $retensi->move('uploads/rm/'. $rm->rm, $file);
            //     }
            //     $retensi->file = $file;
            //     $retensi->save();  
            // }

            toast('Berhasil Menambahkan Data', 'success');
            return redirect('/admin/rm');
        } catch (\Throwable $th) {
            toast('Terjadi kesalahan pada inputan, mohon diperiksa ulang!','error');
            return back();
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
