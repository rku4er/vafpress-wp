<?php

return array(
    'title' => __('Theme Options', 'vp_textdomain'),
    'logo' => get_stylesheet_directory_uri() . '/dist/images/theme-options-logo.png',
    'menus' => array(
        array(
            'title' => __('General Settings', 'vp_textdomain'),
            'name' => 'menu_general',
            'icon' => 'font-awesome:fa-cogs',
            'menus' => array(
                array(
                    'title' => __('Content', 'vp_textdomain'),
                    'name' => 'submenu_content',
                    'icon' => 'font-awesome:fa-picture-o',
                    'controls' => array(
                        array(
                            'type' => 'section',
                            'title' => __('Brand', 'vp_textdomain'),
                            'description' => __('Branding settings', 'vp_textdomain'),
                            'fields' => array(
                                array(
                                    'type' => 'upload',
                                    'name' => 'logo',
                                    'label' => __('Logo', 'vp_textdomain'),
                                    'default' => '',
                                ),
                                array(
                                    'type' => 'upload',
                                    'name' => 'favicon',
                                    'label' => __('Favicon', 'vp_textdomain'),
                                    'default' => '',
                                ),
                            ),
                        ),
                        array(
                            'type' => 'section',
                            'title' => __('Copyright', 'vp_textdomain'),
                            'description' => __('Copyright text', 'vp_textdomain'),
                            'fields' => array(
                                array(
                                    'type' => 'wpeditor',
                                    'name' => 'copyright',
                                    'label' => __('Copyright text', 'vp_textdomain'),
                                    'use_external_plugins' => '1',
                                    'disabled_externals_plugins' => '',
                                    'disabled_internals_plugins' => '',
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'title' => __('Colors', 'vp_textdomain'),
                    'name' => 'submenu_colors',
                    'icon' => 'font-awesome:fa-paint-brush',
                    'controls' => array(
                        array(
                            'type' => 'section',
                            'title' => __('Body', 'vp_textdomain'),
                            'description' => __('Body color settings', 'vp_textdomain'),
                            'fields' => array(
                                array(
                                    'type' => 'color',
                                    'name' => 'body_bg_color',
                                    'label' => __('Background color', 'vp_textdomain'),
                                    'format' => 'rgb',
                                    'default' => '',
                                ),
                                array(
                                    'type' => 'color',
                                    'name' => 'body_text_color',
                                    'label' => __('Text color', 'vp_textdomain'),
                                    'format' => 'rgb',
                                    'default' => '',
                                ),
                                array(
                                    'type' => 'color',
                                    'name' => 'body_link_color',
                                    'label' => __('Link color', 'vp_textdomain'),
                                    'format' => 'rgb',
                                    'default' => '',
                                ),
                                array(
                                    'type' => 'color',
                                    'name' => 'body_link_hover_color',
                                    'label' => __('Hover color', 'vp_textdomain'),
                                    'format' => 'rgb',
                                    'default' => '',
                                ),
                            ),
                        ),
                        array(
                            'type' => 'section',
                            'title' => __('Navbar', 'vp_textdomain'),
                            'description' => __('Navbar color settings', 'vp_textdomain'),
                            'fields' => array(
                                array(
                                    'type' => 'color',
                                    'name' => 'navbar_bg_color',
                                    'label' => __('Background color', 'vp_textdomain'),
                                    'format' => 'rgba',
                                    'default' => '',
                                ),
                                array(
                                    'type' => 'color',
                                    'name' => 'logo_color',
                                    'label' => __('Logo color', 'vp_textdomain'),
                                    'format' => 'rgb',
                                    'default' => '',
                                ),
                                array(
                                    'type' => 'color',
                                    'name' => 'logo_hover_color',
                                    'label' => __('Logo hover color', 'vp_textdomain'),
                                    'format' => 'rgb',
                                    'default' => '',
                                ),
                                array(
                                    'type' => 'color',
                                    'name' => 'menu_link_color',
                                    'label' => __('Menu link color', 'vp_textdomain'),
                                    'format' => 'rgb',
                                    'default' => '',
                                ),
                                array(
                                    'type' => 'color',
                                    'name' => 'menu_link_hover_color',
                                    'label' => __('Menu link hover color', 'vp_textdomain'),
                                    'format' => 'rgb',
                                    'default' => '',
                                ),
                                array(
                                    'type' => 'color',
                                    'name' => 'dropdown_link_bg_color',
                                    'label' => __('Dropdown link background color', 'vp_textdomain'),
                                    'format' => 'rgba',
                                    'default' => '',
                                ),
                                array(
                                    'type' => 'color',
                                    'name' => 'dropdown_link_color',
                                    'label' => __('Dropdown link color', 'vp_textdomain'),
                                    'format' => 'rgb',
                                    'default' => '',
                                ),
                                array(
                                    'type' => 'color',
                                    'name' => 'dropdown_link_hover_bg_color',
                                    'label' => __('Dropdown link hover background color', 'vp_textdomain'),
                                    'format' => 'rgba',
                                    'default' => '',
                                ),
                                array(
                                    'type' => 'color',
                                    'name' => 'dropdown_link_hover_color',
                                    'label' => __('Dropdown link hover color', 'vp_textdomain'),
                                    'format' => 'rgb',
                                    'default' => '',
                                ),
                            ),
                        ),
                        array(
                            'type' => 'section',
                            'title' => __('Content info', 'vp_textdomain'),
                            'description' => __('Content info color settings', 'vp_textdomain'),
                            'fields' => array(
                                array(
                                    'type' => 'color',
                                    'name' => 'content_info_bg_color',
                                    'label' => __('Background color', 'vp_textdomain'),
                                    'format' => 'rgba',
                                    'default' => '',
                                ),
                                array(
                                    'type' => 'color',
                                    'name' => 'content_info_text_color',
                                    'label' => __('Text color', 'vp_textdomain'),
                                    'format' => 'rgb',
                                    'default' => '',
                                ),
                                array(
                                    'type' => 'color',
                                    'name' => 'content_info_headings_color',
                                    'label' => __('Headings color', 'vp_textdomain'),
                                    'format' => 'rgb',
                                    'default' => '',
                                ),
                                array(
                                    'type' => 'color',
                                    'name' => 'content_info_link_color',
                                    'label' => __('Link color', 'vp_textdomain'),
                                    'format' => 'rgb',
                                    'default' => '',
                                ),
                                array(
                                    'type' => 'color',
                                    'name' => 'content_info_link_hover_color',
                                    'label' => __('Link hover color', 'vp_textdomain'),
                                    'format' => 'rgb',
                                    'default' => '',
                                ),
                            ),
                        ),
                        array(
                            'type' => 'section',
                            'title' => __('Headings', 'vp_textdomain'),
                            'description' => __('Headings color settings', 'vp_textdomain'),
                            'fields' => array(
                                array(
                                    'type' => 'color',
                                    'name' => 'h1_color',
                                    'label' => __('H1 color', 'vp_textdomain'),
                                    'format' => 'rgb',
                                    'default' => '',
                                ),
                                array(
                                    'type' => 'color',
                                    'name' => 'h2_color',
                                    'label' => __('H2 color', 'vp_textdomain'),
                                    'format' => 'rgb',
                                    'default' => '',
                                ),
                                array(
                                    'type' => 'color',
                                    'name' => 'h3_color',
                                    'label' => __('H3 color', 'vp_textdomain'),
                                    'format' => 'rgb',
                                    'default' => '',
                                ),
                                array(
                                    'type' => 'color',
                                    'name' => 'h4_color',
                                    'label' => __('H4 color', 'vp_textdomain'),
                                    'format' => 'rgb',
                                    'default' => '',
                                ),
                                array(
                                    'type' => 'color',
                                    'name' => 'h5_color',
                                    'label' => __('H5 color', 'vp_textdomain'),
                                    'format' => 'rgb',
                                    'default' => '',
                                ),
                                array(
                                    'type' => 'color',
                                    'name' => 'h6_color',
                                    'label' => __('H6 color', 'vp_textdomain'),
                                    'format' => 'rgb',
                                    'default' => '',
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'title' => __('Layout', 'vp_textdomain'),
                    'name' => 'submenu_layout',
                    'description' => __('Layout settings', 'vp_textdomain'),
                    'icon' => 'font-awesome:fa-columns',
                    'controls' => array(
                        array(
                            'type' => 'section',
                            'title' => __('Navbar', 'vp_textdomain'),
                            'fields' => array(
                                array(
                                    'type' => 'radiobutton',
                                    'name' => 'navbar_position',
                                    'label' => __('Position', 'vp_textdomain'),
                                    'items' => array(
                                        array(
                                            'value' => 'static-top',
                                            'label' => __('static top', 'vp_textdomain'),
                                        ),
                                        array(
                                            'value' => 'fixed-top',
                                            'label' => __('fixed top', 'vp_textdomain'),
                                        ),
                                        array(
                                            'value' => 'fixed-bottom',
                                            'label' => __('fixed bottom', 'vp_textdomain'),
                                        ),
                                    ),
                                    'default' => array(
                                        'fixed-top',
                                    ),
                                ),
                                array(
                                    'type' => 'radiobutton',
                                    'name' => 'navbar_container',
                                    'label' => __('Container', 'vp_textdomain'),
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
                        array(
                            'type' => 'section',
                            'title' => __('Elements', 'vp_textdomain'),
                            'fields' => array(
                                array(
                                    'type' => 'toggle',
                                    'name' => 'title_show',
                                    'label' => __('Title', 'vp_textdomain'),
                                    'description' => __('Display title beside logo', 'vp_textdomain'),
                                    'default' => '0',
                                ),
                                array(
                                    'type' => 'toggle',
                                    'name' => 'tagline_show',
                                    'label' => __('Tagline', 'vp_textdomain'),
                                    'description' => __('Display tagline beside logo', 'vp_textdomain'),
                                    'default' => '0',
                                ),
                                array(
                                    'type' => 'toggle',
                                    'name' => 'socials_show',
                                    'label' => __('Socials', 'vp_textdomain'),
                                    'description' => __('Display socials within navbar', 'vp_textdomain'),
                                    'default' => '0',
                                ),
                                array(
                                    'type' => 'toggle',
                                    'name' => 'backtop_show',
                                    'label' => __('Back-to-Top', 'vp_textdomain'),
                                    'description' => __('Display back-to-top button', 'vp_textdomain'),
                                    'default' => '0',
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'title' => __('Typography', 'vp_textdomain'),
                    'name' => 'submenu_typography',
                    'description' => __('Typography settings', 'vp_textdomain'),
                    'icon' => 'font-awesome:fa-font',
                    'controls' => array(
                        array(
                            'type' => 'section',
                            'title' => __('Body font', 'vp_textdomain'),
                            'fields' => array(
                                array(
                                    'type' => 'html',
                                    'name' => 'body_font_preview',
                                    'binding' => array(
                                        'field'    => 'body_font_face,body_font_style,body_font_weight,body_font_size, body_line_height',
                                        'function' => 'vp_font_preview',
                                    ),
                                ),
                                array(
                                    'type' => 'select',
                                    'name' => 'body_font_face',
                                    'label' => __('Font Face', 'vp_textdomain'),
                                    'items' => array(
                                        'data' => array(
                                            array(
                                                'source' => 'function',
                                                'value' => 'vp_get_gwf_family',
                                            ),
                                        ),
                                    ),
                                    'default' => '{{first}}'
                                ),
                                array(
                                    'type' => 'radiobutton',
                                    'name' => 'body_font_style',
                                    'label' => __('Font Style', 'vp_textdomain'),
                                    'items' => array(
                                        'data' => array(
                                            array(
                                                'source' => 'binding',
                                                'field' => 'body_font_face',
                                                'value' => 'vp_get_gwf_style',
                                            ),
                                        ),
                                    ),
                                    'default' => array(
                                        '{{first}}',
                                    ),
                                ),
                                array(
                                    'type' => 'radiobutton',
                                    'name' => 'body_font_weight',
                                    'label' => __('Font Weight', 'vp_textdomain'),
                                    'items' => array(
                                        'data' => array(
                                            array(
                                                'source' => 'binding',
                                                'field' => 'body_font_face',
                                                'value' => 'vp_get_gwf_weight',
                                            ),
                                        ),
                                    ),
                                    'default' => array(
                                        '{{first}}',
                                    ),
                                ),
                                array(
                                    'type' => 'multiselect',
                                    'name' => 'body_font_subset',
                                    'label' => __('Font Subset', 'vp_textdomain'),
                                    'items' => array(
                                        'data' => array(
                                            array(
                                                'source' => 'binding',
                                                'field' => 'body_font_face',
                                                'value' => 'vp_get_gwf_subset',
                                            ),
                                        ),
                                    ),
                                    'default' => 'latin'
                                ),
                                array(
                                    'type'    => 'slider',
                                    'name'    => 'body_font_size',
                                    'label'   => __('Font Size (px)', 'vp_textdomain'),
                                    'min'     => '5',
                                    'max'     => '32',
                                    'default' => '16',
                                ),
                                array(
                                    'type'    => 'slider',
                                    'name'    => 'body_line_height',
                                    'label'   => __('Line Height (em)', 'vp_textdomain'),
                                    'min'     => '0',
                                    'max'     => '3',
                                    'default' => '1.5',
                                    'step'    => '0.1',
                                ),
                            ),
                        ),
                        array(
                            'type' => 'section',
                            'title' => __('Logo font', 'vp_textdomain'),
                            'fields' => array(
                                array(
                                    'type' => 'html',
                                    'name' => 'logo_font_preview',
                                    'binding' => array(
                                        'field'    => 'logo_font_face,logo_font_style,logo_font_weight,logo_font_size, logo_line_height',
                                        'function' => 'vp_font_preview',
                                    ),
                                ),
                                array(
                                    'type' => 'select',
                                    'name' => 'logo_font_face',
                                    'label' => __('Font Face', 'vp_textdomain'),
                                    'items' => array(
                                        'data' => array(
                                            array(
                                                'source' => 'function',
                                                'value' => 'vp_get_gwf_family',
                                            ),
                                        ),
                                    ),
                                    'default' => '{{first}}'
                                ),
                                array(
                                    'type' => 'radiobutton',
                                    'name' => 'logo_font_style',
                                    'label' => __('Font Style', 'vp_textdomain'),
                                    'items' => array(
                                        'data' => array(
                                            array(
                                                'source' => 'binding',
                                                'field' => 'logo_font_face',
                                                'value' => 'vp_get_gwf_style',
                                            ),
                                        ),
                                    ),
                                    'default' => array(
                                        '{{first}}',
                                    ),
                                ),
                                array(
                                    'type' => 'radiobutton',
                                    'name' => 'logo_font_weight',
                                    'label' => __('Font Weight', 'vp_textdomain'),
                                    'items' => array(
                                        'data' => array(
                                            array(
                                                'source' => 'binding',
                                                'field' => 'logo_font_face',
                                                'value' => 'vp_get_gwf_weight',
                                            ),
                                        ),
                                    ),
                                    'default' => array(
                                        '{{first}}',
                                    ),
                                ),
                                array(
                                    'type' => 'multiselect',
                                    'name' => 'logo_font_subset',
                                    'label' => __('Font Subset', 'vp_textdomain'),
                                    'items' => array(
                                        'data' => array(
                                            array(
                                                'source' => 'binding',
                                                'field' => 'logo_font_face',
                                                'value' => 'vp_get_gwf_subset',
                                            ),
                                        ),
                                    ),
                                    'default' => 'latin'
                                ),
                                array(
                                    'type'    => 'slider',
                                    'name'    => 'logo_font_size',
                                    'label'   => __('Font Size (px)', 'vp_textdomain'),
                                    'min'     => '5',
                                    'max'     => '32',
                                    'default' => '16',
                                ),
                                array(
                                    'type'    => 'slider',
                                    'name'    => 'logo_line_height',
                                    'label'   => __('Line Height (em)', 'vp_textdomain'),
                                    'min'     => '0',
                                    'max'     => '3',
                                    'default' => '1.5',
                                    'step'    => '0.1',
                                ),
                            ),
                        ),
                        array(
                            'type' => 'section',
                            'title' => __('Menu font', 'vp_textdomain'),
                            'fields' => array(
                                array(
                                    'type' => 'html',
                                    'name' => 'menu_font_preview',
                                    'binding' => array(
                                        'field'    => 'menu_font_face,menu_font_style,menu_font_weight,menu_font_size, menu_line_height',
                                        'function' => 'vp_font_preview',
                                    ),
                                ),
                                array(
                                    'type' => 'select',
                                    'name' => 'menu_font_face',
                                    'label' => __('Font Face', 'vp_textdomain'),
                                    'items' => array(
                                        'data' => array(
                                            array(
                                                'source' => 'function',
                                                'value' => 'vp_get_gwf_family',
                                            ),
                                        ),
                                    ),
                                    'default' => '{{first}}'
                                ),
                                array(
                                    'type' => 'radiobutton',
                                    'name' => 'menu_font_style',
                                    'label' => __('Font Style', 'vp_textdomain'),
                                    'items' => array(
                                        'data' => array(
                                            array(
                                                'source' => 'binding',
                                                'field' => 'menu_font_face',
                                                'value' => 'vp_get_gwf_style',
                                            ),
                                        ),
                                    ),
                                    'default' => array(
                                        '{{first}}',
                                    ),
                                ),
                                array(
                                    'type' => 'radiobutton',
                                    'name' => 'menu_font_weight',
                                    'label' => __('Font Weight', 'vp_textdomain'),
                                    'items' => array(
                                        'data' => array(
                                            array(
                                                'source' => 'binding',
                                                'field' => 'menu_font_face',
                                                'value' => 'vp_get_gwf_weight',
                                            ),
                                        ),
                                    ),
                                    'default' => array(
                                        '{{first}}',
                                    ),
                                ),
                                array(
                                    'type' => 'multiselect',
                                    'name' => 'menu_font_subset',
                                    'label' => __('Font Subset', 'vp_textdomain'),
                                    'items' => array(
                                        'data' => array(
                                            array(
                                                'source' => 'binding',
                                                'field' => 'menu_font_face',
                                                'value' => 'vp_get_gwf_subset',
                                            ),
                                        ),
                                    ),
                                    'default' => 'latin'
                                ),
                                array(
                                    'type'    => 'slider',
                                    'name'    => 'menu_font_size',
                                    'label'   => __('Font Size (px)', 'vp_textdomain'),
                                    'min'     => '5',
                                    'max'     => '32',
                                    'default' => '16',
                                ),
                                array(
                                    'type'    => 'slider',
                                    'name'    => 'menu_line_height',
                                    'label'   => __('Line Height (em)', 'vp_textdomain'),
                                    'min'     => '0',
                                    'max'     => '3',
                                    'default' => '1.5',
                                    'step'    => '0.1',
                                ),
                            ),
                        ),
                        array(
                            'type' => 'section',
                            'title' => __('Dropdown font', 'vp_textdomain'),
                            'fields' => array(
                                array(
                                    'type' => 'html',
                                    'name' => 'dropdown_font_preview',
                                    'binding' => array(
                                        'field'    => 'dropdown_font_face,dropdown_font_style,dropdown_font_weight,dropdown_font_size, dropdown_line_height',
                                        'function' => 'vp_font_preview',
                                    ),
                                ),
                                array(
                                    'type' => 'select',
                                    'name' => 'dropdown_font_face',
                                    'label' => __('Font Face', 'vp_textdomain'),
                                    'items' => array(
                                        'data' => array(
                                            array(
                                                'source' => 'function',
                                                'value' => 'vp_get_gwf_family',
                                            ),
                                        ),
                                    ),
                                    'default' => '{{first}}'
                                ),
                                array(
                                    'type' => 'radiobutton',
                                    'name' => 'dropdown_font_style',
                                    'label' => __('Font Style', 'vp_textdomain'),
                                    'items' => array(
                                        'data' => array(
                                            array(
                                                'source' => 'binding',
                                                'field' => 'dropdown_font_face',
                                                'value' => 'vp_get_gwf_style',
                                            ),
                                        ),
                                    ),
                                    'default' => array(
                                        '{{first}}',
                                    ),
                                ),
                                array(
                                    'type' => 'radiobutton',
                                    'name' => 'dropdown_font_weight',
                                    'label' => __('Font Weight', 'vp_textdomain'),
                                    'items' => array(
                                        'data' => array(
                                            array(
                                                'source' => 'binding',
                                                'field' => 'dropdown_font_face',
                                                'value' => 'vp_get_gwf_weight',
                                            ),
                                        ),
                                    ),
                                    'default' => array(
                                        '{{first}}',
                                    ),
                                ),
                                array(
                                    'type' => 'multiselect',
                                    'name' => 'dropdown_font_subset',
                                    'label' => __('Font Subset', 'vp_textdomain'),
                                    'items' => array(
                                        'data' => array(
                                            array(
                                                'source' => 'binding',
                                                'field' => 'dropdown_font_face',
                                                'value' => 'vp_get_gwf_subset',
                                            ),
                                        ),
                                    ),
                                    'default' => 'latin'
                                ),
                                array(
                                    'type'    => 'slider',
                                    'name'    => 'dropdown_font_size',
                                    'label'   => __('Font Size (px)', 'vp_textdomain'),
                                    'min'     => '5',
                                    'max'     => '32',
                                    'default' => '16',
                                ),
                                array(
                                    'type'    => 'slider',
                                    'name'    => 'dropdown_line_height',
                                    'label'   => __('Line Height (em)', 'vp_textdomain'),
                                    'min'     => '0',
                                    'max'     => '3',
                                    'default' => '1.5',
                                    'step'    => '0.1',
                                ),
                            ),
                        ),
                        array(
                            'type' => 'section',
                            'title' => __('Headings font', 'vp_textdomain'),
                            'fields' => array(
                                array(
                                    'type' => 'html',
                                    'name' => 'headings_font_preview',
                                    'binding' => array(
                                        'field'    => 'headings_font_face,headings_font_style,headings_font_weight,h1_font_size,headings_line_height',
                                        'function' => 'vp_font_preview',
                                    ),
                                ),
                                array(
                                    'type' => 'select',
                                    'name' => 'headings_font_face',
                                    'label' => __('Font Face', 'vp_textdomain'),
                                    'items' => array(
                                        'data' => array(
                                            array(
                                                'source' => 'function',
                                                'value' => 'vp_get_gwf_family',
                                            ),
                                        ),
                                    ),
                                    'default' => '{{first}}'
                                ),
                                array(
                                    'type' => 'radiobutton',
                                    'name' => 'headings_font_style',
                                    'label' => __('Font Style', 'vp_textdomain'),
                                    'items' => array(
                                        'data' => array(
                                            array(
                                                'source' => 'binding',
                                                'field' => 'headings_font_face',
                                                'value' => 'vp_get_gwf_style',
                                            ),
                                        ),
                                    ),
                                    'default' => array(
                                        '{{first}}',
                                    ),
                                ),
                                array(
                                    'type' => 'radiobutton',
                                    'name' => 'headings_font_weight',
                                    'label' => __('Font Weight', 'vp_textdomain'),
                                    'items' => array(
                                        'data' => array(
                                            array(
                                                'source' => 'binding',
                                                'field' => 'headings_font_face',
                                                'value' => 'vp_get_gwf_weight',
                                            ),
                                        ),
                                    ),
                                    'default' => array(
                                        '{{first}}',
                                    ),
                                ),
                                array(
                                    'type' => 'multiselect',
                                    'name' => 'headings_font_subset',
                                    'label' => __('Font Subset', 'vp_textdomain'),
                                    'items' => array(
                                        'data' => array(
                                            array(
                                                'source' => 'binding',
                                                'field' => 'headings_font_face',
                                                'value' => 'vp_get_gwf_subset',
                                            ),
                                        ),
                                    ),
                                    'default' => 'latin'
                                ),
                                array(
                                    'type'    => 'slider',
                                    'name'    => 'headings_line_height',
                                    'label'   => __('Line Height (em)', 'vp_textdomain'),
                                    'min'     => '0',
                                    'max'     => '3',
                                    'default' => '1.5',
                                    'step'    => '0.1',
                                ),
                                array(
                                    'type'    => 'slider',
                                    'name'    => 'h1_font_size',
                                    'label'   => __('H1 Font Size (px)', 'vp_textdomain'),
                                    'min'     => '10',
                                    'max'     => '50',
                                    'default' => '36',
                                ),
                                array(
                                    'type'    => 'slider',
                                    'name'    => 'h2_font_size',
                                    'label'   => __('H2 Font Size (px)', 'vp_textdomain'),
                                    'min'     => '10',
                                    'max'     => '50',
                                    'default' => '32',
                                ),
                                array(
                                    'type'    => 'slider',
                                    'name'    => 'h3_font_size',
                                    'label'   => __('H3 Font Size (px)', 'vp_textdomain'),
                                    'min'     => '10',
                                    'max'     => '50',
                                    'default' => '28',
                                ),
                                array(
                                    'type'    => 'slider',
                                    'name'    => 'h4_font_size',
                                    'label'   => __('H4 Font Size (px)', 'vp_textdomain'),
                                    'min'     => '10',
                                    'max'     => '50',
                                    'default' => '24',
                                ),
                                array(
                                    'type'    => 'slider',
                                    'name'    => 'h5_font_size',
                                    'label'   => __('H5 Font Size (px)', 'vp_textdomain'),
                                    'min'     => '10',
                                    'max'     => '50',
                                    'default' => '20',
                                ),
                                array(
                                    'type'    => 'slider',
                                    'name'    => 'h6_font_size',
                                    'label'   => __('H6 Font Size (px)', 'vp_textdomain'),
                                    'min'     => '10',
                                    'max'     => '50',
                                    'default' => '16',
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'title' => __('Socials', 'vp_textdomain'),
                    'name' => 'submenu_socials',
                    'description' => __('Social media settings', 'vp_textdomain'),
                    'icon' => 'font-awesome:fa-share-alt',
                    'controls' => array(
                        array(
                            'type' => 'section',
                            'title' => __('Socials', 'vp_textdomain'),
                            'fields' => array(
                                array(
                                    'type' => 'sorter',
                                    'name' => 'socials_sorter',
                                    'max_selection' => 3,
                                    'label' => __('Sorter', 'vp_textdomain'),
                                    'description' => __('Select and sort your socials', 'vp_textdomain'),
                                    'items' => array(
                                        'data' => array(
                                            array(
                                                'source' => 'function',
                                                'value' => 'vp_get_social_medias',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'title' => __('Code', 'vp_textdomain'),
                    'name' => 'submenu_code',
                    'description' => __('Typography settings', 'vp_textdomain'),
                    'icon' => 'font-awesome:fa-code',
                    'controls' => array(
                        array(
                            'type' => 'section',
                            'title' => __('Google Analytics', 'vp_textdomain'),
                            'fields' => array(
                                array(
                                    'type' => 'textbox',
                                    'name' => 'ga_id',
                                    'label' => __('Google Analytics ID', 'vp_textdomain'),
                                    'default' => '',
                                ),
                            ),
                        ),
                        array(
                            'type' => 'section',
                            'title' => __('Editor', 'vp_textdomain'),
                            'fields' => array(
                                array(
                                    'type' => 'codeeditor',
                                    'name' => 'editor_css',
                                    'label' => __('Custom CSS', 'vp_textdomain'),
                                    'description' => __('Styles will be placed in header after the main stylesheet', 'vp_textdomain'),
                                    'mode' => 'css',
                                ),
                                array(
                                    'type' => 'codeeditor',
                                    'name' => 'editor_js',
                                    'label' => __('Custom JS', 'vp_textdomain'),
                                    'description' => __('Scripts will be placed at the very bottom of the page', 'vp_textdomain'),
                                    'mode' => 'javascript',
                                ),
                                array(
                                    'type' => 'codeeditor',
                                    'name' => 'editor_html',
                                    'label' => __('Custom HTML', 'vp_textdomain'),
                                    'description' => __('Custom HTML will be added right after the &lt;body&gt; tag opens', 'vp_textdomain'),
                                    'mode' => 'html',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);

/**
 *EOF
 */
