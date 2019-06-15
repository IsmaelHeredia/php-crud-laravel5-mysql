<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Producto;
use App\Proveedor;
use App\Functions;
use Illuminate\Support\Facades\DB;

class EstadisticasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $array_textos_grafico1 = array();
        $array_series_grafico1 = array();

        $array_textos_grafico2 = array();
        $array_series_grafico2 = array();

        $productos = Producto::all();
        $cantidad_productos = count($productos);

        foreach($productos as $producto) {
            $nombreProducto = $producto->nombre;
            $precio = $producto->precio;
            $serie  = array(
                'name' => $nombreProducto,
                'y' => (int) $precio
            );
            array_push($array_textos_grafico1,$nombreProducto);
            array_push($array_series_grafico1,$serie);
        }

        $textos_grafico1 = json_encode($array_textos_grafico1);
        $series_grafico1 =  json_encode($array_series_grafico1);

        $resultados = DB::table('productos')
            ->join('proveedores', 'productos.proveedor_id', '=', 'proveedores.id')
            ->select(DB::raw('proveedores.nombre, COUNT(productos.proveedor_id) as cantidad'))
            ->groupBy('proveedores.nombre')
            ->get();

        foreach($resultados as $resultado) {
            $nombreEmpresa = $resultado->nombre;
            $cantidad = $resultado->cantidad;
            $serie  = array(
                'name' => $nombreEmpresa,
                'y' => (int) $cantidad
            );
            array_push($array_textos_grafico2,$nombreEmpresa);
            array_push($array_series_grafico2,$serie);
        }

        $textos_grafico2 = json_encode($array_textos_grafico2);
        $series_grafico2 =  json_encode($array_series_grafico2);

        return view('Estadisticas.index', ["productos"=>$productos,"cantidad_productos"=>$cantidad_productos,"textos_grafico1"=>$textos_grafico1,"series_grafico1"=>$series_grafico1,"textos_grafico2"=>$textos_grafico2,"series_grafico2"=>$series_grafico2]);
    }

}
