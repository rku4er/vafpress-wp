/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {

        // Debounced resize
        function debounce(func, wait, immediate) {
          var timeout;
          return function() {
            var context = this, args = arguments;
            var later = function() {
              timeout = null;
              if (!immediate){
                func.apply(context, args);
              }
            };
            if (immediate && !timeout){
              func.apply(context, args);
            }
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
          };
        }

        function custom_inputs(parent) {

            // File input replacement
            $(parent).find("input[type=file]").fileinput({
                uploadExtraData: {kvId: '10'},
            });

            // Material choices
            $(parent).find('.checkbox input[type=checkbox]').after("<span class=checkbox-material><span class=check></span></span>");
            $(parent).find('.radio input[type=radio]').after("<span class=radio-material><span class=circle></span><span class=check></span></span>");
            $(parent).find('.togglebutton input[type=checkbox]').after("<span class=toggle></span>");
            $(parent).find('select.form-control').dropdownjs();

            // Gravity Forms render tweak
            $(parent).find('.gfield_checkbox > li').addClass('checkbox');
            $(parent).find('.gfield_radio > li').addClass('radio');
            $(parent).find('select.gfield_select').addClass('form-control');
        }


        // apply material inputs on ajax forms
        $(document).bind('gform_post_render', function(event, form_id, cur_page){
            var form = $('#gform_' + form_id);
            custom_inputs(form);
        });

        // Set .wrap padding-top equal to navbar height
        var wrapper = function(){
          return {
            spaceTop: function(){
                $('.navbar-fixed-top').each(function(){
                    var $self = $(this);
                    $('.wrap').css('padding-top', $self.height());
                });
            }
          };
        };

        // Set .navbar margin-top equal to #wpadminbar height
        var navbar = function(){
          return {
            spaceTop: function(){
                $('.navbar-fixed-top').each(function(){
                    var $self = $(this);
                    var adminbar = $('#wpadminbar');
                    if(adminbar.length){
                      $self.css('margin-top', adminbar.height());
                    }
                });
            },
            getHeight: function(){
                [].forEach.call(document.querySelectorAll('.banner'), function(object){
                  return object.clientHeight;
                });
            }
          };
        };

        // Set slider min-height equal to screen height
        var slider = function(){
          return {
            setHeight: function(){
                [].forEach.call(document.querySelectorAll('.carousel-fullscreen .item'), function(object){
                    var navbarHeight;
                    [].forEach.call(document.querySelectorAll('.banner'), function(object){
                        navbarHeight = object.clientHeight;
                    });
                    object.style.height = window.innerHeight - navbarHeight + 'px';
                });
            }
          };
        };

        // wait until users finishes resizing the browser
        var debouncedResize = debounce(function() {
            wrapper().spaceTop();
            navbar().spaceTop();
            slider().setHeight();

            //align dropdown menus according to free space
            $('.dropdown').each(function(){
                var $self = $(this),
                    $dm = $self.find('>.dropdown-menu');

                if($dm.length){
                    if(($self.offset().left + $self.width() + $dm.width()) < $(window).width()){
                        $self.removeClass('dropdown-rtl');
                    } else{
                        $self.addClass('dropdown-rtl');
                    }
                }
            });

            $('.wrap').css('padding-bottom', $('.content-info').height());
            $('.content-info').css('margin-top', -$('.content-info').height());

        }, 100);


        //window load callback
        $(window).load(function(){
            // needed by preloaded
            $('body').addClass('loaded');

            // when the window resizes, redraw the grid
            $(window).resize(debouncedResize).trigger('resize');

            //Init carousel
            $('.carousel-inline').each(function() {
                var $myCarousel = $(this),
                    $firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animated = 'true']"),
                    animEndEv = 'webkitAnimationEnd animationend';

                //Animate captions in first slide on page load
                $firstAnimatingElems.each(function() {
                    var $this = $(this),
                        $animationType = $this.data('animation');
                    $this.addClass('animated ' + $animationType).one(animEndEv, function() {
                        $this.removeClass($animationType);
                    });
                });

                //Other slides to be animated on carousel slide event
                $myCarousel.on('slide.bs.carousel', function(e) {
                    var $animatingElems = $(e.relatedTarget).find("[data-animated = 'true']");
                    //prepare carousel animations
                    $animatingElems.each(function() {
                        var $this = $(this),
                            $animationType = $this.data('animation');
                        $this.removeClass('animated ' + $animationType);
                    });
                }).on('slid.bs.carousel', function(e){
                    var $animatingElems = $(e.relatedTarget).find("[data-animated = 'true']");

                    //fire carousel animations
                    $animatingElems.each(function() {
                        var $this = $(this),
                            $animationType = $this.data('animation');
                        $this.addClass('animated ' + $animationType).one(animEndEv, function() {
                            $this.removeClass($animationType);
                        });
                    });
                });
            });

        });

        // Disable 300ms click delay on mobile
        FastClick.attach(document.body);

        // WP admin bar fix
        $('#wpadminbar').each(function(){
            var $adminbar = $(this);

            $('.navbar-fixed-top').css({
                'margin-top' : $adminbar.height()
            });
        });

        // Tooltip
        $('.bs-tooltip').tooltip();

        // Popover
        $(".bs-popover")
          .on('click', function(e) {e.preventDefault(); return true;})
          .popover();

        // Responsive video
        $('.main').fitVids();

        // Video lightbox
        $('.video-lightbox').magnificPopup({
            type: 'iframe'
        });

        // Image gallery lightbox
        $('.gallery').each(function(){
            $(this).find('a.thumbnail')
            .magnificPopup({
                type:       'image',
                enableEscapeKey: true,
                gallery:    {
                    enabled:    true,
                    tPrev:      '',
                    tNext:      '',
                    tCounter: '%curr% | %total%'
                },
                mainClass: 'mfp-with-zoom',
                zoom: {
                  enabled: true,
                  duration: 300,
                  easing: 'ease-in-out',
                }
            });
        });

        /**
         * ripples
         */
        $([
          ".carousel-control",
          ".btn:not(.btn-link)",
          ".card-image",
          ".navbar a:not(.withoutripple)",
          ".dropdown-menu a",
          ".nav-tabs a:not(.withoutripple)",
          ".withripple",
          ".pagination li:not(.active, .disabled) a:not(.withoutripple)"
        ].join(",")).ripples();

        //Scroll Top Link
        $('#scrollTopLink').on('click', function(e){
            e.preventDefault();
            $('html,body').animate({ scrollTop: 0 }, 1000, 'easeOutExpo');
        });

        // Handle hash anchors
        $('.main p >a[href^="#"], .main li >a[href^="#"]').on('click', function(e){
            e.preventDefault();
            var target = $($(this).attr('href'));

            if(target.length){
                var offset = Math.round(target.offset().top - $('.navbar-fixed-top').outerHeight() - $('#wpadminbar').outerHeight());
                $('html,body').animate({ scrollTop: offset }, 1000, 'easeOutExpo');
            }
        });

        // Parallax Background Sections
        $('[data-ride="parallax"]').each(function(){
         // declare the variable to affect the defined data-type

            var $self = $(this);

            if(!$self.data('speed')) {
                $self.data('speed', 100);
            }
            if(!$self.data('direction')) {
                $self.data('direction', 'bottom');
            }

            $window = $(window);

            $window.scroll(function() {
                var offsetCoords = $self.offset(),
                    topOffset = offsetCoords.top;

                if ( ($window.scrollTop() + $window.height()) > (topOffset) &&
                    (topOffset + $self.height()) > $window.scrollTop() ) {

                    var octothorpe = 1;
                    // also, negative value because we're scrolling upwards
                    if($self.data('direction') === 'top'){
                      octothorpe =  -1;
                    }else if($self.data('direction') === 'bottom'){
                      octothorpe =  1;
                    }

                    var yPos = octothorpe * (($window.scrollTop() - topOffset) / 100) * $self.data('speed') ;

                    yPos = Math.round(yPos);

                    // move the background
                    $self.css({
                      '-webkit-transform' : 'translate3d(0, ' + yPos + 'px, 0)',
                      '-moz-transform'    : 'translate3d(0, ' + yPos + 'px, 0)',
                      '-ms-transform'     : 'translate3d(0, ' + yPos + 'px, 0)',
                      'transform'         : 'translate3d(0, ' + yPos + 'px, 0)',
                      'top'               : $self.data('offset-top'),
                      'left'              : $self.data('offset-left')
                    });
                }
            }).trigger('scroll');
        });

        //Background Video Section
        $('.background-video').each(function(){
            var $self = $(this),
                opts = {},
                prefix = 'youtube_video_',
                ratio = $self.data(prefix + 'ratio').split("/");

            opts.controls = ($self.data(prefix + 'controls') === 'on') ? 1 : 0;
            opts.fitbg = ($self.data(prefix + 'fitbg') === 'on') ? 1 : 0;
            opts.mute = ($self.data(prefix + 'mute') === 'on') ? 1 : 0;
            opts.pauseOnScroll = ($self.data(prefix + 'pause') === 'on') ? 1 : 0;
            opts.repeat = ($self.data(prefix + 'repeat') === 'on') ? 1 : 0;
            opts.start = $self.data(prefix + 'start');
            opts.videoId = $self.data(prefix + 'id');
            opts.ratio = parseInt(ratio[0],10)/parseInt(ratio[1],10);

            $self.YTPlayer({
                videoId: opts.videoId,
                fitToBackground: opts.fitbg,
                ratio: opts.ratio,
                mute: opts.mute,
                pauseOnScroll: opts.pauseOnScroll,
                repeat: opts.repeat,
                start: opts.start,
                playerVars: {
                  controls: opts.controls
                }
            });

        });


      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
