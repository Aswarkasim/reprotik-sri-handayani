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
            'project'   => Project::paginate(12),
            'content'  => 'home/project/index'
        ];
        return view('home/layouts/wrapper', $data);
    }
}
