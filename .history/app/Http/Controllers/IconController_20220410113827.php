<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IconController extends Controller
{
    public function getIcon($id){
        return($id.'.jpg');
    }
}
