<?php

return array(

    'Layout' => array(
        'elements' => array(

            'row' => array(
                'title'   => __('Row', 'sage'),
                'code'    => '[row][/row]',
            ),

            'column' => array(
                'title'   => __('Column', 'sage'),
                'code'    => '[column][/column]',
                'attributes' => array(
                    array(
                        'name'    => 'sm',
                        'type'    => 'slider',
                        'label'   => __('Grid size', 'sage'),
                        'min'     => 1,
                        'max'     => 12,
                        'default' => 12,
                    ),
                    array(
                        'name'    => 'offset_sm',
                        'type'    => 'slider',
                        'label'   => __('Offset', 'sage'),
                        'min'     => 0,
                        'max'     => 11,
                        'default' => 0,
                    ),
                ),
            ),

            'spacer' => array(
                'title'   => __('Inner Spacer', 'sage'),
                'code'    => '[spacer]',
                'attributes' => array(
                    array(
                        'name'    => 'size',
                        'type'    => 'slider',
                        'label'   => __('Size', 'sage'),
                        'default' => 0,
                        'min'     => 0,
                        'max'     => 500,
                    ),
                ),
            ),
        ),
    ),

);

/**
 * EOF
 */
