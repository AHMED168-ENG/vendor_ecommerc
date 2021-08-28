<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashpored extends Controller
{
    function show() {
        return view("./admin/home");
    }
}
