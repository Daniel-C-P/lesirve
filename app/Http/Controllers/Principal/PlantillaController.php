<?php

namespace App\Http\Controllers\Principal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlantillaController extends Controller
{
    public function show($id){
      return view("plantilla.$id.index");
    }
}
