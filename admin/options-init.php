<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "redux_demo";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/sample/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/sample/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_presets_url  = ReduxFramework::$_url . '../sample/presets/';
    $sample_patterns      = array();

    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'redux-framework-demo' ),
        'page_title'           => __( 'Theme Options', 'redux-framework-demo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => true,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */
     // -> START General
     Redux::setSection( $opt_name, array(
         'title' => __( 'General Options', 'redux-framework-demo' ),
         'id'    => 'theme-options',
         'icon'  => 'el el-home',
     ) );

     Redux::setSection( $opt_name, array(
         'title'      => __( 'Brand', 'redux-framework-demo' ),
         'id'         => 'brand',
         'subsection' => true,
         'fields'     => array(
             array(
                 'id'       => 'navbar-logo',
                 'type'     => 'media',
                 'url'      => true,
                 'title'    => __( 'Navbar Logo', 'redux-framework-demo' ),
                 'subtitle' => __( 'Choose logo image', 'redux-framework-demo' ),
                 'compiler' => 'true',
                 //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                 'default'  => array( 'url' => 'http://s.wordpress.org/style/images/codeispoetry.png' ),
             ),
             array(
                 'id'       => 'favicon',
                 'type'     => 'media',
                 'url'      => true,
                 'title'    => __( 'Favicon', 'redux-framework-demo' ),
                 'subtitle' => __( 'Choose favicon .ico file', 'redux-framework-demo' ),
                 'compiler' => 'true',
                 //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
             ),
         )
     ) );

     Redux::setSection( $opt_name, array(
         'title'      => __( 'Colors', 'redux-framework-demo' ),
         'id'         => 'colors',
         'subsection' => true,
         'fields'     => array(
             array(
                 'id'       => 'header-bg-color',
                 'title'    => __( 'Header background', 'redux-framework-demo' ),
                 'type'     => 'color_rgba',
                 'mode'     => 'background',
                 'output'   => array( '.navbar-default:before' ),
             ),
             array(
                 'id'       => 'footer-bg-color',
                 'title'    => __( 'Footer background', 'redux-framework-demo' ),
                 'type'     => 'color_rgba',
                 'mode'     => 'background',
                 'output'   => array( '.content-info:before' ),
             ),
             array(
                 'id'       => 'footer-text-color',
                 'title'    => __( 'Footer text color', 'redux-framework-demo' ),
                 'type'     => 'color_rgba',
                 'mode'     => 'color',
                 'output'   => array( '.content-info', '.content-info a' ),
             ),
         )
     ) );

     Redux::setSection( $opt_name, array(
         'title'      => __( 'Layout', 'redux-framework-demo' ),
         'id'         => 'layout',
         'subsection' => true,
         'fields'     => array(
             array(
                 'id'       => 'navbar-position',
                 'type'     => 'button_set',
                 'title'    => __( 'Navbar Position', 'redux-framework-demo' ),
                 'options'  => array(
                     '1' => 'Static Top',
                     '2' => 'Fixed Top',
                     '3' => 'Fixed Bottom',
                 ),
                 'default'  => '2'
             ),
             array(
                 'id'       => 'header-layout',
                 'type'     => 'button_set',
                 'title'    => __( 'Header Layout', 'redux-framework-demo' ),
                 'options'  => array(
                     '1' => 'Fixed',
                     '2' => 'Fluid',
                 ),
                 'default'  => '1'
             ),
             array(
                 'id'       => 'navbar-logo-text',
                 'type'     => 'switch',
                 'title'    => __( 'Show title/tagline', 'redux-framework-demo' ),
                 'default'  => '0'
             ),
             array(
                 'id'       => 'socials-in-header',
                 'type'     => 'switch',
                 'title'    => __( 'Socials in header', 'redux-framework-demo' ),
                 'subtitle' => __( 'Show socials in header?', 'redux-framework-demo' ),
                 'default'  => '0',
             ),
             array(
                 'id'       => 'show-scrolltop-link',
                 'type'     => 'switch',
                 'title'    => __( 'Back-to-Top Button', 'redux-framework-demo' ),
                 'default'  => '0'
             ),
         )
     ) );


     // -> START Typography
     Redux::setSection( $opt_name, array(
         'title'      => __( 'Typography', 'redux-framework-demo' ),
         'id'         => 'typography',
         'subsection' => true,
         'fields'     => array(
             array(
                 'id'       => 'opt-typography-body',
                 'type'     => 'typography',
                 'title'    => __( 'Body Font', 'redux-framework-demo' ),
                 'subtitle' => __( 'Specify the body font properties.', 'redux-framework-demo' ),
                 'output'      => array( 'body' ),
                 'compiler'    => true,
                 'all_styles'  => false,
                 'text-align'  => false,
                 'subsets'     => false,
                 'units'       => 'px',
             ),
             array(
                 'id'          => 'opt-typography-headings',
                 'type'        => 'typography',
                 'title'       => __( 'Headings Font', 'redux-framework-demo' ),
                 'subtitle'    => __( 'Specify the headings font properties.', 'redux-framework-demo' ),
                 'output'      => array( 'h1,h2,h3,h4,h5,h6' ),
                 'compiler'    => true,
                 'all_styles'  => false,
                 'font-size'   => false,
                 'line-height' => false,
                 'text-align'  => false,
                 'subsets'     => false,
                 'text-transform' => true,
                 'units'       => 'px',
             ),
             array(
                 'id'          => 'opt-typography-menu',
                 'type'        => 'typography',
                 'title'       => __( 'Menu Font', 'redux-framework-demo' ),
                 'subtitle'    => __( 'Specify the menu font properties.', 'redux-framework-demo' ),
                 'output'      => array( '.navbar-default .navbar-nav >li >a, .dropdown-menu > li > a' ),
                 'compiler'    => true,
                 'all_styles'  => false,
                 'text-align'  => false,
                 'subsets'     => false,
                 'text-transform' => true,
                 'units'       => 'px',
             ),
             array(
                 'id'          => 'opt-typography-slide-title',
                 'type'        => 'typography',
                 'title'       => __( 'Slide Title Font', 'redux-framework-demo' ),
                 'subtitle'    => __( 'Specify the slide title font properties.', 'redux-framework-demo' ),
                 'output'      => array( '.slide-title' ),
                 'compiler'    => true,
                 'all_styles'  => false,
                 'text-align'  => false,
                 'subsets'     => false,
                 'text-transform' => true,
                 'units'       => 'px',
             ),
             array(
                 'id'          => 'opt-typography-slide-caption',
                 'type'        => 'typography',
                 'title'       => __( 'Slide Caption Font', 'redux-framework-demo' ),
                 'subtitle'    => __( 'Specify the slide caption font properties.', 'redux-framework-demo' ),
                 'output'      => array( '.slide-caption' ),
                 'compiler'    => true,
                 'all_styles'  => false,
                 'subsets'     => false,
                 'text-align'  => false,
                 'text-transform' => true,
                 'units'       => 'px',
             ),
         )
     ));

     Redux::setSection( $opt_name, array(
         'title'      => __( 'Social Networks', 'redux-framework-demo' ),
         'id'         => 'social-networks',
         'subsection' => true,
         'fields'     => array(
             array(
                 'id'       => 'socials',
                 'type'     => 'sortable',
                 'title'    => __( 'Social icons', 'redux-framework-demo' ),
                 'label'    => true,
                 'options'  => array(
                    '500px'         => '',
                    '8tracks'       => '',
                    'Airbnb'        => '',
                    'Amazon'        => '',
                    'Android'       => '',
                    'Angellist'     => '',
                    'Apple'         => '',
                    'Appnet'        => '',
                    'Baidu'         => '',
                    'Bebo'          => '',
                    'Behance'       => '',
                    'Blogger'       => '',
                    'Buffer'        => '',
                    'Coderwall'     => '',
                    'Dailymotion'   => '',
                    'Delicious'     => '',
                    'Deviantart'    => '',
                    'Digg'          => '',
                    'Disqus'        => '',
                    'Douban'        => '',
                    'Dribbble'      => '',
                    'Drupal'        => '',
                    'Ello'          => '',
                    'Envato'        => '',
                    'Facebook'      => '',
                    'Feedburner'    => '',
                    'Flattr'        => '',
                    'Flickr'        => '',
                    'Forrst'        => '',
                    'Foursquare'    => '',
                    'Friendfeed'    => '',
                    'Github'        => '',
                    'Goodreads'     => '',
                    'Google'        => '',
                    'Grooveshark'   => '',
                    'Houzz'         => '',
                    'Icq'           => '',
                    'Identica'      => '',
                    'Instagram'     => '',
                    'Istock'        => '',
                    'Lanyrd'        => '',
                    'Lastfm'        => '',
                    'Linkedin'      => '',
                    'Mail'          => '',
                    'Meetup'        => '',
                    'Mixcloud'      => '',
                    'Modelmayhem'   => '',
                    'Myspace'       => '',
                    'Newsvine'      => '',
                    'Odnoklassniki' => '',
                    'Outlook'       => '',
                    'Patreon'       => '',
                    'Paypal'        => '',
                    'Periscope'     => '',
                    'Persona'       => '',
                    'Pinterest'     => '',
                    'Play'          => '',
                    'Playstation'   => '',
                    'Pocket'        => '',
                    'Qq'            => '',
                    'Ravelry'       => '',
                    'Reddit'        => '',
                    'Renren'        => '',
                    'Rss'           => '',
                    'Skype'         => '',
                    'Slideshare'    => '',
                    'Smugmug'       => '',
                    'Snapchat'      => '',
                    'Soundcloud'    => '',
                    'Spotify'       => '',
                    'Stackoverflow' => '',
                    'Steam'         => '',
                    'Storehouse'    => '',
                    'Stumbleupon'   => '',
                    'Swarm'         => '',
                    'Technorati'    => '',
                    'Tripadvisor'   => '',
                    'Tripit'        => '',
                    'Triplej'       => '',
                    'Tumblr'        => '',
                    'Twitch'        => '',
                    'Twitter'       => '',
                    'Viadeo'        => '',
                    'Vimeo'         => '',
                    'Vine'          => '',
                    'Vkontakte'     => '',
                    'Weibo'         => '',
                    'Whatsapp'      => '',
                    'Wikipedia'     => '',
                    'Windows'       => '',
                    'Wordpress'     => '',
                    'Xbox'          => '',
                    'Xing'          => '',
                    'Yahoo'         => '',
                    'Yammer'        => '',
                    'Yelp'          => '',
                    'Youtube'       => '',
                    'Zerply'        => '',
                    'Zynga'         => '',
                 )
             ),
         )
     ) );

     Redux::setSection( $opt_name, array(
         'title'      => __( 'Code Insertion', 'redux-framework-demo' ),
         'id'         => 'code',
         'subsection' => true,
         'fields'     => array(
             array(
                 'id'         => 'google-analytics-id',
                 'type'       => 'text',
                 'title'      => __( 'Google Analytics ID', 'redux-framework-demo' ),
                 'default'    => ""
             ),
             array(
                 'id'         => 'custom-html-editor',
                 'type'       => 'ace_editor',
                 'title'      => __( 'Custom HTML Code', 'redux-framework-demo' ),
                 'mode'       => 'html',
                 'theme'      => 'chrome',
                 'default'    => ''
             ),
             array(
                 'id'       => 'custom-css-editor',
                 'type'     => 'ace_editor',
                 'title'    => __( 'Custom CSS Code', 'redux-framework-demo' ),
                 'mode'     => 'css',
                 'theme'    => 'chrome',
                 'default'  => ""
             ),
             array(
                 'id'       => 'custom-js-editor',
                 'type'     => 'ace_editor',
                 'title'    => __( 'Custom JS Code', 'redux-framework-demo' ),
                 'mode'     => 'javascript',
                 'theme'    => 'chrome',
                 'default'  => ""
             ),
         )
     ) );


    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'redux-framework-demo' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'redux-framework-demo' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }
