
function MostrarError()//editado
{
	$.ajax({url:"nexoNoExiste.php"})
	.then( function(datos){
		alert("primero");
	},function(error){
		console.info("objeto respuesta",error);
		alert("segundo"+error);
		$("#informe").html(error.responseText);	


	});

	/*
	var funcionAjax=$.ajax({url:"nexoNoExiste.php",type:"post",data:{queHacer:"MostrarTexto"}});
	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
		$("#informe").html("Correcto!!!");
	});
	funcionAjax.fail(function(retorno){
			$("#principal").html("error :(");
		$("#informe").html(retorno.responseText);		
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);
	});*/

	
}
function MostrarSinParametros() //editado
{//"nexoTexto.php"
	
	$.ajax({
		url:"nexoTexto.php"})
	.then(function ok(respuesta){
		//alert(respuesta);
		$("#principal").html(respuesta);

	},function mal(error){
		alert(error);
	});



}

function Mostrar(queMostrar) //editado
{


	$.ajax({ url:"nexo.php",type:"post",data:{queHacer:queMostrar}})
	.then(function(exito){
		//console.log(exito,"exito");
		$("#principal").html(exito);
		$("#informe").html("Correcto!!!");
	},function(error){
		console.log(error,"error");
		$("#principal").html(error);
		$("#informe").html(error.responseText);
	});



		//alert(queMostrar);
	/*var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:queMostrar}
	});
	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
		$("#informe").html("Correcto!!!");	
	});
	funcionAjax.fail(function(retorno){
		$("#principal").html(":(");
		$("#informe").html(retorno.responseText);	
	});
	funcionAjax.always(function(retorno){*/
		//alert("siempre "+retorno.statusText);

	
}

function MostrarTabla(queMostrar) //editado
{

	alert("llego tabla");
	
	$.ajax({ url:"nexo.php",type:"post",data:{queHacer:queMostrar}})
	.then(function(retorno){
		//console.log(exito,"exito");
		//alert(retorno);
		$("#facturacion").html(retorno);
		$("#informe").html("facturado!!!");
	},function(error){
		console.log(error,"error");
		$("#principal").html(error);
		$("#informe").html(error.responseText);
	});
}



function MostarLogin()//editado
{
	
	$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostarLogin"}
	}).then(function exito(retorno){
		$("#principal").html(retorno);
		$("#informe").html("Correcto Form login!!!");
	},function error(retorno){
		$("#botonesABM").html(":(");
		$("#informe").html(retorno.responseText);
	});


		//alert(queMostrar);
	/*var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostarLogin"}
	});
	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
		$("#informe").html("Correcto Form login!!!");	
	});
	funcionAjax.fail(function(retorno){
		$("#botonesABM").html(":(");
		$("#informe").html(retorno.responseText);	
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});*/
}