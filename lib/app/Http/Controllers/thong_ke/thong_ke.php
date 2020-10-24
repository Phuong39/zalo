<?php

namespace App\Http\Controllers\thong_ke;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class thong_ke extends Controller
{
    public function getStatistical(){
    	return view('thong_ke.thong_ke');
    }
}
