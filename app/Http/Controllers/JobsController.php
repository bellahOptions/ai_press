<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index() {
        return view('jobs.index');
    }

    public function create() {
        return view('jobs.create');
    }

    public function track() {
        return view('jobs.track');
    }
}
