@extends('layouts')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head >

</head>

<body>
<main>
	<!-- <h3 align="center">Sherlock y el String V&aacute;lido</h3> -->
   
    <table width="500" cellspacing="1" cellpadding="5" border="0" bgcolor="#1E679A" align="center"> 
		<tr align="center"> 
		   <td><font color="#FFFFFF" face="arial, verdana, helvetica"> 
		<b>Sherlock y el String V&aacute;lido</b> 
		   </font></td> 
		</tr> 
		<tr> 
		   <td bgcolor="#ffffcc"> 
		   <font face="arial, verdana, helvetica"> 
		   <br>
		   Ingrese String a validar: 
		   <input type="text" name="nombredelacaja">
		   <br> <br> <br> 
		   <button type="button" class="btn btn-outline-success float-right" id="BtnValidar">Validar</button>
		   </font> 
		   </td> 
		</tr>
		
	</table> 
      

</main>
</body>
@endsection
@section('script')
<script>
$(function(){ 
		$.ajax({
            url:"{{url('areas')}}"+'/'+value,
            type:'PUT',
            headers:{'X-CSRF-TOKEN':token},
            data: datas ,
            success: function(){
              $('#modalModArea').modal('toggle');
              $('#modalModArea').find("#abreviatura_a,#nombre_a,#descripcion_a").val('').end();
              lista();
            },
            error : function(responseText){
              alert("Verifique Campos");
            }
          });})
</script>

@endsection