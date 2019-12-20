<?php
  add_filter("the_content", "mfp_Fix_Text_Spacing");
  // Automatically correct double spaces from any post
  function mfp_Fix_Text_Spacing($the_Post)
  {
  $the_New_Post = str_replace("perdida", " PERDIDA ", $the_Post);
  return $the_New_Post;
  }

		/*
	Plugin Name: plugin-widget-1
	Description: Este plugin añade un widget que pone un título y una descripción.
	Author: nachomestre
	Author Email: nachomestre@gmail.com
	Version: 1.0
	License: GPLv3
	License URI: http://www.gnu.org/licenses/gpl-3.0.html
	*/


	function shortcode_juego0() {
	  return '
	  	<div class="wrap">
		<canvas id="sketchpad" width="500" height="500" style="background-color: whitesmoke;"></canvas>
		<p> <span id="reiniciar"> REINICIAR </span> <span> MARCADOR: </span> <span id="marcador"> 0 </span>
		</p>
		</div>
	';
	}
	function add_theme_scripts(){
		wp_enqueue_script( 'juego0', get_stylesheet_directory_uri().'/assets/js/javascriptjuego0.js',true);
		//wp_enqueue_style( 'style',get_stylesheet_directory_uri().'/assets/css/micss.js',true);
	}
	add_shortcode('juego0', 'shortcode_juego0');
	add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

	function shortcode_juego1() {
	  return '
	  	<div class="wrap">
		<canvas id="sketchpad1" width="500" height="500" style="background-color: coral;"></canvas>
		<p> <span id="reiniciar1"> REINICIAR </span>
		</p>
		</div>
	';
	}
	function add_theme_scripts1(){
		wp_enqueue_script( 'juego1', get_stylesheet_directory_uri().'/assets/js/javascriptjuego1.js',true);
		//wp_enqueue_style( 'style',get_stylesheet_directory_uri().'/assets/css/micss.js',true);
	}
	add_shortcode('juego1', 'shortcode_juego1');
	add_action( 'wp_enqueue_scripts', 'add_theme_scripts1' );



	// Registramos el widget
	function load_my_widget() {
		register_widget( 'my_widget1' );
	}
	add_action( 'widgets_init', 'load_my_widget' );

	// Creamos el widget 
	class my_widget1 extends WP_Widget {

	public function __construct() {
			$widget_ops = array( 
				'classname' => 'my_widget',
				'description' => 'My Widget is awesome',
			);
			parent::__construct( 'my_widget1', 'My Widget1', $widget_ops );
		}	


	// Creamos la parte pública del widget

	public function widget( $args, $instance ) {
	$title = apply_filters( 'widget_title', $instance['title'] );
	$direccion = apply_filters( 'widget_title', $instance['direccion'] );
		
	// los argumentos del antes y después del widget vienen definidos por el tema
	echo $args['before_widget'];
	if ( ! empty( $title ) )
	echo $args['before_title'] . $title . $args['after_title'];

	// Aquí es donde debemos introducir el código que queremos que se ejecute
	echo $direccion ;
	echo $args['after_widget'];
	}
			
	// Backend  del widget
	public function form( $instance ) {
	if ( isset( $instance[ 'title' ] ) ) {
	$title = $instance[ 'title' ];
	$direccion = $instance[ 'direccion' ];
	}
	else {
	$title = __( 'Titulo', 'my_widget_domain' );
	$direccion = __( 'Direccion', 'my_widget_domain' );
	}
	// Formulario del backend
	 ?>
	<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Nombre de la tienda:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>
	<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Direccion:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'direccion' ); ?>" name="<?php echo $this->get_field_name( 'direccion' ); ?>" type="text" value="<?php echo esc_attr( $direccion ); ?>" />
	</p>
	<?php	
	}
	// Actualizamos el widget reemplazando las viejas instancias con las nuevas
	public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	$instance['direccion'] = ( ! empty( $new_instance['direccion'] ) ) ? strip_tags( $new_instance['direccion'] ) : '';
	return $instance;
	}
	} // La clase wp_widget termina aquí

?>
