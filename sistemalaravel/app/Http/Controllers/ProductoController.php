<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Producto;
use App\Proveedor;
use App\Functions;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productos = Producto::orderBy('id','ASC')->paginate(10);
        return view('Producto.index',compact('productos'))->with('titulo','Productos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $proveedores = Proveedor::orderBy('id','ASC')->paginate(10);
        return View::make('Producto.create')->with('proveedores',$proveedores)->with('titulo','Productos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $util = new \App\Functions\Util();
        $this->validate($request,[ 'nombre'=>'required|unique:productos', 'descripcion'=>'required', 'precio'=>'required', 'proveedor_id'=>'required']);
        $requestData = $request->all();
        $requestData['fecha_registro'] = $util->fecha_actual();
        Producto::create($requestData);
        return redirect()->route('productos.index')->with('success','Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $producto = Producto::find($id);
        return view('Producto.show',compact('producto'))->with('titulo','Productos');;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $producto = Producto::find($id);
        $proveedores = Proveedor::orderBy('id','ASC')->paginate(10);
        return view('producto.edit',compact('producto','proveedores'))->with('titulo','Productos');;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[ 'nombre'=>'required|unique:productos,nombre,'.$id, 'descripcion'=>'required', 'precio'=>'required', 'proveedor_id'=>'required']);
        Producto::find($id)->update($request->all());
        return redirect()->route('productos.index')->with('success','Registro editado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        //
        $producto = Producto::find($id);
        return view('producto.confirm',compact('producto'))->with('titulo','Productos');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Producto::find($id)->delete();
        return redirect()->route('productos.index')->with('success','Registro borrado exitosamente');        
    }
}
