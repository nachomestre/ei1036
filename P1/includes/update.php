<?php
include("./gestionBD.php");

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
