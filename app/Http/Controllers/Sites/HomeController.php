<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return \View::make('home', [
            'title' => 'Home',
            'test' => 'test',
        ]);  
    }
}
