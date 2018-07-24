<?php /* THANKS TO https://www.wp-hasty.com/tools/wordpress-widget-generator/*/ ?>
<?php
/**
* Adds Huni About widget
*/
class Huni_About_Widget extends WP_Widget {

	/**
	* Register widget with WordPress
	*/
	function __construct() {
		parent::__construct(
			'huniabout_widget', // Base ID
			esc_html__( 'Huni About', HUNI_TEXT_DOMAIN ) // Name
		);
		add_action( 'admin_footer', array( $this, 'media_fields' ) );
		add_action( 'customize_controls_print_footer_scripts', array( $this, 'media_fields' ) );

	}

	/**
	* Widget Fields
	*/
	private $widget_fields = array(
		array(
			'label' => 'Display logo',
			'id' => 'display_logo',
			'default' => 0,
			'type' => 'checkbox',
		),
		array(
			'label' => 'Logo color',
			'id' => 'logo_color',
			'default' => 'dark',
			'type' => 'select',
			'options'	=>	array(
				'dark' 	=> 'Dark',
				'light'	=> 'Light',
			),
		),
		array(
			'label' => 'Custom logo',
			'id' => 'custom_logo',
			'type' => 'media',
			'default' => '',
		),
		array(
			'label' => 'Description',
			'id' => 'description',
			'type' => 'textarea',
			'default'=>'',
		),
		array(
			'label' => 'Display social icons',
			'id' => 'display_social',
			'default' => 0,
			'type' => 'checkbox',
		),
		
	);


	/**
	* Media Field Backend
	*/
	public function media_fields() {
		?><script>
			jQuery(document).ready(function($){
				if ( typeof wp.media !== 'undefined' ) {
					var _custom_media = true,
					_orig_send_attachment = wp.media.editor.send.attachment;
					$(document).on('click','.custommedia',function(e) {
						var send_attachment_bkp = wp.media.editor.send.attachment;
						var button = $(this);
						var id = button.attr('id');
						_custom_media = true;
							wp.media.editor.send.attachment = function(props, attachment){
							if ( _custom_media ) {
								$('input#'+id).val(attachment.url);
								$('input#'+id).trigger('change');
							} else {
								return _orig_send_attachment.apply( this, [props, attachment] );
							};
						}
						wp.media.editor.open(button);
						return false;
					});
					$('.add_media').on('click', function(){
						_custom_media = false;
					});
				}
			});
		</script><?php
	}

	/**
	* Front-end display of widget
	*/
	public function widget( $args, $instance ) {
		global $huni_options;
		echo $args['before_widget'];
		// Output widget title
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		// Output generated fields
	
		?>
		<?php if($instance['display_logo']){ ?>
				<?php if($instance['custom_logo']){ ?>
					<img src="<?php echo $instance['custom_logo']; ?>" />
				<?php }else{ ?>
					<span class="logo">
						<img src="<?php echo $huni_options['logo-'.$instance['logo_color']]['url']; ?>" />
					</span>
				<?php } ?>
			
		<?php } ?>
		<p>
			<?php echo $instance['description']; ?>
		</p>
		<?php
			if($instance['display_social']){
				echo huni_display_social_links();
			}
		?>
		
		<?php
		echo $args['after_widget'];
	}

	/**
	* Back-end widget fields
	*/
	public function field_generator( $instance ) {
		$output = '';
		foreach ( $this->widget_fields as $widget_field ) {
			$widget_value = ! empty( $instance[$widget_field['id']] ) ? $instance[$widget_field['id']] : esc_html__( $widget_field['default'], 'text-domain' );
			switch ( $widget_field['type'] ) {
				case 'media':
					$output .= '<p>';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'text-domain' ).':</label> ';
					$output .= '<input class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.esc_url( $widget_value ).'">';
					$output .= '<button id="'.$this->get_field_id( $widget_field['id'] ).'" class="button select-media custommedia">Add Media</button>';
					$output .= '</p>';
					break;
				case 'checkbox':
					$output .= '<p>';
					$output .= '<input class="checkbox" type="checkbox" '.checked( $widget_value, true, false ).' id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" value="1">';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], HUNI_TEXT_DOMAIN ).'</label>';
					$output .= '</p>';
					break;
				case 'textarea':
					$output .= '<p>';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], HUNI_TEXT_DOMAIN ).':</label> ';
					$output .= '<textarea class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" rows="6" cols="6" value="'.esc_attr( $widget_value ).'">'.$widget_value.'</textarea>';
					$output .= '</p>';
					break;
				case 'select':
					$output .= '<p>';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], HUNI_TEXT_DOMAIN ).':</label> ';
					$output .= '<select class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" rows="6" cols="6" value="'.esc_attr( $widget_value ).'">';
					foreach( $widget_field['options'] as $key=>$option){
						if($key==$widget_field['default']){
							$selected='selected="selected"';
						}else{
							$selected='';
						}
						$output .= '<option value="'.$key.'"'.$selected.'>'.$option.'</option>';
					}
					$output .= '</select>';
					$output .= '</p>';
					break;
				default:
					$output .= '<p>';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], HUNI_TEXT_DOMAIN ).':</label> ';
					$output .= '<input class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.esc_attr( $widget_value ).'">';
					$output .= '</p>';
			}
		}
		echo $output;
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', HUNI_TEXT_DOMAIN );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', HUNI_TEXT_DOMAIN ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
		$this->field_generator( $instance );
	}

	/**
	* Sanitize widget form values as they are saved
	*/
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		foreach ( $this->widget_fields as $widget_field ) {
			switch ( $widget_field['type'] ) {
				case 'checkbox':
					$instance[$widget_field['id']] = $_POST[$this->get_field_id( $widget_field['id'] )];
					break;
				default:
					$instance[$widget_field['id']] = ( ! empty( $new_instance[$widget_field['id']] ) ) ? strip_tags( $new_instance[$widget_field['id']] ) : '';
			}
		}
		return $instance;
	}
} // class Huni_About_Widget

// register Huni About widget
function register_huniabout_widget() {
	register_widget( 'Huni_About_Widget' );
}
add_action( 'widgets_init', 'register_huniabout_widget' );