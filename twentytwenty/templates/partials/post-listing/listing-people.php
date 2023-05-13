    <div class="col-lg-4">
      <div class="listing-panel">
        <div class="listing-image">
            <?php the_post_thumbnail(); ?>
        </div>
               <div class="listing-text">
                					<div class="social-media text-center">
		   		<?php if ( get_field('linkedin') ) : ?>
                <a href="https://www.linkedin.com/in/<?php print get_field('linkedin') ?>" target="_blank"><i class="fa fa-linkedin-square fa-2xl"></i></a>
                <?php endif; ?>
				<?php if ( get_field('twitter') ) : ?>
                <a href="https://www.twitter.com/<?php print get_field('twitter') ?>" target="_blank"><i class="fa fa-twitter-square fa-2xl"></i></a>
                <?php endif; ?>
				<?php if ( get_field('facebook') ) : ?>
                <a href="https://<?php print get_field('facebook') ?>" target="_blank"><i class="fa fa-facebook-square fa-2xl"></i></a>
                <?php endif; ?>
				<?php if ( get_field('pinterest') ) : ?>
                <a href="https://<?php print get_field('pinterest') ?>" target="_blank"><i class="fa fa-pinterest-square fa-2xl"></i></a>
                <?php endif; ?>
				<?php if ( get_field('youtube') ) : ?>
                <a href="https://<?php print get_field('youtube') ?>" target="_blank"><i class="fa fa-youtube-square fa-2xl"></i></a>
                <?php endif; ?>
		   </div>
            <h3><?php the_title() ?></h3>
            <?php if ( get_field('job_title') ) : ?>
            <p class="text-center"> <i class="fa fa-briefcase fa-xl" aria-hidden="true"></i> <?php print get_field('job_title') ?> </p>
             <?php endif; ?>
              <p><?php the_excerpt() ?></p>
              <a href="<?php echo the_permalink(); ?>"><button>Read Profile</button></a>
                </div>
  </div>
       </div>