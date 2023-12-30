<?php
if (!function_exists('blogai_front_page_banner_section')) :
    /**
     *
     * @since Blogus
     *
     */
    function blogai_front_page_banner_section()
    {
        if (is_front_page() || is_home()) {
        $blogus_enable_main_slider = blogus_get_option('show_main_news_section');
        $select_vertical_slider_news_category = blogus_get_option('select_vertical_slider_news_category');
        $all_posts_vertical = blogus_get_posts($select_vertical_slider_news_category);
        if ($blogus_enable_main_slider): ?>
         <div class="col-12">
            <div class="express-widget mb-0"> 
                <div class="row">
                    <div class="col-md-6 cc">
                    <div class="homemain bs swiper-container">
                        <div class="swiper-wrapper">
                           <?php blogus_get_block('list', 'banner'); ?>         
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row"> 
                            <?php blogai_get_block('listthumb', 'banner'); ?>
                        </div> 
                    </div>
                </div>
            </div> 
        </div>
        <!--==/ Home Slider ==-->
        <?php endif; ?>
        <!-- end slider-section -->
        <?php }
    }
endif;
add_action('blogai_action_front_page_main_section_1', 'blogai_front_page_banner_section', 40);


?>
