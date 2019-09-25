<?php


add_action( 'widgets_init', 'oik2012_widgets_init', 11 );

/**
 * Implement 'widgets_init' action for oik2012 footer widgets 
 */
function oik2012_widgets_init() {
  $widgets = array( "left", "middle", "right", "fullwidth" ); 
  foreach ( $widgets as $widget ) {
    register_sidebar( array( 'name' => "Footer Widgets $widget"
                           , 'id' => "$widget-footer"
                           , 'before_widget' => ''
                           , 'after_widget' => ''
                           , 'before_title' => '<h3 class="widget-title">'
                           , 'after_title' => '</h3>'
                           )
                    );
  }
}                    

add_action( 'after_setup_theme', 'oik2012_after_setup_theme', 11 );

function oik2012_after_setup_theme() {
  global $editor_styles;
  $editor_styles = array();
}

function oik2012_footer_widgets() {
  if ( function_exists( 'dynamic_sidebar' ) ) {
    ?>
    <div id="footerwidgets"> 
      <div id="footer-left"> 
          <?php dynamic_sidebar('Footer Widgets left'); ?>
      </div> 
      <div id="footer-middle"> 
          <?php dynamic_sidebar('Footer Widgets middle'); ?>
    </div> 
    <div id="footer-right"> 
        <?php dynamic_sidebar('Footer Widgets right'); ?>
    </div> 
  </div> 
  <?php
  }
}





