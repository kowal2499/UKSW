<?php

class Erla_OWLCarousel_Simple extends WP_Widget
{
	public function __construct()
	{
		parent::__construct('erla-owlcarousel-simple', 'erla OWLCarousel Simple', array(
			'description' => 'owlCarousel based slider, simpifed version'
		));
	}
 
	public function widget($args, $widget_instance)
	{
		echo $args['before_widget'];

		require_once(plugin_dir_path(__FILE__) . '/widget_class_frontend.php');


		echo '<div class="eoc-wrapper">';
		echo '<div class="owl-carousel" id="eoc-'. $this->id .'">';
		get_frontend($widget_instance);
		echo '</div>';
		echo '</div>';

		echo $args['after_widget'];

?>
	<script>
		jQuery(document).ready(function(){
		  jQuery("<?= "#eoc-". $this->id; ?>").owlCarousel(
		  	{
		  		items: 1,
					autoplay: true,
					autoplayTimeout: 3000,
					autoplayHoverPause: false,
					loop: true,
					animateOut: 'fadeOut'
		  	});
		});
	</script>

<?php

	}
 
	public function form($instance)
	{

		$defaults = array(
			'title' => 'Events'
		);
		$instance = wp_parse_args((array)$instance, $defaults);

		if (isset($instance['image'])) {
			$image = $instance['image'];
		} else {
			$image = '';
		}

   ?>

   <div class="erla-owlcarousel-form" id="<?= $this->id; ?>" data-widgetid="<?= $this->id; ?>">
   			<input type="hidden" id="<?= $this->get_field_id('image'); ?>" name="<?= $this->get_field_name('image'); ?>" value="<?= $image; ?>"> 
   			
 				<div class="eoc-slides"></div>

        <p class="shortcode">
        	Shortcode for this instance:<br>[eoc id="<?= preg_replace("/[^0-9]/", "", $this->id); ?>"]
        </p>
        	
      	<input type="button" class="button button-secondary owl-addnew" value="Dodaj nowy slajd">
   </div>		
 
  <?php
	}
 
	public function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['image'] = $new_instance['image'];
		return $instance;
	}
}