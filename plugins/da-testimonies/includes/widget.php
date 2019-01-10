<?php
class DA_Testimonies_Widget extends WP_Widget
{
	function __construct()
	{
		parent::__construct('da_testimonies_widget', 'DA Testimonies', array(
			'description' => 'Widget pokazuje świadectwa wiary.'
		));
	}

	function widget($args, $instance)
	{
		echo $args['before_widget'];
		$title = apply_filters('widget_title', $instance['title']);
		echo $args['before_title'] . $title . $args['after_title'];
		echo $args['after_widget'];
	}

	function form($instance)
	{
		$defaults = array(
			'title' => 'Świadectwa'
		);
		$instance = wp_parse_args((array)$instance, $defaults);
   ?>
 
      <p>
        <label for="title">Tytuł</label>
        <input type="text" id="<?php
      		echo $this->get_field_id('title'); ?>" name="<?php
      		echo $this->get_field_name('title'); ?>" value="<?php
      		echo $instance['title']; ?>"/>
      </p>
 
  <?php
	}

	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}
}


function da_testimonies_load_widget()
{
	register_widget('da_testimonies_widget');
}
 
add_action('widgets_init', 'da_testimonies_load_widget');



function testimonies_shortcode_func($atts) {

	global $wp_registered_widgets;

	// process attributes

	extract(shortcode_atts(array('id' => '1'), $atts));
	$instance = $id;
	$id = 'da_testimonies_widget-' . $id;

	// echo widget

	if (!isset($wp_registered_widgets[$id])) {
		return;
	}

	da_testimonies_widget_content();
}

add_shortcode('testimonies','testimonies_shortcode_func');