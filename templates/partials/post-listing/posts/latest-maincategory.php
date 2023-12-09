    <div class="post panel"> 
       <div class="row">
         <div class="col-lg-6"> 
        <div class="listing-image">
            	<?php the_post_thumbnail(); ?>
            </div>
        </div>
         <div class="col-lg-6 d-flex flex-column"> 
            <div class="listing-text my-auto">
              <p> <?php foreach((get_the_category()) as $category) {
                echo '<a href="' . esc_url( get_category_link( $category ) ) . '"><span>' . $category->cat_name . '</span></a>';
                } ?>
                 </p>  
            <h3><?php the_title() ?></h3>                  
                     <p><?php echo wpse_custom_excerpts(30); ?></p>
                      <a href="<?php echo the_permalink(); ?>"><button>Read more</button></a>
                    </div>
                </div>
                    </div>
              </div>