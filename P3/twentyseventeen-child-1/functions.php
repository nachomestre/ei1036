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


	// Registramos el widget
	function load_my_widget() {
		register_widget( 'plugin_widget_1' );
	}
	add_action( 'widgets_init', 'load_my_widget' );

	// Creamos el widget 
	class plugin_widget_1 extends WP_Widget {

	public function __construct() {
			$widget_ops = array( 
				'classname' => 'plugin_widget_1',
				'description' => 'widget de prueba',
			);
			parent::__construct( 'plugin_widget_1', 'Widget de Prueba', $widget_ops );
		}	


	// Creamos la parte pública del widget

	public function widget( $args, $instance ) {
	$title = apply_filters( 'widget_title', $instance['title'] );

	// los argumentos del antes y después del widget vienen definidos por el tema
	echo $args['before_widget'];
	if ( ! empty( $nombre_tienda ) )
	echo $args['before_title'] . $nombre_tienda . $args['after_title'];

	// Aquí es donde debemos introducir el código que queremos que se ejecute
	echo 'Dirección: ' , $direccion ;
	echo $args['after_widget'];
	}
			
	// Backend  del widget
	public function form( $instance ) {
	if ( isset( $instance[ 'nombre_tienda' ] ) ) {
	$nombre_tienda = $instance[ 'nombre_tienda' ];
	}
	else {
	$nombre_tienda = __( 'Nombre de la tienda', 'my_widget_domain' );
	$direccion = __( 'Direccion de la tienda', 'my_widget_domain' );
	}
	// Formulario del backend
	 ?>
	<p>
	<label for="<?php echo $this->get_field_id( 'nombre_tienda' ); ?>"><?php _e( 'Nombre de la tienda:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'nombre_tienda' ); ?>" name="<?php echo $this->get_field_name( 'nombre_tienda' ); ?>" type="text" value="<?php echo esc_attr( $nombre_tienda ); ?>" />
	</p>
	<p>
	<label for="<?php echo $this->get_field_id( 'direccion' ); ?>"><?php _e( 'Direccion de la tienda:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'direccion' ); ?>" name="<?php echo $this->get_field_name( 'direccion' ); ?>" type="text" value="<?php echo esc_attr( $direccion ); ?>" />
	</p>
	<?php	
	}
	// Actualizamos el widget reemplazando las viejas instancias con las nuevas
	public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['nombre_tienda'] = ( ! empty( $new_instance['nombre_tienda'] ) ) ? strip_tags( $new_instance['nombre_tienda'] ) : '';
	$instance['direccion'] = ( ! empty( $new_instance['direccion'] ) ) ? strip_tags( $new_instance['direccion'] ) : '';
	return $instance;
	}
	} // La clase wp_widget termina aquí
?>
