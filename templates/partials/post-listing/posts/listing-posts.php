    <div class="col-xl-4 col-lg-4">
    <div class="post panel">  
        <div class="listing-image">
            	  <?php get_template_part( 'templates/partials/featured-image' ); ?>
            </div>
            <div class="listing-text">
            <h3><?php the_title() ?></h3> 
               			         <?php
if(in_category(6)){
?>
<span class="sponsored">This is Sponsored content</span>
<?php } ?>                  
                     <p><?php echo wpse_custom_excerpts(30); ?></p>
                      <a href="<?php echo the_permalink(); ?>"><button>Read more</button></a>
                    </div>
                </div>
                    </div>