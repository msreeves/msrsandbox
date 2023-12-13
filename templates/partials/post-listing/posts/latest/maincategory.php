              <div class="post panel"> 
       <div class="row">
         <div class="col-lg-6"> 
        <div class="listing-image">
            	<?php the_post_thumbnail(); ?>
            </div>
        </div>
         <div class="col-lg-6 d-flex flex-column"> 
            <div class="listing-text my-auto">
                   <p>
              <?php
$cat_list = array();
 $categories = get_the_category();
foreach( $categories as $category ) {
    if( 0 != $category->parent ) {
        echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) .
            '"><span>' . $category->name . '</span></a>';
    }
}

echo implode( ' ', $cat_list ); ?>
                 </p>  
            <h3><?php the_title() ?></h3>                  
                     <p><?php echo wpse_custom_excerpts(30); ?></p>
                      <a href="<?php echo the_permalink(); ?>"><button>Read more</button></a>
                    </div>
                </div>
                    </div>
              </div>