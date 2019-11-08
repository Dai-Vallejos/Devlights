<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StringController extends Controller
{
	public function IsValid($S)
    {
	    $array = array_count_values(str_split($S));
	    $letras = array_keys($array);
	    $cant = array_values($array);
		$resp="NO";
	    
	    if (count(array_unique($cant)) == 1) {
	    	$resp="YES";
	    }
	    else{
	    	$aux1 = array_count_values($cant);
	    	asort($aux1);
	    	if (count($aux1) == 2){
	    		
	    		$aux2 = array_values($aux1);

	    		if (($aux2[0] == 1) && (abs(array_keys($aux1)[0]-array_keys($aux1)[1]) == 1) && (array_keys($aux1)[0]>array_keys($aux1)[1])) {
	    				$resp="YES";
	    		}
	    		else{
	    			if (($aux2[0] == 1) && (array_keys($aux1)[0] == 1)) {
	    					$resp="YES";
	    				};
	    		};    		
	    	}
	    	else{
	    		$resp="NO";
		    };
	    };
	    return response()->json(['respuesta'=>$resp,'letras'=>$letras,'cantidad'=>$cant]);
	}
}
