<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;

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

        $productos = Producto::all();
        //dd($productos);


        return view('productos.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('productos.create');

    }

    public function perro(){
        return "ALV PERRO!";
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

        $producto = new Producto();

        $producto->nombre = $request->input("nombre");
        $producto->descrip = $request->input("descrip");

        $producto->save();

       //flash('SE CREO EL PRODUCTO bajo el codigo: '.$producto->id )->success();

        //flash()->overlay('Modal Message', 'Modal Title');

        return view('productos.index')->with('producto',$producto)->with('productos', Producto::all());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $producto = Producto::where('id',$id)->get();
        //dd($producto);
        return view('productos.create')->with('producto',$producto);
        //
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
        $producto = Producto::where('id',$id)->get();
        //dd($producto);
        return view('productos.create')->with('producto',$producto);
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

        $producto = Producto::find($id);
        $producto->nombre = $request->input('nombre');
        $producto->descrip = $request->input('descrip');
        $producto->save();

        flash('SE ACTUALIZO EL PRODUCTO '.$producto->nombre)->info();

        return redirect('/producto');
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
        $producto = Producto::find($id);

        $producto->delete();

        flash('SE ELIMINO EL PRODUCTO '.$producto->nombre)->info();
        return redirect('/producto');
    }
}
