@extends('layouts')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head >

</head>

<body>
<main>
    <table bgcolor="#1E679A" align="center">
    	<tr>
    		<td>
    			<b>Sherlock y el String V&aacute;lido</b>
    		</td>
    	</tr> 
		<tr>
			<td bgcolor="#FFFFCCC">
				{!!Form::open(['id'=>'form_string'])!!}
					<p>Ingrese String a validar:</p>
					<input type="text" name="stringValid" id="stringValid">
					<p id="respuesta"></p>
					<p id="letra"></p>
					<p id="cantidad"></p>
					<br> <br>
					{!!Form::submit('Validar',['class'=> 'boton_personalizado'])!!}
					{!!Form::reset('Borrar',['class'=> 'boton_personalizado','id'=>'borrar'])!!}
					<br> <br>
				{!!Form::close()!!}
			</td>
		</tr>
	</table>
</main>
</body>
@endsection

@section('script')

<script>

$(function(){
	$("#form_string").validate({
        rules: {
          stringValid:{
            required: true,
            maxlength: 100000,
            minlength: 1
          }
        },
        messages: {
          stringValid: {
            required: "Por favor ingrese un string",
            maxlength: "Máximo 100000 dígitos",
            minlength: "Mínimo 1 caracteres"
          }
        },
        submitHandler: function(form) {
	        var stringVerif = $('#stringValid').val();
	        var route = "IsValid"+'/'+stringVerif;
	        $.get(route, function(res){
	        	$("#respuesta").text(res.respuesta);
	        	$("#letra").text(res.letras);
	        	$("#cantidad").text(res.cantidad);
	        });
	    }
    }); //Cierra Validate 

    $('#stringValid').click(function() {
    	$("#respuesta").text("");
        $("#letra").text("");
        $("#cantidad").text("");
        $("label.error").remove();
    });

    $('#borrar').click(function() {
    	$("#respuesta").text("");
    	$("#letra").text("");
    	$("#cantidad").text("");
    	$("label.error").remove();
    });
});//Cierra Funcion

</script>

@endsection