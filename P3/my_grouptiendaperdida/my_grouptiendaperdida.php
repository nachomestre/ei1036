<?php
/*
Plugin Name: my_grouptiendaperdida
Description: Register group of persons.
Author URI: nachomestre
Author Email: nachomestre@gmail.com
Version: 1.0
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/



//Al activar el plugin quiero que se cree una tabla en la BD, que creará la función my_group_install.



//Añado action hook, de forma que cuando se realice la acción de una petición a la URL: wp-admin/admin-post.php?action=my_datos_2 
//se llame a mi controlador definido en la función my_datos_2 definido en el fichero include/functions.php

//Solo activado el hook para usuarios autentificados,  



//La siguiente sentencia activaria la acción para todos los usuarios.
//add_action('admin_post_nopriv_my_datos_2', 'my_datos_2');
$table="MP2_GrupoCliente001";

include(plugin_dir_path( __FILE__ ).'include/functions.php');

register_activation_hook( __FILE__, 'MP2_Ejecutar_crearT');

//add_action( 'plugins_loaded', 'Ejecutar_crearT' ); // esto se ejecuta siempre que se llama al plugin
function MP2_Ejecutar_crearT(){
    MP2_CrearT("MP2_GrupoCliente001");
}
add_action('admin_post_nopriv_my_datos_2', 'MP2_my_datos_2'); //no autentificados
//add_action('admin_post_my_datos_2', "MP2_my_datos_2"); 

?>
