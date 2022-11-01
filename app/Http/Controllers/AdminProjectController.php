<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Project;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminProjectController extends Controller
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
        $role = auth()->user()->role;

        if ($role == 'admin') {
            if ($cari) {
                $project = Project::where('name', 'like', '%' . $cari . '%')->latest()->paginate(10);
            } else {
                $project = Project::latest()->paginate(10);
            }
        } else {
            $nim = auth()->user()->nim;
            if ($cari) {
                $project = Project::whereNim($nim)->where('name', 'like', '%' . $cari . '%')->latest()->paginate(10);
            } else {
                $project = Project::whereNim($nim)->latest()->paginate(10);
            }
        }

        $data = [
            'title'   => 'Manajemen Project',
            'project' => $project,
            'content' => 'admin/project/index'
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
            'title'   => 'Manajemen Project',
            'kategori'  => Kategori::get(),
            'content' => 'admin/project/add'
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
        $data = $request->validate([
            'nim'           => 'required',
            'name'              => 'required',
            'desc'              => 'required',
            'kategori_id'              => 'required',
            'file'              => 'required:mimes:zip,rar',
        ]);

        //perbaiki upload imagenya
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file_name = time() . "_" . $file->getClientOriginalName();

            $storage = 'uploads/projects/';
            $file->move($storage, $file_name);
            $data['file'] = $storage . $file_name;
        } else {
            $data['file'] = NULL;
        }

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $cover_name = time() . "_" . $cover->getClientOriginalName();

            $storage = 'uploads/images/';
            $cover->move($storage, $cover_name);
            $data['cover'] = $storage . $cover_name;
        } else {
            $data['cover'] = null;
        }

        Project::create($data);
        Alert::success('Sukses', 'Project telah ditambahkan');
        return redirect('/admin/project');
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
        $data = [
            'title'   => 'Manajemen Project',
            'project'    => Project::find($id),
            'content' => 'admin/project/show'
        ];
        return view('admin.layouts.wrapper', $data);
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
        $data = [
            'title'   => 'Manajemen Project',
            'project'    => Project::find($id),
            'kategori'  => Kategori::get(),
            'content' => 'admin/project/add'
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
        //
        // die('Adakah');
        $project = Project::find($id);
        $data = $request->validate([
            'nim'        => 'required',
            'name'              => 'required',
            'desc'              => 'required',
            'kategori_id'              => 'required',
            'file'              => 'mimes:zip,rar',
        ]);

        //perbaiki upload imagenya
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file_name = time() . "_" . $file->getClientOriginalName();

            $storage = 'uploads/projects/';
            $file->move($storage, $file_name);
            $data['file'] = $storage . $file_name;
        } else {
            $data['file'] = $project->file;
        }


        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $cover_name = time() . "_" . $cover->getClientOriginalName();

            $storage = 'uploads/images/';
            $cover->move($storage, $cover_name);
            $data['cover'] = $storage . $cover_name;
        } else {
            $data['cover'] = $project->cover;
        }

        $project->update($data);
        Alert::success('Sukses', 'Project telah diubah');
        return redirect('/admin/project');
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
        $project = Project::find($id);
        if ($project->file != '') {
            unlink($project->file);
        }

        if ($project->cover != '') {
            unlink($project->cover);
        }

        $project->delete();
        Alert::success('Sukses', 'Project sukses dihapus');
        return redirect('/admin/project/');
    }


    function download()
    {
        $pathToFile = request('path');
        // die($pathToFile);
        return response()->download($pathToFile);
    }
}
