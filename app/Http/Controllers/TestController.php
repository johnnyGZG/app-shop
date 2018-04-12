<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function welcome()
    {
    	$a = 5;
    	$b = 45;
    	$c = $a + $b;
    	return 'La suma total es de '. $c;
    }
}
