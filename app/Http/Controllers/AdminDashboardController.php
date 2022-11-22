<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    //
    function index()
    {


        $role = auth()->user()->role;
        // die($role);
        if ($role == 'user') {
            $project = Project::whereNim(auth()->user()->nim)->count();
        } else {
            $project = Project::count();
        }
        $data = [
            'project' => $project,
            'mahasiswa' => User::whereRole('user')->count(),
            'kategori'  => Kategori::count(),
            'content' => 'admin/dashboard/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }
}
