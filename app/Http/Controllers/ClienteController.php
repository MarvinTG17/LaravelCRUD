<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    //Evitar que se usen las paginas del CRUD sin loguear por la url
    public function __construct(){
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view("crud.index",compact("clientes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("crud.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guardarCliente = new Cliente();
        $guardarCliente->nombre     = $request->get("name");
        $guardarCliente->apellidos  = $request->get("surnames");
        $guardarCliente->direccion  = $request->get("address");
        $guardarCliente->telefono   = $request->get("phone");

        $guardarCliente->save();

        return redirect("/dash/crud/");

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view("crud.edit",compact("cliente"));
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
        $editarCliente = Cliente::find($id);
        $editarCliente->nombre     = $request->get("name");
        $editarCliente->apellidos  = $request->get("surnames");
        $editarCliente->direccion  = $request->get("address");
        $editarCliente->telefono   = $request->get("phone");

        $editarCliente->save();

        return redirect("/dash/crud/");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eliminarCustomer = Cliente::find($id);
        $eliminarCustomer->delete();
        return redirect("/dash/crud/");
    }
}
