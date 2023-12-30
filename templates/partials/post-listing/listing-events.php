<?php
$date = get_field('date');
$time = get_field('time');
$venue = get_field('venue');
?>

<div class="event panel">
<div class="row g-0 mb-5">
     <div class="col-xl-6 col-lg-6"> 
        <?php get_template_part( 'templates/partials/featured-image' ); ?>
      </div>
     <div class="col-xl-6 col-lg-6">
        <div class="p-5 text-center">
        <h1><?php the_title(); ?></h1>	
        <h2><?php echo $venue['name']; ?></h2>
        <i class="fa fa-map-marker fa-2xl" aria-hidden="true"></i>
         <h3> <?php echo $venue['address']; ?></h3>
         <h3><?php if($date['start']) : ?>  <i class="fa-solid fa-calendar"></i> <?php endif; ?> <?php echo $date['start']; ?> <?php if($date['finish']) : ?> - <?php echo $date['finish']; ?><?php endif; ?><?php if($time['start']) : ?> | <i class="fa-solid fa-clock"></i> <?php endif; ?> <?php echo $time['start']; ?> <?php if($time['finish']) : ?> - <?php echo $time['finish']; ?><?php endif; ?>  </h3> 
         <div class="d-flex">
              <div class="flex-fill">
         <?php 
$link = get_field('link1', $slide->ID);
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
    <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><button><?php echo esc_html( $link_title ); ?></button></a>
      <?php endif; ?>
</div>
 <div class="flex-fill">
                                        <?php 
$link = get_field('link2', $slide->ID);
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
    <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><button class="secondary"><?php echo esc_html( $link_title ); ?></button></a>
      <?php endif; ?>
</div>
            </div>  
        </div>
          </div>
          </div>
          <div class="col-sm-12">
         <?php the_field('information'); ?>
</div>
</div>