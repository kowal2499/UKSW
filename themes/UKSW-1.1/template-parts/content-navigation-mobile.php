<nav class="navbar navbar-default" role="navigation" id="navigation-mobile">
	
	<div class="navbar-header"> 

	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> 
	      <span class="sr-only">Toggle navigation</span> 
	      <span class="icon-bar"></span> 
	      <span class="icon-bar"></span> 
	      <span class="icon-bar"></span>
	    </button> 

	    <a class="navbar-left" href="<?php  echo esc_url( home_url( '/' ) ); ?>">
      		<img src=<?php echo wp_get_attachment_url( 440 ); ?>>  
    	</a>
	    
	 </div>

	 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-left">

      <?php 
      	$my_menus = Array ('primary');
      	$menu_list = '';

      	foreach ( $my_menus as $menu_name) {
 
			if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
			    $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
			    $menu_items = wp_get_nav_menu_items($menu->term_id);
			 
			    foreach ( (array) $menu_items as $key => $menu_item ) {
			        $title = $menu_item->title;
			        $url = $menu_item->url;

			        if (is_front_page() && $key == 0) {
//			            $class = ''
                    }

			        $menu_list .= '<li class="mobile-menu-'.$menu_name.'"><a href="' . $url . '">' . $title . '</a></li>';
			    } 
			} 
		}
		echo $menu_list;
      ?>
      </ul>
    </div><!-- /.navbar-collapse -->
</nav>