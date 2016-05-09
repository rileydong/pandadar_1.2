<?php
/**
 * Template Name: Blog
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header(vibe_get_header());
$page_id = get_the_ID();
?>
<section id="title">
	<div class="<?php echo vibe_get_container(); ?>">
		<div class="row">
            <div class="col-md-12">
                <div class="pagetitle">
                    <?php vibe_breadcrumbs(); ?>
                    <h1><?php the_title(); ?></h1>
                    <?php the_sub_title(); ?>
                </div>
            </div>
        </div>
	</div>
</section>
<section id="content">
	<div class="<?php echo vibe_get_container(); ?>">
        <div class="row">
		<div class="col-md-9 col-sm-8">
			<div class="content">
				<?php
                    
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
                    
                    query_posts(array('post_type'=>'post','per_page'=>5,'paged' => $paged));
                    
                    if ( have_posts() ) : while ( have_posts() ) : the_post();

                    $categories = get_the_category();
                    $cats='<ul>';
                    if($categories){
                        foreach($categories as $category) {
                            $cats .= '<li><a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ,"vibe" ), $category->name ) ) . '">'.$category->cat_name.'</a></li>';
                        }
                    }
                    $cats .='</ul>';
                        
                       echo ' <div class="blogpost">
                            <div class="meta">
                               <div class="date">
                                <p class="day"><span>'.sprintf('%02d', get_the_time('j')).'</span></p>
                                <p class="month">'.get_the_time('M').'\''.get_the_time('y').'</p>
                               </div>
                            </div>
                            '.(has_post_thumbnail(get_the_ID())?'
                            <div class="featured">
                                <a href="'.get_permalink().'">'.get_the_post_thumbnail(get_the_ID(),'medium').'</a>
                            </div>':'').'
                            <div class="excerpt '.(has_post_thumbnail(get_the_ID())?'thumb':'').'">
                                <h3><a href="'.get_permalink().'">'.get_the_title().'</a></h3>
                                <div class="cats">
                                    '.$cats.'
                                    <p>| 
                                    <a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author_meta( 'display_name' ).'</a>
                                    </p>
                                </div>
                                <p>'.get_the_excerpt().'</p>
                                <a href="'.get_permalink().'" class="link">'.__('Read More','vibe').'</a>
                            </div>
                        </div>';

                        
                    endwhile;
                    endif;
                    wp_reset_postdata();
                    pagination();
                ?>
			</div>
		</div>
		<div class="col-md-3 col-sm-4">
			<div class="sidebar">
                <?php
                    $sidebar = apply_filters('wplms_sidebar','mainsidebar',$page_id);
                    if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar($sidebar) ) : ?>
                <?php endif; ?>
			</div>
		</div>
        </div>
	</div>
</section>
<?php
get_footer(vibe_get_footer());
?>