    <div class="col-lg-4">
    <div class="post listing-panel">  
        <div class="listing-image">
            	<?php the_post_thumbnail(); ?>
            </div>
            <div class="listing-text">
            <?php if( in_category( 'sponsored-content' ) ): ?>
              <span> Sponsored Content</span> 
              <h3><?php the_title() ?></h3> 
                      <?php else: ?>
            <h3><?php the_title() ?></h3> 
            <?php endif; ?>                   
                     <p><?php the_excerpt() ?></p>
                      <a href="<?php echo the_permalink(); ?>"><button>Read more</button></a>
                    </div>
                </div>
                    </div>