<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

		</div><!-- #content -->
			<footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-4 col-md-3 col-xs-6">
                    <div class="widget about-widget">
                        <?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
                    </div>
                    </div>
                    <div class="col col-lg-2 col-md-3 col-xs-6">
                        <div class="widget site-map-widget">
                            <?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
                        </div>
                    </div>
                    <div class="col col-lg-3 col-md-3 col-xs-6">
                        <div class="widget about-widget">
                            <?php dynamic_sidebar( 'third-footer-widget-area' );?>
                        </div>
                    </div>
                    <div class="col col-lg-3 col-md-3 col-xs-6">
                        <div class="widget newsletter-widget">
                            <?php dynamic_sidebar( 'fourth-footer-widget-area' );?>
                        </div>
                        <div class="widget social-media-widget">
							<?php vipindustrial_show_social_icons(); ?>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </footer>
	</div><!-- .site-content-contain -->
</div><!-- end of page-wrapper -->

<?php wp_footer(); ?>
<script type="text/javascript">
 /*------------------------------------------
        = GOOGLE MAP
    -------------------------------------------*/  
    function map() {

        var myLatLng = new google.maps.LatLng(<?php vipindustrial_display_address(); ?>);
        var mapProp = {
            center: myLatLng,
            zoom: 14,
            scrollwheel: false,
            mapTypeId: google.maps.MapTypeId.ROAD
        };

        var map = new google.maps.Map(document.getElementById("map"),mapProp);
        var marker = new google.maps.Marker({
            position: myLatLng,
            icon:'<?php echo get_template_directory_uri(); ?>/assets/images/map-marker.png'
        });

        marker.setMap(map);

        map.set('styles',

            [
                {
                    "featureType": "administrative",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#ff8e31"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [
                        {
                            "color": "#f2f2f2"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "all",
                    "stylers": [
                        {
                            "saturation": -100
                        },
                        {
                            "lightness": 45
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "all",
                    "stylers": [
                        {
                            "color": "#ff8e31"
                        },
                        {
                            "visibility": "on"
                        }
                    ]
                }
            ]
        );
    }; 

</script>
</body>
</html>
