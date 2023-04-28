<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class TaskController extends Controller{

//    public function home(){
//        return view('home');
//    }

    public function viewlistTask() {
        return view('listTaskBeautiful');
    }

}
