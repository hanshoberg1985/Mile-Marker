<?php
/**
 * Template Name: Home
 * Description: Home Page Template
 */

get_header(); ?>

<link href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/css/home.css" rel="stylesheet">

</head>

<body>
    <div class="page-container">
        <div class="page-sidebar-wrapper">
            <button class="navbar-toggle collapsed sidebar-navbar-collapse" data-target=".page-sidebar" data-toggle="collapse" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="page-sidebar navbar-collapse collapse">
                <div class="page-logo">
                    <a href="http://milemarker.com" title="Mile Marker">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png">
                    </a>
                </div>
                <ul class="page-sidebar-menu" data-slide-speed="200" data-auto-scroll="true">
                    <li>
                        <a href="http://milemarker.com/products" target="_self">PRODUCTS</a>
                    </li>
                    <li>
                        <a href="http://milemarker.com/team-orange" target="_self">TEAM ORANGE</a>
                    </li>
                    <li>
                        <a href="http://milemarker.com/news-room" target="_self">NEWS</a>
                    </li>
                    <li>
                        <a href="http://milemarker.com/company" target="_self">COMPANY</a>
                    </li>
                    <li>
                        <a href="http://milemarker.com/where-to-buy" target="_self">WHERE TO BUY</a>
                    </li>
                </ul>
                <div class="search-content">
                    <form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
                        <input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" placeholder="Search" />
                        <button type="submit" id="searchsubmit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="social-content">
                    <ul class="social-list">
                        <li>
                            <a href="https://www.facebook.com/milemarker" target="_blank" title="facebook" class="facebook"></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/MileMarkerWinch" target="_blank" title="twitter" class="twitter"></a>
                        </li>
                        <li>
                            <a href="http://instagram.com/milemarker_winch" target="_blank" title="instagram" class="instagram"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-main-wrapper">
            <section id="section1">
                <div class="section-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="content-title">THIS WINCH CHANGES<br>EVERYTHING.</h1>
                                <div class="content-title-divider"></div>
                                <img class="gator-logo" src="<?php echo get_template_directory_uri(); ?>/images/top_logo.png" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="http://milemarker.com/gator" target="_self" class="btn_see_gator button">SEE THE GATOR</a>
                            </div>
                        </div>
                        <a class="btn_play_button fancybox fancybox.iframe" href="http://www.youtube.com/embed/KWKMjCWlbog?enablejsapi=1&wmode=opaque"></a>
                    </div>
                </div>
            </section>
            <section class="category-section">
                <div class="section-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="category-nav">
                                    <li>
                                        <a href="http://milemarker.com/products/electric-winches/projectes" target="_self">FIND A PRODUCT</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="http://milemarker.com/products/recovery-gear" target="_self">FIND A DEALER</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="http://milemarker.com/products/drive-train-products/lock-out-hubs" target="_self">BECOME A DEALER</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="section2">
                <div class="section-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <img class="team-orange" src="<?php echo get_template_directory_uri(); ?>/images/team_orange.png" />
                            </div>
                            <div class="col-md-6">
                                <div class="sign-me-content">
                                    <h3>SEO INTRO CONTENT ABOUT MILE MARKER</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <input type="email" class="sign-me-email" placeholder="Email Address" />
                                        </div>
                                        <div class="col-md-5">
                                            <button type="button" class="sign-me-up">SIGN ME UP</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="section3">
                <div class="section-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/winches_gator_car.png" />
                                <button>WINCHES</button>
                            </div>
                            <div class="col-md-6">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/hubs_gator_car.png" />
                                <button>HUBS</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="section4">
                <div class="section-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <h1>FROM THE TRAIL</h1>
                            </div>
                        </div>
                        <div class="row">
                            <ul id="wire_list">
                                <?php
                                // twitter feeds
                                echo do_shortcode('[fts twitter twitter_name=MileMarkerWinch]');

                                // Instagram feeds
                                echo do_shortcode('[fts instagram instagram_id=332678824]');

                                // wp posts
                                $post_count = 4;
                                $args = array(
                                    'orderby' => 'date',
                                    'order' => 'DESC'
                                );
                                $query = new WP_Query( $args );
                                if( $query->have_posts() ) {
                                    $post_index = 0;
                                    while ($query->have_posts() && $post_index < $post_count) {
                                        $query->the_post();
                                        $link = get_the_permalink();
                                        $username = get_the_author();
                                        $title = get_the_title();
                                        $content = get_the_content();
                                        $time = get_the_date();
                                        echo "
                                            <li class='feed-wrap col-lg-3 col-md-3 col-sm-4 col-xs-6'>
                                                <div class='feed-info' href='$link'>
                                                    <div class='feed-info-wrapper'>
                                                        <div class='feed-user-name'>$username</div>
                                                        <div class='feed-content'>
                                                            <h3>$title</h3>
                                                            <p>$content</p>
                                                        </div>
                                                        <div class='feed-time'>$time</div>
                                                    </div>
                                                </div>
                                            </li>";
                                        $post_index++;
                                    }
                                }
                                wp_reset_query();
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <section id="section5">
                <div class="section-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="bottom-section">
                <div class="section-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="bottom-nav">
                                    <li><h5>PRODUCTS</h5></li>
                                    <li><a href="#">ELECTRIC WINCHES</a></li>
                                    <li><a href="#">HYDRAULIC WINCHES</a></li>
                                    <li><a href="#">ATV/UTV WINCHES</a></li>
                                    <li><a href="#">RECOVERY GEAR</a></li>
                                    <li><a href="#">WINCH ACCESSORIES</a></li>
                                    <li><a href="#">REPLACEMENT PARTS</a></li>
                                    <li><a href="#">DRIVETRAIN PRODUCTS</a></li>
                                    <li><a href="#">WINCH MOUNTS</a></li>
                                    <li><a href="#">MILITARY PRODUCTS</a></li>
                                </ul>
                                <ul class="bottom-nav">
                                    <li><h5>CUSTOMER SERVICE</h5></li>
                                    <li><a href="#">PRODUCT LITERATURE</a></li>
                                    <li><a href="#">WARRANTY INFO</a></li>
                                    <li><a href="#">PRODUCT REGISTRATION</a></li>
                                    <li><a href="#">REPORT WEBSITE BUGS</a></li>
                                    <li><a href="#">CONTACT MILE MARKER</a></li>
                                </ul>
                                <ul class="bottom-nav">
                                    <li><h5>TEAM ORANGE</h5></li>
                                    <li><a href="#">COMPANY</a></li>
                                    <li><a href="#">GALLERY</a></li>
                                    <li><a href="#">MM YOUTUBE CHANNEL</a></li>
                                    <li><a href="#">SCHOOL OF RECOVERY</a></li>
                                    <li><a href="#">FACEBOOK</a></li>
                                    <li><a href="#">TWITTER</a></li>
                                    <li><a href="#">NEWS ROOM</a></li>
                                </ul>
                                <ul class="bottom-nav">
                                    <li><h5>MM DEALER</h5></li>
                                    <li><a href="#">FIND A DEALER</a></li>
                                    <li><a href="#">BECOME A DEALER</a></li>
                                    <li><a href="#">DEALER PORTAL</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-info">
                                    <h3><i class="fa fa-home"></i> 2121 Blount Road Pompano Beach, FL USA</h3>
                                    <h3><i class="fa fa-phone"></i> 1(800) 000 - 0000</h3>
                                    <h3><i class="fa fa-envelope"></i> help@milemarker.com</h3>
                                </div>
                                <div class="sign-me-content">
                                    <h4>SIGN UP FOR STUFF.</h4>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input type="email" class="sign-me-email" placeholder="Email Address" />
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button" class="sign-me-up">SIGN ME UP</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="bottom-certification">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/bottom_certification.png" />
                                </div>
                                <div class="copyright">
                                    Copyright © 2014 Mile Marker Incorporated. All Rights Reserved. Mile Marker and Use Mile Marker Logo are Registered Trademarks of Mile Marker Incorporated. Privacy Policy and Legal Statement.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo get_template_directory_uri(); ?>/bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/plugin/jquery.scrolltofixed.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/plugin/fancybox/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/plugin/fancybox/jquery.fancybox.js?v=2.1.4"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/plugin/fancybox/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/plugin/fancybox/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/plugin/fancybox/helpers/jquery.fancybox-media.js?v=1.0.5"></script>

