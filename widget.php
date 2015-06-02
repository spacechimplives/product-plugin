<?php


class product_box_widget extends WP_Widget {
    function product_box_widget() {
		parent::__construct(false, $name = __('Product Box', 'product_box_widget')
		);
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['product'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['product'] ). $args['after_title'];
		}
		echo __( 'Hello, World!', 'text_domain' );
		echo $args['after_widget'];
	}

	public function form( $instance ) {
        echo '<p><label for="'.$this->get_field_id('select').'">'._e('Select:', 'wp_widget_plugin').'</label>
	    <select name="'.$this->get_field_name('select').'" id="'.$this->get_field_id('select').'" class="widefat">';
	    
        $options = array('lorem', 'ipsum', 'dolorem');
        foreach ($options as $option) {
            echo '<option value="' . $option . '" id="' . $option . '"', $select == $option ? ' selected="selected"' : '', '>', $option, '</option>';

        }
        echo '</p>';
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['product'] = ( ! empty( $new_instance['product'] ) ) ? strip_tags( $new_instance['product'] ) : '';
		$instance['select'] = strip_tags($new_instance['select']);
		return $instance;
	}

} 
function product_box_register_widgets() {
	register_widget( 'product_box_widget' );
}

add_action( 'widgets_init', 'product_box_register_widgets' );
