<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('education.index');
    }

    public function education1(){
        return view('education.education1');
    }

    public function education2(){
        return view('education.education2');
    }

    public function education3(){
        return view('education.education3');
    }

    public function education4(){
        return view('education.education4');
    }

    public function education5(){
        return view('education.education5');
    }

    public function education6(){
        return view('education.education6');
    }
}
