<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <script src="https://kit.fontawesome.com/2c48647809.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
		  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
		   <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
		   <link href="https://fonts.googleapis.com/css2?family=DM+Sans&family=Italiana&display=swap" rel="stylesheet">
		  <script type="text/javascript">
    		var wp_ajax = "<?php echo admin_url('admin-ajax.php'); ?>";
			</script>   
    <title>MSR Sandbox</title>
        <?php wp_head ();?>
</head>
<body>
    
	<header id="masthead" class="site-header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light p-4">
        <div class="container-fluid">
                <?php
			the_custom_logo(); ?>
             <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon-bar top-bar"></span>
          <span class="icon-bar middle-bar"></span>
          <span class="icon-bar bottom-bar"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav ms-auto">
                    <?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
                </div>
            </div>
        </div>
    </nav>
	</header>

    