<script src="http://www.youtube.com/player_api"></script>

<script type="text/javascript">
    // Fires whenever a player has finished loading
    function onPlayerReady(event) {
        event.target.playVideo();
    }

    // Fires when the player's state changes.
    function onPlayerStateChange(event) {
        // Go to the next video after the current one is finished playing
        if (event.data === 0) {
            $.fancybox.close();
        }
    }

    // The API will call this function when the page has finished downloading the JavaScript for the player API
    function onYouTubePlayerAPIReady() {
        // Initialise the fancyBox after the DOM is loaded
        $(document).ready(function() {
            $(".playvideo")
                .attr('rel', 'media-gallery')
                .fancybox({
                    autoSize: true,
                    padding: 0,
                    margin: 0,
                    aspectRatio: true,
                    beforeShow  : function() {
                        // Find the iframe ID
                        var id = $.fancybox.inner.find('iframe').attr('id');

                        // Create video player object and add event listeners
                        var player = new YT.Player(id, {
                            events: {
                                'onReady': onPlayerReady,
                                'onStateChange': onPlayerStateChange
                            }
                        });
                    }
                });
        });

    }

    $('.category-section').scrollToFixed({
        limit: $('#section4').offset().top - $('.category-section').outerHeight(true)
    });

    $('.feed-info').on('click', function(e) {
        var href = $(this).attr('href');
        if(href != undefined) location.href = href;
    });
</script>

<?php get_footer(); ?>