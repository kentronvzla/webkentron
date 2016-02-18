<?php

namespace App\Http\Controllers;

use App\Http\Controllers\TableBaseController;
use Illuminate\Http\Request;
use App\Contenido;
use Mail;
use Session;
use Redirect;

class ContactoController extends TableBaseController
{   
    protected $roles;
    protected static $className = "Contenido";
    protected static $collectionName = "contenidos";
    protected static $folderName = 'contenidos';
    protected static $viewName = "contenidos";
    protected static $varName = "contenido";
    protected static $eagerLoading = [];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.contact');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        Mail::send('emails.mensaje',$request->all(), function($msj){
          $msj->subject('Mensaje desde WebKentron!');
          $msj->to('zuvicknt@gmail.com');
//          $msj->to('azuvic@kentron.com.ve');
//          $msj->to('rarrieta@kentron.com.ve');
//          $msj->to('reysmerwvr@gmail.com');          
        });
         return view('pages.contact');
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
        //
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
    }
}