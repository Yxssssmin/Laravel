<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    public function index() {
        $datos=DB::select(" select * from producto ");
        return view("welcome")->with("datos", $datos);
    }
}
