<?php
    printf('<p class="entry-meta">%s | %s | %s</p>',
        sprintf('%s: <time class="updated" datetime="%s">%s</time>',
            __('Posted on', 'sage'),
            get_the_time('c'),
            get_the_date()
        ),
        sprintf('%s: %s',
            __('Category', 'sage'),
            get_the_category_list( ',' )
        ),
        sprintf('%s: %s',
            __('Comments', 'sage'),
            get_comments_number( '0', '1', '%' )
        )
    )
?>
