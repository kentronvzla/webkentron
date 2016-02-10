<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getHome()
    {
        return view('pages.home');
    }

    public function getAbout()
    {
        return view('pages.about');
    }

    public function getContact()
    {
        return view('pages.contact');
    }
    
    public function getProducts()
    {
        return view('pages.products');
    }
    
    public function getKeruxInfo()
    {
        return view('pages.products.kerux');
    }
    
    public function getKomatInfo()
    {
        return view('pages.products.komat');
        
    }
    
    public function getCustomer()
    {
        return view('pages.customer');
    }
    
    public function getInfoProyecto()
    {
        return view('pages.infoproyecto');
    }
}
