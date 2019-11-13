<main>
	<h1>GestiÓn de Usuarios </h1>
	<form class="fom_usuario" action="?action=registrar" method="POST">

		<legend>Datos básicos</legend>
		
		<label for="id">Nombre</label>
		<br/>
		<input type="text" name="id" class="item_requerid" size="20" maxlength="25" value="<?php print $id ?>"
		 placeholder="Miguel Cervantes" />
		 <br/>
		
		
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
		<input type="text" name="email" class="item_requerid" size="20" maxlength="25" value="<?php print $email ?>"
		 placeholder="kiko@ic.es" />
		<br/>
		<label for="passwd">Clave</label>
		<br/>
		<input type="password" name="passwd" class="item_requerid" size="8" maxlength="25" value="<?php print $passwd ?>"
		/>
		<br/>
		<label for="dni">DNI</label>
		<br/>
		<input type="text" name="dni" class="item_requerid" size="20" maxlength="25" value="<?php print $dni ?>"
		 placeholder="00000000M" />
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