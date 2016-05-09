<?php
//Header File
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php
    wp_head();
?>
</head>
<body <?php body_class(); ?>>
<div id="global" class="global">
    <div class="pagesidebar">
        <div class="sidebarcontent">    
            <h2 id="sidelogo">
            <a href="<?php echo vibe_site_url(); ?>"><img src="<?php  echo apply_filters('wplms_logo_url',VIBE_URL.'/assets/images/logo.png','pagesidebar'); ?>" alt="<?php echo get_bloginfo('name'); ?>" /></a>
            </h2>
            <?php
                $args = apply_filters('wplms-mobile-menu',array(
                    'theme_location'  => 'mobile-menu',
                    'container'       => '',
                    'menu_class'      => 'sidemenu',
                    'fallback_cb'     => 'vibe_set_menu',
                ));

                wp_nav_menu( $args );
            ?>
        </div>
        <a class="sidebarclose"><span></span></a>
    </div>  
    <div class="pusher">
        <?php
            $fix=vibe_get_option('header_fix');
        ?>
        <div id="headertop" class="<?php if(isset($fix) && $fix){echo 'fix';} ?>" style="background:#ffffff;color:#a0d6b4;">

            <div class="<?php echo vibe_get_container(); ?>">
                <div class="row">
                    <div class="col-md-3 col-sm-2 col-xs-3">
                       <a href="<?php echo vibe_site_url(); ?>" class=""><img width="100px" src="<?php  echo apply_filters('wplms_logo_url',VIBE_URL.'/assets/images/logo.png','headertop'); ?>" alt="<?php echo get_bloginfo('name'); ?>" /></a> 
                    </div>
                    <div class="col-md-9 col-sm-10 col-xs-9">
                    
                    <?php
                    if ( function_exists('bp_loggedin_user_link') && is_user_logged_in() ) :
                        ?>
                        <ul class="topmenu">
                            <li><a href="<?php bp_loggedin_user_link(); ?>" class="smallimg vbplogin"><?php $n=vbp_current_user_notification_count(); echo ((isset($n) && $n)?'<em></em>':''); bp_loggedin_user_avatar( 'type=full' ); ?><?php bp_loggedin_user_fullname(); ?></a></li>
                            <?php do_action('wplms_header_top_login'); ?>
                    <?php
                    else :
                        ?>
                        <ul class="topmenu">
                            <li > <a href="#login" style="color:#a0a0a0;" class="smallimg vbplogin">
                                 <img src="https://pandadar.com/wordpress/wp-content/uploads/2016/04/pandadar_login_icon.png" height="20px" width="20px">
                                 <?php _e('Login','vibe'); ?> </a>
</li> <li > 
                            <?php if ( function_exists('bp_get_signup_allowed') && bp_get_signup_allowed() ) :
                                $registration_link = apply_filters('wplms_buddypress_registration_link',site_url( BP_REGISTER_SLUG . '/' ));
                                printf( __( '<a style="background-color:#f7931e;color:#FFF;padding:0px 5px 0px 5px;" href="%s" class="vbpregister" title="'.__('Create an account','vibe').'">'.__('Free Trial','vibe').'</a> ', 'vibe' ), $registration_link );

                            endif; ?>
                            </li>
                    <?php
                    endif;
                    ?>

                        </ul>
  <?php
                            $args = apply_filters('wplms-top-menu',array(
                                'theme_location'  => 'top-menu',
                                'container'       => '',
                                'menu_class'      => 'topmenu',
                                'fallback_cb'     => 'vibe_set_menu',
                            ));

                        wp_nav_menu( $args );
                        ?>
                    </div>
                    <?php
                         $style = vibe_get_login_style();
                        if(empty($style)){
                            $style='default_login';
                        }
                    ?>
                    <div id="vibe_bp_login" class="<?php echo $style; ?>">
                    <?php
                        vibe_include_template("login/$style.php");
                     ?>
                   </div>
                </div>
            </div>
        </div>

<header style="border-top:0px solid #EFEFEF;border-bottom: 0px solid #EFEFEF;">
                    <a id="trigger" style="top:10px;opacity:0.5;">
                       <img alt="menu" width="30px" src="https://pandadar.com/wordpress/wp-content/uploads/2016/04/hamburger_white-.png"/><span ></span>
                    </a></header>
