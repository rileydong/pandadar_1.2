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
        <header class="sleek <?php if(isset($fix) && $fix){echo 'fix';} ?>">
            <div class="<?php echo vibe_get_container(); ?>">
                <div id="searchdiv">
                    <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                        <div><label class="screen-reader-text" for="s">Search for:</label>
                            <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="<?php _e('Hit enter to search...','vibe'); ?>" />
                            <?php 
                                $course_search=vibe_get_option('course_search');
                                if(isset($course_search) && $course_search)
                                    echo '<input type="hidden" value="course" name="post_type" />';
                            ?>
                            <input type="submit" id="searchsubmit" value="Search" />
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-2 col-sm-4 col-xs-4">
                        <?php

                            if(is_home()){
                                echo '<h1 id="logo">';
                            }else{
                                echo '<h2 id="logo">';
                            }
                        ?>
                            <a href="<?php echo vibe_site_url(); ?>"><img src="<?php  echo apply_filters('wplms_logo_url',VIBE_URL.'/assets/images/logo.png','header'); ?>" alt="<?php echo get_bloginfo('name'); ?>" /></a>
                        <?php
                            if(is_home()){
                                echo '</h1>';
                            }else{
                                echo '</h2>';
                            }?>
                    </div>
                    <div class="col-md-6 col-sm-4 col-xs-4">

                    <?php

                            $args = apply_filters('wplms-main-menu',array(
                                 'theme_location'  => 'main-menu',
                                 'container'       => 'nav',
                                 'menu_class'      => 'menu',
                                 'walker'          => new vibe_walker,
                                 'fallback_cb'     => 'vibe_set_menu'
                             ));
                            wp_nav_menu( $args ); 
                        ?>
                    </div>
                    <div class="col-md-4 col-sm-8 col-xs-8">
                        <?php
                            if ( function_exists('bp_loggedin_user_link') && is_user_logged_in() ) :
                                ?>
                                <ul class="topmenu">
                                    <li><a href="<?php bp_loggedin_user_link(); ?>" class="smallimg vbplogin"><?php $n=vbp_current_user_notification_count(); echo ((isset($n) && $n)?'<em></em>':''); bp_loggedin_user_avatar( 'type=full' ); ?><span><?php bp_loggedin_user_fullname(); ?></span></a></li>

                            <?php do_action('wplms_header_top_login'); ?>

                                    <?php
                                    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )  || (function_exists('is_plugin_active') && is_plugin_active( 'woocommerce/woocommerce.php'))) { global $woocommerce;
                                    ?>
                                    <li><a class="smallimg vbpcart"><span class="fa fa-shopping-cart"><?php echo (($woocommerce->cart->cart_contents_count)?'<em>'.$woocommerce->cart->cart_contents_count.'</em>':''); ?></span></a>
                                    <div class="woocart"><?php woocommerce_mini_cart(); ?></div>
                                    </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            <?php
                            else :
                                ?>
                                <ul class="topmenu">

    <li> <a href="#login" style="color:#a0a0a0;" class="smallimg vbplogin">
                                 <img src="http://pandadar.com/wordpress/wp-content/uploads/2016/03/pandadar_login_icon-1.png" height="20px" width="20px">
                                 <?php _e('Login','vibe'); ?> </a>
</li> <li >
                            <?php if ( function_exists('bp_get_signup_allowed') && bp_get_signup_allowed() ) :
                                $registration_link = apply_filters('wplms_buddypress_registration_link',site_url( BP_REGISTER_SLUG . '/' ));
                                printf( __( '<a style="border: 1px solid #36d7b7;background-color:none;margin-top:12px; margin-bottom:5px;padding:5px 5px 1px 5px;" href="%s" class="vbpregister" title="'.__('Create an account','vibe').'">'.__('Free Trial','vibe').'</a> ', 'vibe' ), $registration_link );

                            endif; ?>
                            </li>




                                    <?php
                                    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )  || (function_exists('is_plugin_active') && is_plugin_active( 'woocommerce/woocommerce.php'))) { global $woocommerce;
                                    ?>

                                    <?php
                                    }
                                    ?>
                                </ul> 
                            <?php
                            endif;
                        ?>
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
                    <a id="trigger" style="top:10px;opacity:0.5; position:absolute; top:60px; right:5px;">

                       <img alt="menu" width="30px" src="http://pandadar.com/wordpress/wp-content/uploads/2016/03/hamburger_white-.png"/><span ></span>

                    </a>
                </div>
            </div>
        </header>
