<?php
    //$use_pb = vp_metabox('page_builder.use_pb');
?>
<?php the_content(); ?>
<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
