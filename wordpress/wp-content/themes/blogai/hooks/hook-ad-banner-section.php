<?php
//Banner Advertisment
if (!function_exists('blogia_banner_advertisement')):
    /**
     *
     * @since blogus 1.0.0
     *
     */
    function blogia_banner_advertisement(){
        if (('' != blogus_get_option('banner_advertisement_image')) ) { ?>
            <?php $blogus_center_logo_title = get_theme_mod('blogus_center_logo_title',false);
            if($blogus_center_logo_title == false) { ?>
            <div class="col-md-8">
            <?php } ?>
                <?php if (('' != blogus_get_option('banner_advertisement_image'))):

                    $banner_advertisement_image = blogus_get_option('banner_advertisement_image');
                    $banner_advertisement_image = absint($banner_advertisement_image);
                    $banner_advertisement_image = wp_get_attachment_image($banner_advertisement_image, 'full');
                    $banner_advertisement_url = blogus_get_option('banner_advertisement_url');
                    $banner_advertisement_url = isset($banner_advertisement_url) ? esc_url($banner_advertisement_url) : '#';
                    $blogai_open_on_new_tab = get_theme_mod('blogai_open_on_new_tab',true);
                    ?>
                    <div class="header-ads">
                        <a class="pull-right" <?php echo esc_url($banner_advertisement_url); ?> href="<?php echo $banner_advertisement_url; ?>"
                            <?php if($blogai_open_on_new_tab) { ?>target="_blank" <?php } ?> >
                            <?php echo $banner_advertisement_image; ?>
                        </a>
                    </div>
                <?php endif; ?>                
            </div>
            <!-- Trending line END -->
            <?php
        }
    }
endif;

add_action('blogia_action_banner_advertisement', 'blogia_banner_advertisement', 10);