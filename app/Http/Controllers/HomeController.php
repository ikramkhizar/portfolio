<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke() {
    	$profile  = User::first(['id','name'])->load('user_profile:user_id,avatar,designation,about');
    	$projects = Project::oldest('position')->get(['id','title','description']);

    	return view('home')->with('profile', $profile)->with('projects', $projects);
    }
}
