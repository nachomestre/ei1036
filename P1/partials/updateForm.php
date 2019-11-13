<?php
 include("./gestionBD.php");
/* Recibimos el id por URL es decir $id= $_GET['id']*/
/* Peticion de consulta a la base de datos para pintarlos en los campos correspondientes, Recibir del forumlario los datos y realizar una modificacion de los datos, mediante el id del usuario */
    $id=$_GET['id'];
    if($id != null) {
        $table="A_cliente";
        $clienteCompleto = consultar_usuario($pdo,$table, $id);
     } 

 
 ?>
<main>
	<h1>Actualización de Usuarios </h1>
	<form class="fom_usuario" action="?action=registrar" method="POST">

		<legend>Datos básicos</legend>
		<label for="nombre">Nombre</label>
		<br/>
		<input type="text" name="userName" class="item_requerid" size="20" maxlength="25" value="<?php print $userName ?>"
		 placeholder="Miguel Cervantes" />
		 <br/>
		 
		 <label for="cognom">Apellidos</label>
		<br/>
		<input type="text" name="cognom" class="item_requerid" size="20" maxlength="25" value="<?php print $cognom ?>"
		 placeholder="Cervantes" />
		<br/>
		<label for="email">Email</label>
		<br/>
		<input type="text" name="email" class="item_requerid" size="20" maxlength="25" value="<?php print $email ?>" />
		<br/>
		<label for="passwd">Clave</label>
		<br/>
		<input type="password" name="passwd" class="item_requerid" size="8" maxlength="25" value="<?php print $passwd ?>"
		/>
		<br/>
		<label for="dni">DNI</label>
		<br/>
		<input type="text" name="dni" class="item_requerid" size="20" maxlength="25" value="<?php print $dni ?>" />
		<br/>
		<label for="foto">Fotofile</label>
		<br/>
		<input type="text" name="foto" class="item_requerid" size="20" maxlength="25" value="<?php print $foto ?>"
		 placeholder="*****" />
		 <br/>
		<input type="submit" value="Enviar">
		<input type="reset" value="Deshacer">
	</form>
</main>
