<?php /* THANKS TO https://www.wp-hasty.com/tools/wordpress-widget-generator/*/ ?>
<?php
/**
* Adds Huni Recents Comments widget
*/
class Huni_Recent_Comments_Widget extends WP_Widget {

	/**
	* Register widget with WordPress
	*/
	function __construct() {
		parent::__construct(
			'Huni_Recent_Comments_Widget', // Base ID
			esc_html__( 'Huni Recent Comments', 'text-domain' ), // Name
			array( 'description' => esc_html__( 'Display recent comments', 'text-domain' ), ) // Args
		);
	}

	/**
	* Widget Fields
	*/
	private $widget_fields = array(
		array(
			'label' => 'Comment count',
			'id' => 'comment_count',
			'default' => '5',
			'type' => 'number',
		),
	);

	/**
	* Front-end display of widget
	*/
	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		// Output widget title
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		// Output generated fields
		huni_recent_comments($instance['comment_count']);
		
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
				default:
					$output .= '<p>';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'text-domain' ).':</label> ';
					$output .= '<input class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.esc_attr( $widget_value ).'">';
					$output .= '</p>';
			}
		}
		echo $output;
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'text-domain' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text-domain' ); ?></label>
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
} // class Huni_Recent_Comments_Widget

// register Huni Recents Comments widget
function register_Huni_Recent_Comments_Widget() {
	register_widget( 'Huni_Recent_Comments_Widget' );
}
add_action( 'widgets_init', 'register_Huni_Recent_Comments_Widget' );


?>
<?php 
function huni_recent_comments($count=5){
	$comments = get_comments("status=approve&number=$count"); ?>
	<ul class="huni_recent_comments">
	<?php foreach ($comments as $comment) { ?>
	    <li class="recent-comment-wrapper">
	    <?php
	        $title = get_the_title($comment->comment_post_ID); ?>
	        
	        <div class="comment_gravatar"><?php echo get_avatar( $comment, '53' )?> </div>
	        <div class="recent_comment">
		        <div class="comment_author"><?php echo $comment->comment_author ?> <span><?php _e('says', HUNI_TEXT_DOMAIN) ?></span></div>
				
		        <?php echo wp_html_excerpt( $comment->comment_content, 72 ).'…'; ?>
		        <div class="comment-article">
			        <?php _e('On') ?> 
			        <a href="<?php echo get_permalink($comment->comment_post_ID); ?>" rel="external nofollow" title="<?php echo $title; ?>">
			        	<?php echo $title; ?> 
		        	</a>
		        </div>
			</div>
	    </li>
	<?php }  ?> </ul>
<?php
}