<?php 
session_start();
if(isset($_SESSION['registrado']))
{
	require_once("clases/AccesoDatos2.php");
	require_once("clases/cd.php");
	$arrayDeCds=cd::TraerTodoLosCds();
	echo "<h2> Bienvenido: ". $_SESSION['registrado']."</h2>";

 ?><?php  
 		if ($_SESSION['registrado'] == "admin@admin.com")
 		 {
 			?><input type="button" onclick="ingresar()" value="Ingresar patente" class="glyphicon glyphicon-pencil"></input><?php
 		}


?>
<table class="table"  style=" background-color: beige;">
	<thead>
		<tr>
		<?php if ($_SESSION['registrado']== "admin@admin.com") {
			?> 
				<th>Editar</th><th>Borrar</th><th>patente</th>
			<?php
		}
		else
		{
			?> 
				<th>patente</th>
			<?php
		}?>
			
		</tr>
	</thead>
	<tbody>

		<?php 

foreach ($arrayDeCds as $cd) {
	echo"<tr>";

	if ($_SESSION['registrado']== "admin@admin.com") {

		echo "<td><a onclick='EditarCD($cd->id)' class='btn btn-warning'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Editar</a></td>
			<td><a onclick='BorrarCD($cd->id)' class='btn btn-danger'>   <span class='glyphicon glyphicon-trash'>&nbsp;</span>  Borrar</a></td>";
	}
			
			echo"<td>$cd->patente</td>

		</tr>   ";
}
		 ?>
	</tbody>
</table>

<?php 	}else	{
		echo "<h4 class='widgettitle'>No estas registrado</h4>";
	}

	 ?>