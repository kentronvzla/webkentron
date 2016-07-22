<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\TableBaseController;
use Illuminate\Http\Request;
use Mail;


class ContactoController extends TableBaseController {

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {    
        Mail::send('emails.mensaje', $request->all(), function($msj) {
            $msj->subject('Mensaje desde WebKentron!');
            $msj->to('zuvicknt@gmail.com');
//          $msj->to('azuvic@kentron.com.ve');
//          $msj->to('rarrieta@kentron.com.ve');
//          $msj->to('reysmerwvr@gmail.com');          
        });
        return view('pages.contacto');
    }
}
