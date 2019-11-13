<?php
include("./gestionBD.php");

try {
    
    $table="A_cliente";
  
    $a=consultar($pdo,$table);
    if (1>$a) {
        echo "InCorrecto1";
        return;
    }
    $id=$_GET['id'];
    echo $id;
    borrar($pdo,$table,$id);

 	} 
    catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
  }

 ?>