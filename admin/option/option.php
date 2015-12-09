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
                                    'label' => __('Body background', 'vp_textdomain'),
                                    'format' => 'rgba',
                                    'default' => '',
                                ),
                                array(
                                    'type' => 'color',
                                    'name' => 'body_text_color',
                                    'label' => __('Body text color', 'vp_textdomain'),
                                    'format' => 'rgb',
                                    'default' => '',
                                ),
                            ),
                        ),
                        array(
                            'type' => 'section',
                            'title' => __('Logo', 'vp_textdomain'),
                            'description' => __('Logo color settings', 'vp_textdomain'),
                            'fields' => array(
                                array(
                                    'type' => 'color',
                                    'name' => 'logo_bg_color',
                                    'label' => __('Logo background', 'vp_textdomain'),
                                    'format' => 'rgba',
                                    'default' => '',
                                ),
                                array(
                                    'type' => 'color',
                                    'name' => 'logo_text_color',
                                    'label' => __('Logo text color', 'vp_textdomain'),
                                    'format' => 'rgb',
                                    'default' => '',
                                ),
                            ),
                        ),
                        array(
                            'type' => 'section',
                            'title' => __('Header', 'vp_textdomain'),
                            'description' => __('Header color settings', 'vp_textdomain'),
                            'fields' => array(
                                array(
                                    'type' => 'color',
                                    'name' => 'header_bg_color',
                                    'label' => __('Header background', 'vp_textdomain'),
                                    'format' => 'rgba',
                                    'default' => '',
                                ),
                                array(
                                    'type' => 'color',
                                    'name' => 'header_text_color',
                                    'label' => __('Header text color', 'vp_textdomain'),
                                    'format' => 'rgb',
                                    'default' => '',
                                ),
                            ),
                        ),
                        array(
                            'type' => 'section',
                            'title' => __('Footer', 'vp_textdomain'),
                            'description' => __('Footer color settings', 'vp_textdomain'),
                            'fields' => array(
                                array(
                                    'type' => 'color',
                                    'name' => 'footer_bg_color',
                                    'label' => __('Footer background', 'vp_textdomain'),
                                    'format' => 'rgba',
                                    'default' => '',
                                ),
                                array(
                                    'type' => 'color',
                                    'name' => 'footer_text_color',
                                    'label' => __('Footer text color', 'vp_textdomain'),
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
                                    'name' => 'navbar_container',
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
                                    'name' => 'navbar_layout',
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
                                    'name' => 'title_tagline_show',
                                    'label' => __('Title/Tagline', 'vp_textdomain'),
                                    'description' => __('Display title/tagline beside logo', 'vp_textdomain'),
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
                            'title' => __('Headings font', 'vp_textdomain'),
                            'fields' => array(
                                array(
                                    'type' => 'html',
                                    'name' => 'headings_font_preview',
                                    'binding' => array(
                                        'field'    => 'headings_font_face,headings_font_style,headings_font_weight,headings_h1_font_size,headings_line_height',
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
                                    'name'    => 'headings_h1_font_size',
                                    'label'   => __('H1 Font Size (px)', 'vp_textdomain'),
                                    'min'     => '10',
                                    'max'     => '50',
                                    'default' => '36',
                                ),
                                array(
                                    'type'    => 'slider',
                                    'name'    => 'headings_h2_font_size',
                                    'label'   => __('H2 Font Size (px)', 'vp_textdomain'),
                                    'min'     => '10',
                                    'max'     => '50',
                                    'default' => '32',
                                ),
                                array(
                                    'type'    => 'slider',
                                    'name'    => 'headings_h3_font_size',
                                    'label'   => __('H3 Font Size (px)', 'vp_textdomain'),
                                    'min'     => '10',
                                    'max'     => '50',
                                    'default' => '28',
                                ),
                                array(
                                    'type'    => 'slider',
                                    'name'    => 'headings_h4_font_size',
                                    'label'   => __('H4 Font Size (px)', 'vp_textdomain'),
                                    'min'     => '10',
                                    'max'     => '50',
                                    'default' => '24',
                                ),
                                array(
                                    'type'    => 'slider',
                                    'name'    => 'headings_h5_font_size',
                                    'label'   => __('H5 Font Size (px)', 'vp_textdomain'),
                                    'min'     => '10',
                                    'max'     => '50',
                                    'default' => '20',
                                ),
                                array(
                                    'type'    => 'slider',
                                    'name'    => 'headings_h6_font_size',
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
                                    'description' => __('Write your custom css here.', 'vp_textdomain'),
                                    'mode' => 'css',
                                ),
                                array(
                                    'type' => 'codeeditor',
                                    'name' => 'editor_js',
                                    'label' => __('Custom JS', 'vp_textdomain'),
                                    'description' => __('Write your custom javascript here.', 'vp_textdomain'),
                                    'mode' => 'javascript',
                                ),
                                array(
                                    'type' => 'codeeditor',
                                    'name' => 'editor_html',
                                    'label' => __('Custom HTML', 'vp_textdomain'),
                                    'description' => __('Write your custom html here.', 'vp_textdomain'),
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
