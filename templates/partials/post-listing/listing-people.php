    <div class="col-lg-4">
      <div class="listing-panel">
        <div class="listing-image">
            <?php the_post_thumbnail(); ?>
        </div>
               <div class="listing-text text-center">
            <div class="social-media">
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
            <h2><?php the_title() ?></h2>
            <?php if ( get_field('job_title') ) : ?>
            <p> <i class="fa fa-briefcase fa-xl" aria-hidden="true"></i> <?php print get_field('job_title') ?> </p>
             <?php endif; ?>
              <?php if ( get_field('profile') ) : ?>
            <p> <?php
                $trim_length = 150;
                $custom_field = 'profile';
                $value = get_post_meta($post->ID, $custom_field, true);
                if ($value) {
                if (strlen($value) > $trim_length)
                $value = rtrim(substr($value,0,$trim_length)) .'...';
                print $value;
                }?></p>
             <?php endif; ?>
              <a href="<?php echo the_permalink(); ?>"><button>Read Profile</button></a>
                </div>
  </div>
       </div>