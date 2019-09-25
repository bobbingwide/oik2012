<?php // (C) Copyright Bobbing Wide 2013, 2014


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

/**
 * @link http://www.mojowill.com/developer/quick-tip-hide-jetpack-from-non-admins/
 * @link http://wordpress.org/support/topic/hide-events-menu-from-users-without-capabilities
 */
add_action( 'admin_menu', 'oik2012_remove_menus' );
 
function oik2012_remove_menus(){
  if( !current_user_can( 'add_users' ) ){
    remove_menu_page( 'jetpack' );
    //remove_menu_page( 'events' );
  }
}

/**
 * Create a version specific Menu toggle section
 * 
 * Prior to v1.5 of TwentyTwelve we use an h3 tag, from 1.5 it's a button.
 * See TRAC #28224 https://core.trac.wordpress.org/ticket/28224
 *
 * TwentyTwelve version  Tag for menu-toggle
 * --------------------  -------------------
 * 1.5 and higher        button
 * up to 1.4             h3
 *
 * Note: This may not work on a site which has been upgraded through beta versions of WordPress.
 */  
function oik2012_menu_toggle() {
  $installed_theme = wp_get_theme( "twentytwelve" );
  if ( $installed_theme->exists() ) {
    $version =  $installed_theme->get('Version');
    if ( version_compare( $version, 1.5, 'ge' ) ) {
    ?>
			<button class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></button>
    <?php } else { ?>
      
			<h3 class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></h3>
    <?php
    }
  }
}






