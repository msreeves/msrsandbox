<div class="post panel"> 
       <div class="row">
         <div class="col-lg-6"> 
        <div class="listing-image">
    <?php
if(in_category(6)){
?>
<span class="sponsored">This is sponsored content</span>
<?php } ?> 
            	<?php the_post_thumbnail(); ?>
            </div>
        </div>
         <div class="col-lg-6 d-flex flex-column"> 
            <div class="listing-text my-auto">
                <p> <?php $exclude = array( 9 );

// The categories list.
$cat_list = array();

foreach ( get_the_category() as $cat ) {
    if ( ! in_array( $cat->term_id, $exclude ) ) {
        $cat_list[] = '<a href="' . esc_url( get_category_link( $cat->term_id ) ) .
            '"><span>' . $cat->name . '</span></a>';
    }
}

// Display a simple comma-separated list of links.
echo implode( ' ', $cat_list );?>
                 </p> 
                 </p>  
            <h3><?php the_title() ?></h3>                  
                     <p><?php echo wpse_custom_excerpts(30); ?></p>
                      <a href="<?php echo the_permalink(); ?>"><button>Read more</button></a>
                    </div>
                </div>
                    </div>
              </div>