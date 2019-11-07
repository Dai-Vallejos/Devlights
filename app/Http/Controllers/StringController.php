<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StringController extends Controller
{
	public function IsValid($S)
    {
	    $array = str_split($S);
	    $cant = array_values(array_count_values($array));
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
/*
	    		foreach ($aux2 as $key => $value) {
	    			if (($value == 1) && (abs(array_keys($aux2)[0]-array_keys($aux2)[1]) == 1) && (array_keys($aux2)[0]>array_keys($aux2)[1])) {
	    				$resp="YES2";
	    			};
	    		};	*/    		
	    	}
	    	else{
	    		$resp="NO";
		    	/*$dif= max($cant)-min($cant);
		    	if ($dif > 1) {
		    		$resp="NO";
		    	}
		    	else{
		    		if (count(array_count_values($cant)) == 1) {
		    			$resp="NO";
		    		}
		    		else{
		    			$resp="YES";
		    		};
		    	};*/
		    };
	    };

	    return $resp;
	}
}
