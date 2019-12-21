
<?php
function MP_Register_Form($MP_user , $user_email){
    ?>
    <h1>Gestión de Usuarios </h1>
    <form class="fom_usuario" action="?action=my_datos&proceso=registrar" method="POST">
        <label for="clienteMail">Tu correo</label>
        <br/>
        <input type="text" name="clienteMail"  size="20" maxlength="25" value="<?php print $user_email?>"
        readonly />
        <br/>
        <legend>Datos básicos</legend>
        <label for="nombre">Nombre</label>
        <br/>
        <input type="text" name="userName" class="item_requerid" size="20" maxlength="25" value="<?php print $MP_user["userName"] ?>"
        placeholder="Miguel Cervantes" />
        <br/>
        <label for="email">Email</label>
        <br/>
        <input type="text" name="email" class="item_requerid" size="20" maxlength="25" value="<?php print $MP_user["email"] ?>"
        placeholder="kiko@ic.es" />
        <br/>
        <input type="submit" value="Enviar">
        <input type="reset" value="Deshacer">
    </form>
<?php
}
MP_Register_Form($MP_user,$user_email);
$MP_user=null; 
?>
