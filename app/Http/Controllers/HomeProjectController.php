<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class HomeProjectController extends Controller
{
    //
    function index()
    {

        $data = [
            'project'   => Project::with('kategori')->orderBy('created_at', 'desc')->paginate(12),
            'content'  => 'home/project/index'
        ];
        return view('home/layouts/wrapper', $data);
    }

    function show($id)
    {
        $project = Project::with(['user', 'kategori'])->find($id);
        // dd($project);
        $data = [
            'project'   => $project,
            'content'  => 'home/project/show'
        ];
        return view('home/layouts/wrapper', $data);
    }

    function download()
    {
        $pathToFile = request('path');
        // die($pathToFile);
        return response()->download($pathToFile);
    }
}
