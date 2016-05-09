<?php

/**
 * FILE: css.php 
 * Author: Mr.Vibe 
 * Credits: www.VibeThemes.com
 * Project: WPLMS
 */
//.widget .item-options

if ( !defined( 'ABSPATH' ) ) exit;

function print_customizer_style(){
$theme_customizer=get_option('vibe_customizer');
echo '<style>';

$dom_array = array(
    'primary_bg'  => array(
                            'element' => 'a:hover',
                            'css' => 'primary'
                            ),
    'primary_color'  => array(
                            'element' => '.woocommerce a.button, .button,#nav_horizontal li.current-menu-ancestor>a, 
                                          #nav_horizontal li.current-menu-item>a, .total_students span,
                                          #nav_horizontal li a:hover, .button.hero,.tagcloud a:hover,
                                          #nav_horizontal li:hover a,.course_button.button span.amount,
                                          #buddypress .item-list-tabs ul li a:hover,
                                          .login_sidebar .login_content #vbp-login-form #sidebar-wp-submit,
                                          .vibe_filterable li.active a,.tabbable .nav.nav-tabs li:hover a,
                                          .btn,a.btn.readmore:hover,.checkbox>input[type=checkbox]:checked+label:after,
                                          footer .tagcloud a:hover,.tagcloud a,.in_quiz .pagination ul li span,
                                          .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus,
                                          .hover-link:hover,#buddypress .activity-list li.load-more a:hover,
                                          #buddypress div.generic-button a:hover,
                                          .archive #buddypress .course_category,
                                          .archive #buddypress .course_category h3,#buddypress ul.item-list li .item-credits a.button,#buddypress ul.item-list li .item-credits a.button span,
                                          #buddypress .item-list-tabs ul li a:hover,
                                          .pagination .current,#question #submit:hover,.ques_link:hover,.reset_answer:hover,
                                          .widget .course_cat_nav ul li.current-cat-parent>a, .widget .course_cat_nav ul li.current-cat>a,
                                          .widget .course_cat_nav ul li a span,.woocommerce ul.products li.product .button,
                                          .woocommerce nav.woocommerce-pagination ul li span.current,
                                          .woocommerce nav.woocommerce-pagination ul li a:hover,
                                          .woocommerce #respond input#submit, .woocommerce #content input.button, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, 
                                          .woocommerce div.product .woocommerce-tabs ul.tabs li.active, 
                                          .woocommerce div.product .woocommerce-tabs ul.tabs li:hover,
                                          #vibe_bp_login input[type=submit],
                                          .woocommerce-page #respond input#submit,
                                          #bbpress-forums #favorite-toggle a:hover, 
                                          #bbpress-forums #subscription-toggle a:hover,
                                          #bbpress-forums .bbp-pagination .bbp-pagination-links a.page-numbers:hover, 
                                          #bbpress-forums .bbp-pagination .bbp-pagination-links span.current,
                                          #buddypress ul.button-nav li a,
                                          .mooc .vbpcart span em, .sleek .vbpcart span em,
                                          .single-course.c2 #item-nav div.item-list-tabs#object-nav li.current a, 
                                          .single-course.c3 #item-nav div.item-list-tabs#object-nav li.current a, 
                                          .single-course.c5 #item-nav div.item-list-tabs#object-nav li.current a,
                                          .single-item.groups.g2 #buddypress div.item-list-tabs#object-nav li a:hover, 
                                          .single-item.groups.g3 #buddypress div.item-list-tabs#object-nav li a:hover, 
                                          .single-item.groups.g4 #buddypress div.item-list-tabs#object-nav li a:hover,
                                          .v_module.custom_post_carousel .heading_more,
                                          .minimal .pusher #buddypress a.button:hover,.minimal .note-tabs ul li.selected a,
                                          .minimal #buddypress div.item-list-tabs ul li.selected a span,
                                          .minimal .widget .course_cat_nav ul li a:hover span,
                                          .minimal .pagination .page-numbers.current,.minimal .pagination span.current,
                                          .minimal.woocommerce-page a.button:hover,.minimal.woocommerce a.button:hover,
                                          .minimal .pusher .button:hover,.minimal.woocommerce ul.products li a.button:hover, 
                                          .minimal .pagination a.page-numbers:hover, .minimal .pagination a:hover,
                                          .minimal .pusher #buddypress input[type=submit]:hover,  
                                          .minimal .pusher input[type=submit]:hover,
                                          .minimal.woocommerce-page #content input.button:hover, 
                                          .minimal.woocommerce-page input.button:hover,
                                          .minimal .mooc .woocart .buttons .button:hover,
                                          .minimal .sleek .woocart .buttons .button:hover,
                                          .minimal .pusher .woocommerce a.button:hover,
                                          .elegant #buddypress .dir-form div.item-list-tabs ul li:not(.selected) a:hover,
                                          .elegant.single-course.c4 #buddypress .item-list-tabs#object-nav li a:hover,
                                          .elegant .widget.pricing a.button',
                            'css' => 'color'
                            ),
        'logo_size' => array(
                            'element' => '#logo img,#alt_logo img',
                            'css' => 'height'
                            ),
      'logo_top_padding'  => array(
                            'element' => '#logo',
                            'css' => 'padding-top'
                            ),
      'logo_bottom_padding'  => array(
                            'element' => '#logo',
                            'css' => 'padding-bottom'
                            ),
    'header_top_bg'  => array(
                            'element' => '#headertop,header.sleek.fixed,header.standard.fixed,.pagesidebar,#pmpro_confirmation_table thead,header #searchdiv.active #searchform input[type=text],
                            .pmpro_checkout thead th,#pmpro_levels_table thead,.boxed #headertop .container,header.sleek.transparent.fixed',
                            'css' => 'background-color'
                            ),
    'header_top_color'  => array(
                            'element' => '#headertop,#headertop a,.sidemenu li a,#pmpro_confirmation_table thead,
                            .pmpro_checkout thead th,#pmpro_levels_table thead, .sleek.fixed .topmenu>li>a,header.sleek.fixed #searchicon,header.sleek.fixed nav>.menu>li>a',
                            'css' => 'color'
                            ),
    'header_bg'  => array(
                            'element' => 'header,.sidemenu li.active a, .sidemenu li a:hover,.note-tabs,
                            header #searchform input[type="text"],.boxed header:not(.transparent) .container,.reset_answer:hover',
                            'css' => 'background-color'
                            ),
    'header_color'  => array(
                            'element' => 'nav .menu li a,nav .menu li.current-menu-item a,.topmenu li a,.sleek .topmenu>li>a, .sleek nav>.menu>li>a,
                            header #searchicon,.mooc .topmenu>li>a, .mooc nav>.menu>li>a,#login_trigger',
                            'css' => 'color'
                            ),
    'nav_bg'  => array(
                            'element' => '.sub-menu,nav .sub-menu,#mooc_menu nav .menu li:hover>.menu-sidebar,
                            header #searchform,.sleek .woocart',
                            'css' => 'background-color'
                            ),
    'nav_color'  => array(
                            'element' => 'nav .menu li>.sub-menu li a, nav .menu li.current-menu-item .sub-menu li a,
                                          nav .sub-menu li.current-menu-item a,nav .menu li .menu-sidebar .widget h4.widget_title,
                                          nav .menu li .menu-sidebar .widget ul li a,nav .menu li .menu-sidebar .widget,
                                          .megadrop .menu-sidebar,#mooc_menu nav .menu li:hover>.menu-sidebar,
                                          #mooc_menu nav .menu li:hover>.menu-sidebar a,
                                          .megadrop .menu-sidebar .widget ul li a,.megadrop .menu-sidebar .widget .widgettitle,
                                          .megadrop .menu-sidebar .widgettitle,.sleek .woocart .cart_list.product_list_widget .mini_cart_item a, 
                                          .sleek .woocart .cart_list.product_list_widget .mini_cart_item span,
                                          .sleek .woocart .total,.sleek .woocart .cart_list.product_list_widget .empty,
                                          .mooc .woocart .cart_list.product_list_widget .mini_cart_item a, 
                                          .mooc .woocart .cart_list.product_list_widget .mini_cart_item span,
                                          .mooc .woocart .total,.sleek .woocart .cart_list.product_list_widget .empty,
                                          .modern header nav>.menu>li.current-menu-item>a, 
                                          .modern header nav>.menu>li.current_page_item>a, 
                                          .modern header nav>.menu>li:hover>a',
                            'css' => 'color'
                            ),
    'nav_font' => array(
                            'element' => 'nav>.menu>li>a,.sleek .topmenu>li>a, .sleek nav>.menu>li>a',
                            'css' => 'font-family'
                            ),
    'nav_padding' => array(
                            'element' => 'header nav>.menu>li>a,header.sleek nav>.menu>li>a,header.sleek .topmenu>li>a, header #searchicon,
                            .mooc .topmenu>li>a, .mooc nav>.menu>li>a,#alt_logo',
                            'css' => 'padding-top-bottom'
                            ),
    'top_nav_font'=> array(
                            'element' => '#headertop a, .sidemenu li a',
                            'css' => 'font-family'
                            ),
    'login_light'=> array(
                            'element' => '#vibe_bp_login .fullscreen_login,#vibe_bp_login ul+ul',
                            'css' => 'background'
                            ),
    'login_light_color'=> array(
                            'element' => '#close_full_popup:before,#vibe_bp_login ul+ul li a,#vibe_bp_login ul+ul li a',
                            'css' => 'color'
                            ),
    'login_dark'=> array(
                            'element' => '#vibe_bp_login, #vibe_bp_login .fullscreen_login #vbp-login-form',
                            'css' => 'background'
                            ),
    'login_dark_color'=> array(
                            'element' => '#vibe_bp_login .fullscreen_login label,#vibe_bp_login label,#vibe_bp_login ul li#vbplogout a,
                            #vibe_bp_login a:hover, #vibe_bp_login ul li a',
                            'css' => 'color'
                            ),
    'h1_font' => array(
                            'element' => 'h1',
                            'css' => 'font-family'
                            ),
  'h1_font_weight'=> array(
                            'element' => 'h1',
                            'css' => 'font-weight'
                            ),  
  'h1_color'=> array(
                            'element' => 'h1',
                            'css' => 'color'
                            ),
  'h1_size'=> array(
                            'element' => 'h1',
                            'css' => 'font-size'
                            ),
  'h2_font' => array(
                            'element' => 'h2',
                            'css' => 'font-family'
                            ),
  'h2_font_weight'=> array(
                            'element' => 'h2',
                            'css' => 'font-weight'
                            ),  
  'h2_color'=> array(
                            'element' => 'h2',
                            'css' => 'color'
                            ),
  'h2_size'=> array(
                            'element' => 'h2',
                            'css' => 'font-size'
                            ),
   'h3_font' => array(
                            'element' => 'h3',
                            'css' => 'font-family'
                            ),
  'h3_font_weight'=> array(
                            'element' => 'h3',
                            'css' => 'font-weight'
                            ),  
  'h3_color'=> array(
                            'element' => 'h3',
                            'css' => 'color'
                            ),
  'h3_size'=> array(
                            'element' => 'h3',
                            'css' => 'font-size'
                            ),
   'h4_font' => array(
                            'element' => 'h4',
                            'css' => 'font-family'
                            ),
   'h4_font_weight'=> array(
                            'element' => 'h4',
                            'css' => 'font-weight'
                            ), 
  'h4_color'=> array(
                            'element' => 'h4,h4.block_title a',
                            'css' => 'color'
                            ),
  'h4_size'=> array(
                            'element' => 'h4',
                            'css' => 'font-size'
                            ),
  'h5_font' => array(
                            'element' => 'h5',
                            'css' => 'font-family'
                            ),
  'h5_font_weight'=> array(
                            'element' => 'h5',
                            'css' => 'font-weight'
                            ),  
  'h5_color'=> array(
                            'element' => 'h5',
                            'css' => 'color'
                            ),
  'h5_size'=> array(
                            'element' => 'h5',
                            'css' => 'font-size'
                            ),
  'h6_font' => array(
                            'element' => 'h6',
                            'css' => 'font-family'
                            ),
  'h6_font_weight'=> array(
                            'element' => 'h6',
                            'css' => 'font-weight'
                            ),  
  'h6_color'=> array(
                            'element' => 'h6',
                            'css' => 'color'
                            ),
  'h6_size'=> array(
                            'element' => 'h6',
                            'css' => 'font-size'
                            ),
  'widget_title_font' => array(
                            'element' => '#buddypress .widget_title,.widget .widget_title',
                            'css' => 'font-family'
                            ),
  'widget_title_font_weight'=> array(
                            'element' => '#buddypress .widget_title,.widget .widget_title',
                            'css' => 'font-weight'
                            ),  
  'widget_title_color'=> array(
                            'element' => '#buddypress .widget_title,.widget .widget_title',
                            'css' => 'color'
                            ),
  'widget_title_size'=> array(
                            'element' => '#buddypress .widget_title,.widget .widget_title',
                            'css' => 'font-size'
                            ),

  'woo_prd_title_font_weight'=> array(
                            'element' => '.woocommerce ul.products li.product h3, .woocommerce-page ul.products li.product h3,.woocommerce .woocommerce-tabs h2, .woocommerce .related h2',
                            'css' => 'font-weight'
                            ),  
  'woo_prd_title_color'=> array(
                            'element' => '.woocommerce ul.products li.product h3, .woocommerce-page ul.products li.product h3,.woocommerce .woocommerce-tabs h2, .woocommerce .related h2',
                            'css' => 'color'
                            ),
  'woo_prd_title_size'=> array(
                            'element' => '.woocommerce ul.products li.product h3, .woocommerce-page ul.products li.product h3',
                            'css' => 'font-size'
                            ),
  
  'woo_heading_title_size'=> array(
                            'element' => '.woocommerce .woocommerce-tabs h2, .woocommerce .related h2',
                            'css' => 'font-size'
                            ),

  'body_bg'  => array(
                            'element' => 'body,.pusher',
                            'css' => 'background-color'
                            ),
  'content_bg'  => array(
                            'element' => '.boxed .pusher,.content,#item-body,.widget.pricing,.dir-list,.item-list-tabs,
                            #groups-dir-list, #course-dir-list,#group-create-body,body.boxed.custom-background .pusher,
                            #buddypress .dir-form div.item-list-tabs#subnav',
                            'css' => 'background-color'
                            ),
  'content_color'  => array(
                            'element' => '.content,#item-body,.widget.pricing,.dir-list,.item-list-tabs,
                            #groups-dir-list, #course-dir-list,#buddypress ul.item-list li div.item-desc',
                            'css' => 'color'
                            ),
  'content_link_color'  => array(
                            'element' => 'body a,.content p a,.course_description p a,#buddypress a.activity-time-since,.author_info .readmore,
                            .assignment_heading.heading a,.v_text_block a,.main_unit_content a:not(.button),
                            .reply a, .link,.ahref',
                            'css' => 'color'
                            ),
  'price_color'  => array(
                            'element' => '.block.courseitem .star-rating+strong .amount, .block.courseitem .star-rating+ a strong .amount,
                            .block.courseitem .star-rating+strong>span, .block.courseitem .star-rating+a strong>span,
                            span.amount,.block.courseitem .block_content .star-rating+strong, .block.courseitem .block_content .star-rating+a, .block.courseitem .instructor_course+strong,
                             .block.courseitem .instructor_course+a,.pricing_course li strong,.widget .course_details > ul > li:first-child a, .widget .course_details > ul > li:first-child strong > span,
                             .item-credits, .curriculum_check li span.done,.item-credits a,.pricing_course li strong span.subs,.widget .course_details > ul > li:first-child a strong > span, .widget .course_details > ul > li:first-child span.subs,
                             #buddypress ul.item-list li .item-credits strong, #buddypress ul.item-list li .item-credits strong span.amount',
                            'css' => 'color'
                            ),
  'body_font_size'  => array(
                            'element' => 'body,.content,#item-body,#buddypress ul.item-list li div.item-desc,p',
                            'css' => 'font-size'
                            ),
  'body_font_family' => array(
                            'element' => 'body,.content,#item-body,#buddypress ul.item-list li div.item-desc,p',
                            'css' => 'font-family'
                            ),
  'single_light_color'  => array(
                            'element' => '#buddypress div.item-list-tabs,.widget .item-options,#buddypress div.item-list-tabs#object-nav,
                            #buddypress div.item-list-tabs,.quiz_bar',
                            'css' => 'background-color'
                            ),
  'single_dark_color'  => array(
                            'element' => '#buddypress div#item-header,
                            .single-course .course_header,
                            .minimal.single-course.c2 .course_header, 
                            .minimal.single-course.c3 .course_header, 
                            .minimal.single-course.c5 .course_header,
                            .elegant.single-course.c2 .course_header, 
                            .elegant.single-course.c3 .course_header',
                            'css' => 'background-color'
                            ),
  'main_button_color' => array(
                            'element' => '.button.primary,#vibe_bp_login li span,#buddypress li span.unread-count,
                              #buddypress tr.unread span.unread-count,#searchsubmit',
                            'css' => 'background-color'
                            ),
  'footer_bg'  => array(
                            'element' => 'footer,
                                          .bbp-header,
                                          .bbp-footer,
                                          .boxed footer .container,
                                          footer .form_field, 
                                          footer .input-text, 
                                          footer .ninja-forms-field, 
                                          footer .wpcf7 input.wpcf7-text, 
                                          footer #s,
                                          footer .chosen-container.chosen-with-drop .chosen-drop,
                                          footer .chosen-container-active.chosen-with-drop .chosen-single, 
                                          footer .chosen-container-single .chosen-single',
                            'css' => 'background-color'
                            ),
  'footer_color'  => array(
                            'element' => 'footer,footer a,.footerwidget li a,
                            footer .form_field, 
                            footer .input-text, 
                            footer .ninja-forms-field, 
                            footer .wpcf7 input.wpcf7-text, 
                            footer #s,.footerwidget .widget_course_list li h6,.footerwidget .widget_course_list li h6 span,footer .course-list1,
                            footer .chosen-container.chosen-with-drop .chosen-drop,
                            footer .chosen-container-active.chosen-with-drop .chosen-single, 
                            footer .chosen-container-single .chosen-single',
                            'css' => 'color'
                            ),
  'footer_heading_color'  => array(
                            'element' => '.footertitle, footer h4,footer a,.footerwidget ul li a',
                            'css' => 'color'
                            ),

  'footer_bottom_bg'  => array(
                            'element' => '#footerbottom,
                            .boxed #footerbottom .container',
                            'css' => 'background-color'
                            ),
  'footer_bottom_color'  => array(
                            'element' => '#footerbottom,#footerbottom a',
                            'css' => 'color'
                            ),
  'custom_css'  => array(
                            'element' => 'body',
                            'css' => 'custom_css'
                            ),
    
);


foreach($dom_array as $style => $value){
    if(isset($theme_customizer[$style]) && $theme_customizer[$style] !=''){
        switch($value['css']){
            case 'font-size':
                echo $value['element'].'{'.$value['css'].':'.$theme_customizer[$style].'px;}';
                break;
            case 'background-image':
                echo $value['element'].'{'.$value['css'].':url('.$theme_customizer[$style].');}';
                break;
             case 'margin':
             case 'padding':   
             case 'margin-top':
             case 'margin-bottom':
             case 'padding-top':
             case 'padding-bottom':
                echo $value['element'].'{'.$value['css'].':'.$theme_customizer[$style].'px;}';
                break;
            case 'height':
            echo $value['element'].'{'.$value['css'].':'.$theme_customizer[$style].'px;max-height:'.$theme_customizer[$style].'px;
                  }';
            case 'max-height':
                  echo $value['element'].'{max-height:'.$theme_customizer[$style].'px;
                  }';  
            break;
            case 'font-family':
              $font = explode('-',$theme_customizer[$style]);

              echo $value['element'].'{font-family:"'.$font[0].'";}'; 
            break;
            case 'padding-left-right':
                echo $value['element'].'{
                            padding-left:'.$theme_customizer[$style].'px;
                            padding-right:'.$theme_customizer[$style].'px;
                        }';
                break;
            case 'padding-top-bottom':
                echo $value['element'].'{
                            padding-top:'.$theme_customizer[$style].'px;
                            padding-bottom:'.$theme_customizer[$style].'px;
                    }';
                break;  
             case 'primary':
                echo '.button,input[type=button], input[type=submit],
                      .button.hero,.heading_more:before,.vibe_carousel .flex-direction-nav a,
                      .sidebar .widget #searchform input[type="submit"], 
                      #signup_submit, #submit,button,.login_sidebar .login_content #vbp-login-form #sidebar-wp-submit,
                      #buddypress a.button,
                      #buddypress input[type=button],
                      #buddypress input[type=submit],
                      #buddypress input[type=reset],
                      #buddypress ul.button-nav li a,
                      #buddypress .item-list-tabs ul li a:hover,
                      #buddypress div.generic-button a:hover,
                      a.bp-title-button,
                      #buddypress div.item-list-tabs#subnav ul li.current a,
                      #buddypress div.item-list-tabs ul li a span,
                      #buddypress div.item-list-tabs ul li.selected a,
                      #buddypress div.item-list-tabs ul li.current a,
                      #vibe_bp_login #wplogin-modal .btn-default,#vibe_bp_login #wplogin-modal .btn-block,
                      .single #buddypress .item-list-tabs#subnav ul li.selected a, 
                      .single-item #buddypress .item-list-tabs#subnav ul li.selected a,
                      .course_button.button,.unit_button.button,
                      .woocommerce div.product .woocommerce-tabs ul.tabs li.active,.woocommerce #content div.product .woocommerce-tabs ul.tabs li.active,.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active,
                      .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active,
                      .woocommerce a.button,.woocommerce button.button,.woocommerce input.button,.woocommerce #respond input#submit,.woocommerce #content input.button,.woocommerce-page a.button,.woocommerce-page button.button,.woocommerce-page input.button,
                      .woocommerce-page #respond input#submit,.woocommerce-page #content input.button,
                      .woocommerce ul.products li a.added_to_cart,
                      .woocommerce ul.products li a.button,
                      .woocommerce a.button.alt,
                      .woocommerce button.button.alt,
                      .woocommerce input.button.alt,
                      .woocommerce #respond input#submit.alt,
                      .woocommerce #content input.button.alt,
                      .woocommerce-page a.button.alt,
                      .woocommerce-page button.button.alt,
                      .woocommerce-page input.button.alt,
                      .woocommerce-page #respond input#submit.alt,
                      .woocommerce-page #content input.button.alt,
                      .woocommerce .widget_layered_nav_filters ul li a,
                      .woocommerce-page .widget_layered_nav_filters ul li a,
                      .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
                      .woocommerce-page .widget_price_filter .ui-slider .ui-slider-range,
                      .woocommerce div.product .woocommerce-tabs ul.tabs li.active, 
                      .woocommerce div.product .woocommerce-tabs ul.tabs li:hover,
                      .price_slider .ui-slider-range,.ui-slider .ui-slider-handle,
                      .tabs-left > .nav-tabs > li > a:hover, .tabs-left > .nav-tabs > li > a:focus,
                      .page-numbers.current, .pagination .page-numbers.current, .pagination span.current,
                      .block_media .hover-link,.vibe_filterable li a:hover,.vibe_filterable li.active a,
                      #wplms-calendar td.active,.btn.primary,
                      #wplms-calendar td a span,.tagcloud a,
                      .checkoutsteps ul li.checkout_begin,
                      .widget.pricing .course_sharing .socialicons.round li > a:hover,
                      .widget.pricing .course_sharing .socialicons.square li > a:hover,
                      .widget_carousel .flex-direction-nav a, .vibe_carousel .flex-direction-nav a,
                      #question #submit:hover,.ques_link:hover,.reset_answer,
                      .quiz_timeline li:hover > span, .quiz_timeline li.active > span,
                      .course_timeline li.done > span, .course_timeline li:hover > span, .course_timeline li.active > span,
                      .active .quiz_question span,.vbplogin em,
                      #buddypress div.item-list-tabs#subnav ul li.switch_view a.active,
                      #buddypress .activity-list li.load-more a:hover,.note-tabs ul li.selected a, .note-tabs ul li.current a,
                      .data_stats li:hover, .data_stats li.active,.course_students li .progress .bar,
                      .in_quiz .pagination ul li span,.quiz_meta .progress .bar,
                      .page-links span,#vibe_bp_login input[type=submit],
                      .single-course.c2 #item-nav div.item-list-tabs#object-nav li.current a, 
                      .single-course.c3 #item-nav div.item-list-tabs#object-nav li.current a, 
                      .single-course.c5 #item-nav div.item-list-tabs#object-nav li.current a,
                      .minimal .widget .course_cat_nav ul li a:hover span,
                      .minimal .pusher #buddypress a.button:hover,
                      .minimal #buddypress #item-nav .item-list-tabs ul li.current a:after, 
                      .minimal #buddypress #item-nav .item-list-tabs ul li.selected a:after,
                      .vibe_carousel .flex-control-nav li a, .widget_carousel .flex-control-nav li a
                      {
                            background-color:'.$theme_customizer[$style].'; 
                      }
                      .tagcloud a:hover,.instructor_action_buttons li a span,.total_students span,
                      .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover,
                      .unit_content p span.side_comment:hover, .unit_content p span.side_comment.active,
                      .v_module.custom_post_carousel .heading_more,
                      #buddypress .activity-list li.load-more a:hover, .load-more a:hover,.instructor strong span,
                      #buddypress .item-list-tabs ul li a:hover,
                      .archive #buddypress .course_category,
                      .course_front_progressbar .progress .bar,
                      .widget .course_cat_nav ul li.current-cat-parent>a, .widget .course_cat_nav ul li.current-cat>a,
                      .widget .course_cat_nav ul li a span,
                      .woocommerce nav.woocommerce-pagination ul li span.current,
                      .woocommerce nav.woocommerce-pagination ul li a:hover,
                      .widget .price_slider .ui-slider-handle,
                      #bbpress-forums #favorite-toggle a:hover,
                      #bbpress-forums #subscription-toggle a:hover,.pagetitle #subscription-toggle a:hover,
                      #bbpress-forums .bbp-pagination .bbp-pagination-links a.page-numbers:hover, 
                      #bbpress-forums .bbp-pagination .bbp-pagination-links span.current,
                      .mooc .vbpcart span em, .sleek .vbpcart span em,
                      .minimal .pusher h3.heading span:after,
                      .minimal #buddypress div.item-list-tabs ul li.selected a:after,
                      .minimal #buddypress div.item-list-tabs ul li.selected a span,
                      .minimal #buddypress div.item-list-tabs#subnav ul li.switch_view a.active,
                      .minimal .pusher #buddypress input[type=submit]:hover, 
                      .minimal .pusher .button:hover, .minimal .pusher input[type=submit]:hover,
                      .minimal.single-course.c2 #item-nav .item-list-tabs#object-nav ul li.current a:after, 
                      .minimal.single-course.c2 #item-nav .item-list-tabs#object-nav ul li.selected a:after, 
                      .minimal.single-course.c3 #item-nav .item-list-tabs#object-nav ul li.current a:after, 
                      .minimal.single-course.c3 #item-nav .item-list-tabs#object-nav ul li.selected a:after,
                      .minimal.single-course.c2 .course_sub_action.current a:after, 
                      .minimal.single-course.c3 .course_sub_action.current a:after,
                      .single-course.c4.minimal #buddypress .item-list-tabs#object-nav li.current a:after,
                      .minimal.single-course.submissions .course_sub_action.current a:after,
                      .minimal.single-course.c5 #item-nav .item-list-tabs#object-nav ul li.current a:after, 
                      .minimal.single-course.c5 #item-nav .item-list-tabs#object-nav ul li.selected a:after,
                      .minimal .pusher h3.heading span:after, .minimal .pusher h4.widget_title span:after,
                      .minimal.woocommerce-page a.button:hover,.minimal.woocommerce a.button:hover,
                      .minimal.woocommerce ul.products li a.button:hover, 
                      .minimal .pagination a.page-numbers:hover, .minimal .pagination a:hover,
                      .minimal .pagination .page-numbers.current,.minimal .pagination span.current,
                      .minimal.woocommerce-page #content input.button:hover, 
                      .minimal.woocommerce-page input.button:hover,
                      .minimal .pusher .woocommerce a.button:hover,
                      .minimal #buddypress #group-create-tabs.item-list-tabs li.current>a:after,
                      .elegant #buddypress div.item-list-tabs li.selected a:before,
                      .elegant.archive #buddypress div.item-list-tabs li.selected a,
                      .elegant #item-nav div.item-list-tabs#object-nav li.current a:before,
                      .elegant #buddypress .item-list-tabs#subnav ul li.current a:before,
                      .elegant #buddypress #item-nav div.item-list-tabs#object-nav li.current a:before,
                      .elegant #buddypress #members-activity div.item-list-tabs ul li.selected a:before,
                      .elegant.single-course.c4 #buddypress .item-list-tabs#object-nav li.current a:before,
                      .elegant.single #buddypress .item-list-tabs#subnav ul li.selected a:before,
                      .login_page_content .nav.nav-tabs>li.active>a:after
                      {
                        background:'.$theme_customizer[$style].'; 
                      }
                      .link,.instructor_line h3 a:hover,
                      #notes_discussions .actions a:hover, 
                      .course_timeline li.active a, .course_timeline li:hover a,
                      #notes_discussions .actions a.reply_unit_comment.meta_info, 
                      .side_comments ul.actions li a:hover, 
                      .v_module.custom_post_carousel .vibe_carousel.noheading .flex-direction-nav .flex-next, 
                      .v_module.custom_post_carousel .vibe_carousel.noheading .flex-direction-nav .flex-prev,
                      .side_comments a.reply_unit_comment.meta_info,
                      .nav.nav-tabs>li.active>a>span,
                      .widget .item-options a.selected,
                      .footerwidget .item-options a.selected,
                      .course_front_progressbar>span,
                      #buddypress div.generic-button a,
                      .woocommerce div.product .connected_courses li a,
                      .widget .course_cat_nav ul li.current-cat-parent>a>span, 
                      .widget .course_cat_nav ul li.current-cat>a>span,
                      #bbpress-forums #favorite-toggle a,
                      #bbpress-forums #subscription-toggle a,.pagetitle #subscription-toggle a,
                      .minimal.woocommerce ul.products li a.button,.minimal.woocommerce a.button,.minimal #buddypress ul.item-list li .item-credits a.button,.minimal .note-tabs ul li a,
                      .minimal .pagination span,.minimal .pagination label,.minimal .pagination .page-numbers.current,
                      .minimal .pagination span.current,.minimal .pagination a.page-numbers,.minimal .pagination a,
                      .minimal.woocommerce-page a.button,.minimal.woocommerce nav.woocommerce-pagination ul li a,
                      .minimal #bbpress-forums .bbp-pagination .bbp-pagination-links a.page-numbers, 
                      .minimal #bbpress-forums .bbp-pagination .bbp-pagination-links span,
                      .minimal #buddypress div.item-list-tabs ul li a:hover, 
                      .minimal #buddypress div.item-list-tabs ul li.selected a,
                      .minimal #buddypress div.item-list-tabs#subnav ul li.switch_view a.active,
                      .minimal .widget .course_cat_nav ul li a:hover,
                      .minimal .widget .course_cat_nav ul li a span,
                      .minimal .pusher .button,.minimal .pusher #buddypress a.button,
                      .minimal .pusher #buddypress input[type=submit], 
                      .minimal .pusher .button, .minimal .pusher input[type=submit],.minimal .pusher #buddypress input[type=button],
                      .minimal #buddypress #item-nav .item-list-tabs ul li.current a, 
                      .minimal #buddypress #item-nav .item-list-tabs ul li.selected a,
                      .minimal #buddypress div.item-list-tabs#subnav ul li.current a, 
                      .minimal #buddypress div.item-list-tabs#subnav ul li.selected a,
                      .minimal.bp-user.p2 #buddypress div.item-list-tabs#object-nav li a:hover, 
                      .minimal.bp-user.p3 #buddypress div.item-list-tabs#object-nav li a:hover, 
                      .minimal.bp-user.p4 #buddypress div.item-list-tabs#object-nav li a:hover,
                      .minimal.single-course.c2 #item-nav .item-list-tabs#object-nav ul li.current a, 
                      .minimal.single-course.c2 #item-nav .item-list-tabs#object-nav ul li.selected a, 
                      .minimal.single-course.c3 #item-nav .item-list-tabs#object-nav ul li.current a, 
                      .minimal.single-course.c3 #item-nav .item-list-tabs#object-nav ul li.selected a,
                      .minimal.single-course.c2 #item-nav .item-list-tabs#object-nav ul li a:hover, 
                      .minimal.single-course.c3 #item-nav .item-list-tabs#object-nav ul li a:hover,
                      .minimal .mooc .woocart .buttons .button, .minimal .sleek .woocart .buttons .button,
                      .minimal .woocommerce ul.products li.product .button,
                      .minimal .pusher .woocommerce a.button,
                      .elegant #item-nav div.item-list-tabs#object-nav li a:hover,
                      .elegant #item-nav div.item-list-tabs#object-nav li.current a,
                      .elegant #buddypress #item-nav div.item-list-tabs#object-nav li.current a,
                      .elegant #buddypress #item-nav div.item-list-tabs#object-nav li a:hover,
                      .elegant #buddypress #members-activity div.item-list-tabs ul li.selected a,
                      .elegant #buddypress #members-activity div.item-list-tabs ul li a:hover,
                      .elegant.single-course.c3 #item-nav div.item-list-tabs#object-nav li.current a,
                      .elegant.single-course.c4 #buddypress .item-list-tabs#object-nav li.current a,
                      .login_page_content .nav.nav-tabs>li.active>a,
                      .block.postblock .block_content .course_instructor,
                      .elegant.single #buddypress .item-list-tabs#subnav ul li.selected a
                      {
                        color:'.$theme_customizer[$style].'; 
                      }
                      .button,
                      .radio>input[type=radio]:checked+label:before,
                      .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover
                      .tab-pane li:hover img,
                      .checkbox>input[type=checkbox]:checked+label:before,
                      .pagination .page-numbers.current, .pagination span.current,
                      #buddypress div.item-list-tabs ul li.current,
                      #buddypress div.item-list-tabs#subnav ul li.current a,
                      .single #buddypress .item-list-tabs#subnav ul li.selected a, 
                      .single-item #buddypress .item-list-tabs#subnav ul li.selected a,
                      .unit_button.button,
                      #buddypress div#item-header #item-header-avatar,.gallery a:hover,
                      .woocommerce div.product .woocommerce-tabs ul.tabs li.active,
                      .woocommerce a.button,.woocommerce button.button,.woocommerce input.button,.woocommerce #respond input#submit,.woocommerce #content input.button,.woocommerce-page a.button,.woocommerce-page button.button,.woocommerce-page input.button,
                      .woocommerce-page #respond input#submit,.woocommerce-page #content input.button,
                      .woocommerce a.button.alt,
                      .woocommerce button.button.alt,
                      .woocommerce input.button.alt,
                      .woocommerce #respond input#submit.alt,
                      .woocommerce #content input.button.alt,
                      .woocommerce-page a.button.alt,
                      .woocommerce-page button.button.alt,
                      .woocommerce-page input.button.alt,
                      .woocommerce-page #respond input#submit.alt,
                      .woocommerce-page #content input.button.alt,
                      .woocommerce .widget_layered_nav_filters ul li a,
                      .woocommerce-page .widget_layered_nav_filters ul li a,
                      .woocommerce div.product .woocommerce-tabs ul.tabs li.active, 
                      .woocommerce div.product .woocommerce-tabs ul.tabs li:hover,
                      .tabs-left > .nav-tabs > li > a:hover, 
                      .tabs-left > .nav-tabs > li > a:focus,
                      .tabs-left > .nav-tabs .active > a, 
                      .tabs-left > .nav-tabs .active > a:hover, 
                      .tabs-left > .nav-tabs .active > a:focus,
                      .vibe_filterable li a:hover,.vibe_filterable li.active a,
                      #wplms-calendar td.active,
                      .checkoutsteps ul li.checkout_begin,
                      .widget_course_list a:hover img,.widget_course_list a:hover img,
                      .quiz_timeline li.active,.widget_course_list a:hover img,
                      .vcard:hover img,.postsmall .post_thumb a:hover,.button.hero,
                      .unit_content .commentlist li.bypostauthor >.comment-body>.vcard img,
                      .unit_content .commentlist li:hover >.comment-body>.vcard img,
                      #buddypress div.generic-button a,
                      #buddypress div.item-list-tabs#subnav ul li.switch_view a.active,
                      .woocommerce nav.woocommerce-pagination ul li span.current,
                      #bbpress-forums #favorite-toggle a,#bbpress-forums .bbp-pagination .bbp-pagination-links span.current,
                      #bbpress-forums #subscription-toggle a,.pagetitle #subscription-toggle a,
                      .minimal.woocommerce ul.products li a.button,.minimal.woocommerce a.button,.minimal .note-tabs,
                      .minimal .pagination span,.minimal .pagination label,.minimal .pagination .page-numbers.current,
                      .minimal .pagination span.current,.minimal .pagination a.page-numbers,.minimal .pagination a,
                      .minimal.woocommerce-page a.button,.minimal.woocommerce nav.woocommerce-pagination ul li a,
                      .minimal #bbpress-forums .bbp-pagination .bbp-pagination-links a.page-numbers, 
                      .minimal #bbpress-forums .bbp-pagination .bbp-pagination-links span,
                      .minimal #buddypress div.item-list-tabs ul li a:hover, 
                      .minimal .pusher #buddypress a.button,
                      .minimal #buddypress div.item-list-tabs ul li.selected a,
                      .minimal #buddypress div.item-list-tabs ul li a span,
                      .minimal .widget .course_cat_nav ul li a span,
                      .minimal .pusher #buddypress input[type=button],
                      .minimal .pusher #buddypress input[type=submit], 
                      .minimal .pusher .button, .minimal .pusher input[type=submit],
                      .minimal.woocommerce-page #content input.button, 
                      .minimal.woocommerce-page input.button,
                      .minimal .pusher .woocommerce a.button,
                      .minimal.woocommerce div.product .woocommerce-tabs ul.tabs li.active, 
                      .minimal.woocommerce div.product .woocommerce-tabs ul.tabs li:hover,
                      .elegant #buddypress div.item-list-tabs li.selected
                      {
                        border-color:'.$theme_customizer[$style].';
                      }
                      a:hover,
                      .author_desc .social li a:hover,
                      #course_creation_tabs li.active:after,
                      .widget ul > li:hover > a,
                      .course_students li > ul > li > a:hover,
                      .quiz_students li > ul > li > a:hover,
                      #buddypress div.activity-meta a ,
                      #buddypress div.activity-meta a.button,
                      #buddypress .acomment-options a,
                      .widget .menu li.current-menu-item a,
                      #buddypress a.primary,
                      #buddypress a.secondary,
                      .activity-inner a,#latest-update h6 a,
                      .bp-primary-action,.bp-secondary-action,
                      #buddypress div.item-list-tabs ul li.selected a span,
                      #buddypress div.item-list-tabs ul li.current a span,
                      #buddypress div.item-list-tabs ul li a:hover span,
                      .activity-read-more a,.unitattachments h4 span,
                      .unitattachments li a:after,
                      .noreviews a,.expand .minmax:hover,
                      .connected_courses li a,
                      #buddypress #item-body span.highlight a,
                      #buddypress div#message-thread div.message-content a,
                      .course_students li > ul > li > a:hover,
                      .quiz_students li > ul > li > a:hover,
                      .assignment_students li > ul > li > a:hover,.widget ul li:hover > a,
                      .widget ul li.current-cat a,.quiz_timeline li:hover a, .quiz_timeline li.active a,
                      .woocommerce .star-rating span, .woocommerce-page .star-rating span, .product_list_widget .star-rating span,
                      #vibe-tabs-notes_discussion .view_all_notes:hover,
                      .instructor strong a:hover,
                      .minimal .woocommerce nav.woocommerce-pagination ul li a,
                      .single-item.groups.g3.minimal #item-body .item-list-tabs#subnav ul li.current.selected a, 
                      .single-item.groups.g4.minimal #item-body .item-list-tabs#subnav ul li.current.selected a,
                      .bp-user.p3 #item-body .item-list-tabs#subnav ul li.current.selected a,
                      .bp-user.p4 #item-body .item-list-tabs#subnav ul li.current.selected a,
                      .minimal #buddypress div.item-list-tabs ul li a span,
                      .minimal.single-item.groups.g2 #buddypress div.item-list-tabs#object-nav li a:hover, 
                      .minimal.single-item.groups.g3 #buddypress div.item-list-tabs#object-nav li a:hover, 
                      .minimal.single-item.groups.g4 #buddypress div.item-list-tabs#object-nav li a:hover,
                      .minimal.single-course.c5 #item-nav .item-list-tabs#object-nav ul li a:hover,
                      .minimal.single-course.c5 #item-nav .item-list-tabs#object-nav ul li.current a,
                      .minimal.woocommerce-page #content input.button, .minimal.woocommerce button.button,
                      .minimal.woocommerce-page input.button,
                      .elegant #buddypress .dir-form div.item-list-tabs ul li.selected a,
                      .elegant.directory.d3 #buddypress .item-list-tabs ul li a:hover{
                        color:'.$theme_customizer[$style].';
                      }
                      .minimal.woocommerce .button,.minimal.woocommerce button.button,
                      .minimal.directory #buddypress div.item-list-tabs#subnav ul li.switch_view a.active{
                        border-color:'.$theme_customizer[$style].' !important;
                      }
                      .minimal nav li a:hover,.minimal nav li:hover>a, 
                      .minimal nav li.current_menu_item>a,
                      .minimal nav li.current_page_item>a,
                      .minimal.woocommerce div.product .woocommerce-tabs ul.tabs li.active a, 
                      .minimal.woocommerce div.product .woocommerce-tabs ul.tabs li:hover a,
                      .elegant #buddypress .item-list-tabs#subnav ul li.current a,
                      .elegant.single-course #item-nav div.item-list-tabs#object-nav li.current a,
                      .elegant.directory.d3 #buddypress .item-list-tabs li.selected a,
                      .elegant.directory.d4 #buddypress .item-list-tabs li.selected a,
                      .elegant.bp-user.p4 #buddypress .item-list-tabs#subnav li.selected.current a, 
                      .elegant.single-item.groups.g4 #buddypress .item-list-tabs#subnav li.selected.current a {
                        color:'.$theme_customizer[$style].' !important; 
                      }
                    ';
                break;
                case 'custom_css':
                echo $theme_customizer[$style];
                break; 
                default:
                echo $value['element'].'{'.$value['css'].':'.$theme_customizer[$style].';}';
                break;    
        }
      }
    }
        

        if(isset($theme_customizer['header_top_color'])){
          echo '#headertop li{
               border-color: '.$theme_customizer['header_top_color'].';
            }';
        }

        if(isset($theme_customizer['primary_color'])){
          echo '#buddypress div.item-list-tabs ul li a:hover span,
                #buddypress .item-list-tabs ul li.current a span, 
                #buddypress .item-list-tabs ul li.selected a span,
                .widget .course_cat_nav ul li.current-cat-parent>a span, .widget .course_cat_nav ul li.current-cat>a span{
                  background: '.$theme_customizer['primary_color'].';
                }';

          echo '.minimal.woocommerce nav.woocommerce-pagination a:hover{
                  color:'.$theme_customizer['primary_color'].' !important;
                }';
        }

        
        if(isset($theme_customizer['nav_bg'])){
        echo 'header #searchform:after,
              nav>.menu>li:hover>a:before{
               border-color: transparent transparent '.$theme_customizer['nav_bg'].' transparent !important;
            }
            .elegant header nav>.menu>li.current-menu-item>a, 
            .elegant header nav>.menu>li.current_page_item>a, 
            .elegant header nav>.menu>li:hover>a{
              border-color:'.$theme_customizer['nav_bg'].';
              color:'.$theme_customizer['nav_bg'].';
            }
            .groove header nav>.menu>li.current-menu-item>a, 
            .groove header nav>.menu>li.current_page_item>a, .groove header nav>.menu>li:hover>a{
              background:'.$theme_customizer['nav_bg'].';
            }';
        }

        if(isset($theme_customizer['primary_bg'])){
        echo '.unit_content p span.side_comment:hover:after,.unit_content p span.side_comment.active:after{
                  border-color:  '.$theme_customizer['primary_bg'].' transparent transparent '.$theme_customizer['primary_bg'].' !important;;
              }';
        }


        if(isset($theme_customizer['login_light'])){
        echo '#vibe_bp_login:after{ 
                border-color: transparent transparent '.$theme_customizer['login_light'].' transparent;
              }';
        }     

        if(isset($theme_customizer['header_top_color'])){
            echo 'header.fixed #trigger .lines, header.fixed #trigger .lines:after, 
            header.fixed #trigger .lines:before,header.sleek.fixed #trigger .lines, header.sleek.fixed #trigger .lines:after, 
            header.sleek.fixed #trigger .lines:before{background: '.$theme_customizer['header_top_color'].';}';
        }
        if(isset($theme_customizer['header_color'])){
        echo '#trigger .lines, 
              #trigger .lines:before,#trigger .lines:after {
                background:'.$theme_customizer['header_color'].'}
                
               header #searchicon,
               header #searchform input[type="text"]{color:'.$theme_customizer['header_color'].';} ';
        }
        
        if(isset($theme_customizer['single_light_color'])){
        echo '.unit_prevnext{
                border-color:'.$theme_customizer['single_light_color'].' ;}';
        echo '.course_timeline,.quiz_details{
          background:'.$theme_customizer['single_light_color'].';}';   
        }
        if(isset($theme_customizer['single_dark_color'])){
        echo '.unit_prevnext,
        .course_timeline h4{
                background:'.$theme_customizer['single_dark_color'].';}
                .quiz_timeline li > span,.quiz_question span{
                background:'.$theme_customizer['single_dark_color'].';
              }';
        echo '.course_timeline,
        .course_timeline li.unit_line,.course_timeline li > span,
        .quiz_timeline .timeline_wrapper
        {border-color: '.$theme_customizer['single_dark_color'].';}';
        }
         if(isset($theme_customizer['main_button_color'])){
        echo '.button.primary,#vibe_bp_login li span{
                border-color:'.$theme_customizer['main_button_color'].'}';

         echo '#buddypress a.bp-primary-action:hover span,
                #buddypress #reply-title small a:hover span,
         #buddypress div.messages-options-nav a,.unit_module ul.actions li span{
                color:'.$theme_customizer['main_button_color'].'}';
        }

        if(isset($theme_customizer['nav_bg'])){
          echo 'nav .menu-item-has-children:hover > a:before,
          header.sleek .vbpcart.active:after{
            border-color: transparent transparent '.$theme_customizer['nav_bg'].' transparent;
          }';
        }

        if(isset($theme_customizer['login_dark'])){
          echo '#vibe_bp_login:after{
            border-color:transparent transparent '.$theme_customizer['login_dark'].';
          }';
        }
        if(isset($theme_customizer['nav_padding'])){
          echo 'header #trigger{
            top:'.$theme_customizer['nav_padding'].'px !important;
          }
          header.sleek #vibe_bp_login,header.mooc #vibe_bp_login{
            top:'.(30+$theme_customizer['nav_padding']).'px;
          }
          header.mooc #mooc_searchform{
              margin-top:'.$theme_customizer['nav_padding'].'px;
          }';
        }
        if(isset($theme_customizer['footer_bottom_bg'])){
          echo 'footer .form_field, 
                            footer .input-text, 
                            footer .ninja-forms-field, 
                            footer .wpcf7 input.wpcf7-text, 
                            footer #s,
                            footer .chosen-container.chosen-with-drop .chosen-drop,
                            footer .chosen-container-active.chosen-with-drop .chosen-single, 
                            footer .chosen-container-single .chosen-single{border-color: '.$theme_customizer['footer_bottom_bg'].';}';
        }
        do_action('wplms_customizer_custom_css',$theme_customizer); 
    echo '</style>';
}