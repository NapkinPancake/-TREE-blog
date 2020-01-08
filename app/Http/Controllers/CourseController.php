<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
use App\User;

class CourseController extends Controller
{
    public function index() {
        return view('course/index');
    }
}
