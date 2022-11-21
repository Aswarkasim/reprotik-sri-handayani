<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AdminVideoController extends Controller
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
            $video = Video::where('name', 'like', '%' . $cari . '%')->latest()->paginate(10);
        } else {
            $video = Video::latest()->paginate(10);
        }
        $data = [
            'title'   => 'Manajemen Video',
            'video' => $video,
            'content' => 'admin/video/index'
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
            'title'   => 'Manajemen Video Artikel',
            'content' => 'admin/video/add'
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
            'name'              => 'required',
            'link'              => 'required',
        ]);
        Video::create($data);
        Alert::success('Sukses', 'Video telah ditambahkan');
        return redirect('/admin/video');
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
        $video = Video::find($id);
        $data = [
            'title'   => $video->name,
            'video' => $video,
            'content' => 'admin/video/show'
        ];
        return view('admin/layouts/wrapper', $data);
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
        $video = Video::find($id);
        $data = [
            'title'   => 'Edit Video',
            'video' => $video,
            'content' => 'admin/video/add'
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
        $video = Video::find($id);
        $data = $request->validate([
            'name'              => 'required',
            'link'              => 'required',
        ]);
        $video->update($data);
        Alert::success('Sukses', 'Video telah diubah');
        return redirect('/admin/video');
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
        DB::table('videos')->delete($id);
        Alert::success('success', 'Kateogri telah dihapus');
        return redirect('/admin/video');
    }
}
