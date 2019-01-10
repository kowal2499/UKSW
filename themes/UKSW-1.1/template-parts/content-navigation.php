<nav class="navbar navbar-default " role="navigation" id="navigation-alfa" data-spy="affix" data-offset-top="15"> 

  <div class="container">
  <!-- Brand and toggle get grouped for better mobile display --> 
  <div class="navbar-header"> 

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> 
      <span class="sr-only">Toggle navigation</span> 
      <span class="icon-bar"></span> 
      <span class="icon-bar"></span> 
      <span class="icon-bar"></span> 
    </button> 
    

    <a class="navbar-left" href="<?php  echo esc_url( home_url( '/' ) ); ?>">
      <img src=<?php echo wp_get_attachment_url( 440 ); ?> >  
      <?php #bloginfo( 'name' ); ?>
    </a>


  </div> 


  <?php wp_nav_menu( array( 
    'theme_location' => 'primary',
    'container' => 'nav',
    'container_class' => 'collapse navbar-collapse navbar-ex1-collapse',
    'menu_class' => 'nav navbar-nav navbar-right',
    'menu_id' => 'primary-menu' ) 
    ); ?>
</div>
</nav>
