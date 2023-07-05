
                    <div id="Carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">

                        <!-- Carousel items -->
                        <div class="carousel-inner">
                            <?php $slider = get_posts(array('post_type' => 'banner', 'posts_per_page' => -1)); ?>
                            <?php $count = 0; ?>
                            <?php foreach ($slider as $slide) : ?>
                                <?php setup_postdata($slide->ID); ?>
                                <div class="carousel-item <?php echo ($count == 0) ? 'active' : ''; ?>">
                                   <div class="row g-0">
                                    <div class="col-md-6"> 
                                         <div class="featured-media-inner">
                                               <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $slide->ID ), 'single-post-thumbnail' ); ?>
                                                <img src="<?php echo $image[0]; ?>" alt=""> 
                                            </div>
    </div>
				   <div class="col-md-6">
            <?php $banner_colours = get_field('banner_colour_picker', $slide->ID); ?>
                     <div class="panel" style="background: <?php echo esc_html( $banner_colours['panel_colour']); ?>">
                    <div class="my-auto">
        			    <h2 style="color: <?php echo esc_html( $banner_colours['title_colour'] ); ?>"><?php echo get_the_title($slide->ID); ?></h2>			  	                                             
                     <p style="color: <?php echo esc_html( $banner_colours['content_colour'] ); ?>"><?php print get_field('body_text', $slide->ID) ?></p>
                     <?php $banner_button = get_field('banner_button', $slide->ID); ?>
                     <a href="<?php echo esc_html( $banner_button['button_link'] ); ?>" target="_blank"><button style="background:<?php echo esc_html( $banner_button['button_background_colour'] ); ?>; color: <?php echo esc_html( $banner_button['button_label_colour'] ); ?>"><?php echo esc_html( $banner_button['button_label'] ); ?></button></a>
                        </div>
                    </div>
                </div>
                        </div>

                                </div>
                                <?php $count++; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>