<?php
    $options = vp_option('vpt_option');
    $logo_image = $options['logo'] ? '<img src="' . esc_url($options['logo']) . '" alt="' . get_bloginfo('name') . '">' : '';
    $navbar_brand = sprintf('<a class="%s" href="%s">%s%s</a>',
        esc_attr('navbar-brand withoutripple'),
        esc_url(home_url('/')),
        $logo_image,
        ($options['title_show'] || $options['tagline_show']) ? sprintf(
            '<span class="text">%s%s</span>',
            '<span class="name">'.get_bloginfo('name').'</span>',
            '<span class="tagline">'.get_bloginfo('description') . '</span>'
        ) : ''
    );

    $navbar_class = 'navbar-'. $options['navbar_position'];

    if($options['navbar_container'] === 'fixed'){
        $container_class = 'container';
    }else if($options['navbar_container'] === 'fluid'){
        $container_class = 'container-fluid';
    }

    $socials = $options['socials_show'] ? do_shortcode('[socials]') : '';
?>

<header class="banner navbar navbar-default <?php echo $navbar_class; ?>" role="banner">
    <div class="<?php echo $container_class; ?>">
        <div class="navbar-header">

          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only"><?php echo __('Toggle navigation', 'sage'); ?></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php echo $navbar_brand; ?>

        </div>

        <nav class="collapse navbar-collapse" role="navigation">
          <?php if (has_nav_menu('primary_navigation')) wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav']);  ?>
          <?php echo $socials; ?>
        </nav>

    </div>
</header>
