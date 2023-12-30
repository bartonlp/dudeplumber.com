<?php
/**
 * The template for displaying the content.
 * @package Blogus
 */
?>
<div class="row">
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php while(have_posts()){ the_post(); ?>
    <!--col-md-12-->
    <div class="col-md-12 fadeInDown wow" data-wow-delay="0.1s">
        <!-- bs-posts-sec-inner -->
        
        <div class="bs-blog-post list-blog">
                    <?php  
                    $url = blogus_get_freatured_image_url($post->ID, 'blogus-medium');
                    blogus_post_image_display_type($post); 
                    ?>
            <article class="small col text-xs">
              <?php 
                    $blogus_global_category_enable = get_theme_mod('blogus_global_category_enable','true');
                    if($blogus_global_category_enable == 'true') { ?>
                        <?php blogus_post_categories(); ?>
                    <?php } ?>
                    <h4 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                    <?php blogus_post_meta(); ?>
                    <?php blogus_posted_content(); wp_link_pages( ); 
                    $blogus_readmore_excerpt=get_theme_mod('blogus_blog_content','excerpt');
                    ?>
            </article>
          </div>
    <!-- // bs-posts-sec block_6 -->
    </div>
    <?php }
        blogus_page_pagination(); ?>
</div>
</div>