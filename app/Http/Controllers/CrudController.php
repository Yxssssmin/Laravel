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

    public function create(Request $request) {
        try {
            $sql=DB::insert(" insert into producto(id_producto,nombre,precio,cantidad)values(?,?,?,?) ", [
                $request->txtcodigo,
                $request->txtnombre,
                $request->txtprecio,
                $request->txtcantidad,
            ]);
        } catch (\Throwable $th) {
            $sql = 0;
        }

        if($sql == true) {
            return back()->with("correcto","Producto registrado correctamente");
        } else {
            return back()->with("incorrecto","Error al registrar");
        }

    }
}
