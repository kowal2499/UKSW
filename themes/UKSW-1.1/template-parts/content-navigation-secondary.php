<nav class="navbar navbar-default" role="navigation" id="navigation-beta" data-spy="affix" data-offset-top="65"> 
  
  <div class="container">
  <!-- Brand and toggle get grouped for better mobile display --> 
  <div class="navbar-header"> 

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex2-collapse"> 
      <span class="sr-only">Toggle navigation</span> 
      <span class="icon-bar"></span> 
      <span class="icon-bar"></span> 
      <span class="icon-bar"></span> 
    </button> 

  </div> 

  <?php wp_nav_menu( array( 
    'theme_location' => 'secondary',
    'container' => 'nav',
    'container_class' => 'collapse navbar-collapse navbar-ex2-collapse',
    'menu_class' => 'nav navbar-nav navbar-right',
    'menu_id' => 'secondary-menu' ) 
    ); ?>

  </div>
</nav>