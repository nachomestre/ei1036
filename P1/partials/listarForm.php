<main>
	<h1>Gestión de Usuarios </h1>
	<form class="fom_usuario" action="?action=listar" method="GET">
		
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
		<input type="text" name="dni" class="item_requerid" size="20" maxlength="25" value="<?php print $dni ?>"/>
		<br/>
		<label for="foto">Fotofile</label>
		<br/>
		<input type="text" name="foto" class="item_requerid" size="20" maxlength="25" value="<?php print $foto ?>"
		 placeholder="*****" />
		 <br/>
		<input type="submit" value="borrar">
		<input type="submit" value="modificar">
	</form>
</main>