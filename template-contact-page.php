<?php
/**
 * Template Name: Contact pagina
 *
 * @package michelletoussaintcoaching
 */
?>

<?php get_header(); ?>

<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->
<?php zerif_after_header_trigger(); ?>
<div id="content" class="site-content mtc-contact-page mtc-yellow-page">

	<div class="container">

		<?php zerif_before_page_content_trigger(); ?>

		<div class="content-left-wrap col-md-12">

			<?php zerif_top_page_content_trigger(); ?>

			<div id="primary" class="content-area<?php if ( has_post_thumbnail() ) :?> mtc-with-featured-image<?php endif;?>">

				<main id="main" class="site-main">

					<?php
					while ( have_posts() ) :

						if ( has_post_thumbnail() ) :
							?><div class="mtc-featured-image"><?php
								the_post_thumbnail('mtc-featured-image-thumbnail');
							?></div><?php
						endif;
                        ?>
                        <div class="mtc-post-content mtc-col-left">
                            <?php
                                the_post();

                                get_template_part( 'content', 'page' );
                            ?>
                        </div>
                        <div class="mtc-col-right">
                            <div id="mtc-map" class="mtc-map"></div>
                            <div id="mtc-route-planner" class="mtc-route-planner">
                                    <a class="btn btn-primary custom-button red-btn" target="_blank"
                                        href="https://www.google.nl/maps/dir//52.021572,4.444923/@52.0174686,4.4283248,15z/data=!4m2!4m1!3e0?hl=nl">
                                    Klik hier om je route te plannen!
                                </a>
                            </div>
                        </div>
                    <?php
                        endwhile;
					?>

				</main><!-- #main -->

			</div><!-- #primary -->

			<?php zerif_bottom_page_content_trigger(); ?>

		</div><!-- .content-left-wrap -->

		<?php zerif_after_page_content_trigger(); ?>

	</div><!-- .container -->

<?php get_footer(); ?>

<script>
/*
52.021572, 4.444923
 */
    function initMap() {
        var michelletoussaintcoaching = {lat: 52.021572, lng: 4.444923};
        var map = new google.maps.Map(document.getElementById('mtc-map'), {
            zoom: 16,
            center: michelletoussaintcoaching
        });
        var marker = new google.maps.Marker({
            position: michelletoussaintcoaching,
            map: map
        });
        var infowindow = new google.maps.InfoWindow({
            content: '<div class="mtc-maps-infowindow"><b>Michelle Toussaint Coaching</b><br/>Kievitlande 13<br/>2641 RG Pijnacker</div>'
        });
        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });
        google.maps.event.addListenerOnce(map, 'tilesloaded', function(){
            infowindow.open(map, marker);
        });
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsRS28HOZcOUk43AMD59cFQVVFIQsMZR0&callback=initMap"></script>
