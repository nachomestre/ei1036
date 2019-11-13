<?php
/**
 * * Descripción: Controlador principal
 * *
 * * Descripción extensa: Iremos añadiendo cosas complejas en PHP.
 * *
 * * @author  Albert Canelles <al341911@uji.es>  Paula González <al286286@uji.es>
 * * @copyright 2018 Albert | Paula
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 2

 * */
include("./gestionBD.php");
/* Recibimos el id por URL es decir $id= $_GET['id']*/
/* Peticion de consulta a la base de datos para pintarlos en los campos correspondientes, Recibir del forumlario los datos y realizar una modificacion de los datos, mediante el id del usuario */
function handler($pdo,$table)
{
    $datos = $_REQUEST;
    $id=$_REQUEST['id'];
    if (count($_REQUEST) < 3) {
        $data["error"] = "No has rellenado el formulario correctamente";
        return;
    }
    
$query = "UPDATE $table SET nombre =?, apellidos =?, email=?,dni=?,clave=? WHERE client_id=?";
   var_dump($query); 
    

    echo $query;
    var_dump($query);
    try { 
        $a=array($_REQUEST['userName'],$_REQUEST['apellidos'],$_REQUEST['email'],$_REQUEST['dni'],$_REQUEST['passwd'], $_REQUEST['id']);
        print_r ($a);
        $consult = $pdo->prepare($query);
        $a=$consult->execute($a);
        if (1>$a)echo "InCorrecto";
    
    } catch (PDOExeption $e) {
        echo ($e->getMessage());
    }
}

$table = "A_cliente";
var_dump($_POST);
handler( $pdo,$table);

?>