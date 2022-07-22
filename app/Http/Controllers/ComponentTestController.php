<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ComponentTestController extends Controller
{
    public function getJson(){
        return response()->json(['name' => 'john']);
    }

}
