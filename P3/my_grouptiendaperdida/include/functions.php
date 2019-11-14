<?php
/**
 * * Descripción: Controlador principal
 * *
 * * Descripción extensa: Iremos añadiendo cosas complejas en PHP.
 * *
 * * @author  nachomestre
 * * @copyright 2018 Lola
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 2
 * */


//Estas 2 instrucciones me aseguran que el usuario accede a través del WP. Y no directamente
if ( ! defined( 'WPINC' ) ) exit;

if ( ! defined( 'ABSPATH' ) ) exit;




//Funcion instalación plugin. Crea tabla
function MP2_CrearT($tabla){
    $MP2_pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD); 
    $query="CREATE TABLE IF NOT EXISTS $tabla (person_id INT(11) NOT NULL AUTO_INCREMENT, nombre VARCHAR(100),  email VARCHAR(100),  foto_file VARCHAR(200), clienteMail VARCHAR(100),  PRIMARY KEY(person_id))";
    $consult = $MP2_pdo->prepare($query);
    $consult->execute (array());
}


function MP2_Register_Form($MP2_user , $user_email)
{//formulario registro amigos de $user_email
    ?>
    <h1>Gestión de Usuarios </h1>
    <form class="fom_usuario" action="?action=my_datos_2&proceso=registrar" method="POST" enctype="multipart/form-data">
        <label for="clienteMail">Tu correo</label>
        <br/>
        <input type="text" name="clienteMail"  size="20" maxlength="25" value="<?php print $user_email?>"
        readonly />
        <br/>
        <legend>Datos básicos</legend>
        <label for="nombre">Nombre</label>
        <br/>
        <input type="text" name="userName" class="item_requerid" size="20" maxlength="25" value="<?php print $MP2_user["userName"] ?>"
        placeholder="Miguel Cervantes" />
        <br/>
        <label for="email">Email</label>
        <br/>
        <input type="text" name="email" class="item_requerid" size="20" maxlength="25" value="<?php print $MP2_user["email"] ?>"
        placeholder="kiko@ic.es" />
        <br/>
	<label for="foto">Foto</label>
	<br/>
	<input type="file" name="foto" value="foto" accept="image/*">
	<br/>
	<br/>
        <input type="submit" value="Enviar">
        <input type="reset" value="Deshacer">
    </form>
<?php
}

//CONTROLADOR
//Esta función realizará distintas acciones en función del valor del parámetro
//$_REQUEST['proceso'], o sea se activara al llamar a url semejantes a 
//https://host/wp-admin/admin-post.php?action=my_datos_2&proceso=r 

function MP2_my_datos_2()
{ 
    global $user_ID , $user_email,$table;
    
    $MP2_pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD); 
    wp_get_current_user();
    if ('' == $user_ID) {
                //no user logged in
                exit;
    }
    
    
    
    if (!(isset($_REQUEST['action'])) or !(isset($_REQUEST['proceso']))) { print("Opciones no correctas $user_email"); exit;}

    get_header();
    echo '<div class="wrap">';

    switch ($_REQUEST['proceso']) {
        case "registro":
            $MP2_user=null; //variable a rellenar cuando usamos modificar con este formulario
            MP2_Register_Form($MP2_user,$user_email);
            break;
        case "registrar":
            if (count($_REQUEST) < 3) {
                print ("No has rellenado el formulario correctamente");
                return;
            }

            $fotoURL="";
   	    $IMAGENES_USUARIOS = '/fotos/';
            if(array_key_exists('foto', $_FILES) && $_POST['email']) {
            	$fotoURL = dirname(dirname(__DIR__)).$IMAGENES_USUARIOS.$_POST['userName']."_".$_FILES['foto']['name'];
 	    	if (move_uploaded_file($_FILES['foto']['tmp_name'], $fotoURL))
            		{ echo "foto subida con éxito";
            } }
	    $fotoURL = $_POST['userName']."_".$_FILES['foto']['name'];

            $query = "INSERT INTO $table (nombre, email,clienteMail,foto_file) VALUES (?,?,?,?)";         
            $a=array($_REQUEST['userName'], $_REQUEST['email'],$_REQUEST['clienteMail'], $fotoURL);
            //$pdo1 = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD); 
            $consult = $MP2_pdo->prepare($query);
            $a=$consult->execute($a);
            if (1>$a) {echo "InCorrecto $query";}
            else wp_redirect(admin_url( 'admin-post.php?action=my_datos_2&proceso=listar'));
            break;
        case "listar":
            //Listado amigos o de todos si se es administrador.
            $a=array();
            if (current_user_can('administrator')) {$query = "SELECT     * FROM       $table ";}
            else {$campo="clienteMail";
                $query = "SELECT     * FROM  $table      WHERE $campo =?";
                $a=array( $user_email);
 
            } 

            $consult = $MP2_pdo->prepare($query);
            $a=$consult->execute($a);
            $rows=$consult->fetchAll(PDO::FETCH_ASSOC);
            if (is_array($rows)) {/* Creamos un listado como una tabla HTML*/
                print '<div><table><th>';
                foreach ( array_keys($rows[0])as $key) {
                    echo "<td>", $key,"</td>";
                }
                print "</th>";
                foreach ($rows as $row) {
                    print "<tr><td></td>";
                    foreach ($row as $key => $val) {
			            if ($key == "foto_file"){
			                echo '<td><img src="../../fotos/', $val, '"></td>';
			            } else {echo "<td>", $val, "</td>";}
                    }
                    print "</tr>";
                }
                print "</table></div>";
            }
            else{echo "No existen valores";}
            break;
        default:
            print "Opción no correcta";
        
    }
    echo "</div>";
    // get_footer ademas del pie de página carga el toolbar de administración de wordpres si es un 
    //usuario autentificado, por ello voy a borrar la acción cuando no es un administrador para que no aparezca.
    if (!current_user_can('administrator')) {

        // for the admin page
        remove_action('admin_footer', 'wp_admin_bar_render', 1000);
        // for the front-end
        remove_action('wp_footer', 'wp_admin_bar_render', 1000);
    }

    get_footer();
    }
//add_action('admin_post_nopriv_my_datos_2', 'my_datos_2');
//add_action('admin_post_my_datos_2', 'my_datos_2'); //no autentificados
?>
