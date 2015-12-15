<?php

return array(
    'id'          => 'page_options',
    'types'       => array('page'),
    'title'       => __('Page Options', 'vp_textdomain'),
    'priority'    => 'high',
    'template'    => array(
        array(
            'type' => 'toggle',
            'name' => 'show_title',
            'label' => __('Show title', 'vp_textdomain'),
        ),
        array(
            'type'      => 'group',
            'repeating' => false,
            'length'    => 1,
            'name'      => 'title_options',
            'title'     => __('Title Options', 'vp_textdomain'),
            'dependency' => array(
                'field'    => 'show_title',
                'function' => 'vp_dep_boolean',
            ),
            'fields'    => array(
                array(
                    'type' => 'radiobutton',
                    'name' => 'title_layout',
                    'label' => __('Layout', 'vp_textdomain'),
                    'items' => array(
                        array(
                            'value' => 'fixed',
                            'label' => __('fixed', 'vp_textdomain'),
                        ),
                        array(
                            'value' => 'fluid',
                            'label' => __('fluid', 'vp_textdomain'),
                        ),
                    ),
                    'default' => array(
                        'fixed',
                    ),
                ),
            ),
        ),
    ),
);

/**
 * EOF
 */
