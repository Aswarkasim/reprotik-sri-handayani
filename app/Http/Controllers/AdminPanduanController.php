<?php

namespace App\Http\Controllers;

use App\Models\Panduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AdminPanduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cari = request('cari');

        if ($cari) {
            $panduan = Panduan::where('name', 'like', '%' . $cari . '%')->latest()->paginate(10);
        } else {
            $panduan = Panduan::latest()->paginate(10);
        }
        $data = [
            'title'   => 'Manajemen Panduan',
            'panduan' => $panduan,
            'content' => 'admin/panduan/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = [
            'title'   => 'Manajemen Panduan Artikel',
            'content' => 'admin/panduan/add'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // print_r($request);
        // die;
        // dd($request);
        $data = $request->validate([
            'name'              => 'required|min:3',
            'file'              => 'mimes:pdf'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file_name = time() . "_" . $file->getClientOriginalName();

            $storage = 'uploads/documents/';
            $file->move($storage, $file_name);
            $data['file'] = $storage . $file_name;
        } else {
            $data['file'] = NULL;
        }

        Panduan::create($data);
        Alert::success('Sukses', 'Panduan telah ditambahkan');
        return redirect('/admin/panduan');
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
        $panduan = Panduan::find($id);
        $data = [
            'title'   => 'Edit Panduan',
            'panduan' => $panduan,
            'content' => 'admin/panduan/add'
        ];
        return view('admin/layouts/wrapper', $data);
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
        $panduan = Panduan::find($id);
        $data = $request->validate([
            'name'              => 'required|min:3',
        ]);

        if ($request->hasFile('file')) {

            if ($panduan->file != '') {
                unlink($panduan->file);
            }

            $file = $request->file('file');
            $file_name = time() . "_" . $file->getClientOriginalName();

            $storage = 'uploads/documents/';
            $file->move($storage, $file_name);
            $data['file'] = $storage . $file_name;
        } else {
            $data['file'] = $panduan->file;
        }

        $panduan->update($data);
        Alert::success('Sukses', 'Panduan telah diubah');
        return redirect('/admin/panduan');
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
        $panduan = Panduan::find($id);
        DB::table('panduans')->delete($id);
        if ($panduan->file != '') {
            unlink($panduan->file);
        }

        Alert::success('success', 'Panduan telah dihapus');
        return redirect('/admin/panduan');
    }

    function download()
    {
        // $panduan = Panduan::find($id);
        $path = request('path');
        $name = request('name');
        return response()->download($path);
    }
}
