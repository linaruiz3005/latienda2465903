<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "Aqui va a ir el catalogo de productos";

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //seleccion de todas las marcas 
        $marcas = Marca::all();

        //seleccion de todas las categorias
        $categorias = Categoria::all();

        //mostrar la vista, con las marcas y las categorias
        return view('productos.new')
                    ->with('marcas', $marcas)
                    ->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        //1.Establecer las reglas de validacion que aplicarian a cada campo
        $reglas =[
            "nombre"=> 'required|alpha',
            "desc" => 'required|min:20|max:50',
            "precio" => 'required|numeric',
            "marca" => 'required',
            "categoria" => 'required'
        ];

        //mensajes:
        $mensajes =[
            "required" => "Campo Obligatorio",
            "alpha" => "Solo letras",
            "min" => "Minimo 20 caracteres",
            "max" => "Maximo 50 caracteres",
            "numeric" => "Solo numeros"
        ];

        //2.crear el objeto validador 
        $v = Validator::make($r->all() ,
                             $reglas,
                             $mensajes);

        //3.Validar los datos
        if($v->fails()){
            //validacion fallida
            //redireccionar al formulario
            return redirect('productos/create')
            ->withErrors($v)
            ->withInput();
        }else{
            //validacion correcta
             //crear nuevo producto
            $p = new Producto;
            //asignar valores a los atributos
            $p->nombre = $r->nombre;
            $p->desc = $r->desc;
            $p->precio = $r->precio;
            $p->categoria_id = $r->categoria;
            $p->marca_id = $r->marca;
            //guardar en base de datos
            $p->save();
            //redireccionar al formulario
            //con mensaje exitoso
            return redirect('productos/create')
            ->with('Mensajito', "Registro exitoso");
            }
       
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
        echo "Aqui van los detalles del producto con id: $producto";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($producto)
    {
        echo "Aqui va a ir el formulario para actualizar el producto: $producto ";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
