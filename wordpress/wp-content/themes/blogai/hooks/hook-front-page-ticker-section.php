<?php
if (!function_exists('blogai_front_page_ticker_section')) :
    /**
     *
     * @since Blogus
     *
     */
    function blogai_front_page_ticker_section()
    {
       
            
            $enable_ticker = get_theme_mod('enable_news_ticker',1);
            $ticker_title = get_theme_mod('news_ticker_title','Trending');
            $ticker_category = get_theme_mod('news_ticker_category');
            if($enable_ticker == 1) {
            ?>
                 
            <div class="bs-news-ticker">
                <div class="container">    
		        <div class="bs-latest-news"> 
                    <div class="bs-latest-title">
                        <h4 class="bs-latest-heading">
                            <i class="fas fa-bolt"></i>
                            <span><?php echo esc_html($ticker_title); ?></span>
                        </h4> 
                    </div>
                    <div class="bs-latest-news-inner">
                        <div class="bs-latest-news-slider">
                            <?php
                            $number_of_posts = '5';
                            $blogus_all_posts_main = blogus_get_posts($number_of_posts, $ticker_category);
                            if ($blogus_all_posts_main->have_posts()) :
                                while ($blogus_all_posts_main->have_posts()) : $blogus_all_posts_main->the_post();
                                global $post;
                                $blogus_url = blogus_get_freatured_image_url($post->ID, 'blogus-slider-full');?>
  
                            <a class="bs-latest-list bs-blog-ticker-title" href=<?php the_permalink(); ?> title="<?php the_title(); ?>">
								<img decoding="async" src="<?php echo esc_url($blogus_url); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" class="bs-latest-img bs-blog-ticker-image">
                                <span><?php the_title(); ?></span>
                            </a>
                            <?php
                                endwhile;
                                endif;
                                wp_reset_postdata();
                            ?>	
                        </div>
                    </div>

                    <div class="bs-latest-play ">
                        <span><i class="fas fa-pause"></i></span>
                    </div>  
                </div>
                </div>
            </div>
        <?php } }
    
endif;
add_action('blogai_action_front_page_ticker_section', 'blogai_front_page_ticker_section', 40);