<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Proveedor;
use App\Functions;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $proveedores = Proveedor::orderBy('id','ASC')->paginate(10);
        return view('Proveedor.index',compact('proveedores'))->with('titulo','Proveedores');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Proveedor.create')->with('titulo','Proveedores');
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
        $this->validate($request,[ 'nombre'=>'required|unique:proveedores', 'direccion'=>'required', 'telefono'=>'required']);
        $requestData = $request->all();
        $requestData['fecha_registro'] = $util->fecha_actual();
        Proveedor::create($requestData);
        return redirect()->route('proveedores.index')->with('success','Registro creado exitosamente');
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
        $proveedor = Proveedor::find($id);
        return view('proveedor.edit',compact('proveedor'))->with('titulo','Proveedores');
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
        $this->validate($request,[ 'nombre'=>'required|unique:proveedores,nombre,'.$id, 'direccion'=>'required', 'telefono'=>'required']);
        Proveedor::find($id)->update($request->all());
        return redirect()->route('proveedores.index')->with('success','Registro editado exitosamente');
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
        $proveedor = Proveedor::find($id);
        return view('proveedor.confirm',compact('proveedor'))->with('titulo','Proveedores');
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
        Proveedor::find($id)->delete();
        return redirect()->route('proveedores.index')->with('success','Registro borrado exitosamente');    
    }

}
