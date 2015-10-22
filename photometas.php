<?php
/**
 * The sidebar containing Meta Data of Photos.
 *
 * @package DJP2015
 */
?>
<div id="photometas" class="col-md-4" role="complementary">
	<div class="row">
		<div class="secondary-inner">
			<aside class="widget entry-title">
				<div class="widget--inner">
					<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
			        
					<?php if ( 'post' == get_post_type() ) : ?>
					<div class="entry-meta">
						<span class="timestamp">
						    <i class="fa fa-clock-o"></i>
						    <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')).' ago'; ?>
						</span>
						<!--?php djp2015_posted_on(); ?-->
					</div><!-- .entry-meta -->
				</div>
			</aside>
			<?php endif; ?>
			<!-- Read Story ----------------------------------------------->
			<?php if(get_the_content()) { ?>
			<aside class="widget read-story">
				<div class="widget--inner">
					<a href="#readStory" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#readStory">
					  Read Story
					</a>
					<div class="modal fade" id="readStory" tabindex="-1" role="dialog" aria-labelledby="readStoryLabel">
					  <div class="modal-dialog modal-lg" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel"><?php the_title(); ?></h4>
					      </div>
					      <div class="modal-body">
					        <?php the_content(); ?>
					      </div>
					    </div>
					  </div>
					</div>
				
				</div>
			</aside>
				
			<?php } ?>
			
			<!-- IMAGE PRICEs ----------------------------------------------->
			<?php if(get_field('default_price')) { ?>
			<aside class="widget cost">
				<div class="widget--inner">
					<span class="post--price"> Default Price
						<br />
						<span class="icon-rupee label label-success"> <i class="fa fa-inr"></i> <?php the_field('default_price'); ?> </span> </span>
					<a class="btn btn-link" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Variations</a>
					<div class="collapse" id="collapseExample">
						<ul class="list-group">
							<li class="list-group-item">
								Original Canvas Cloth Material
								<br>
								<span class="post--price"> <span class="icon-rupee label label-success"> <i class="fa fa-inr"></i> <?php the_field('default_price'); ?> </span> </span>
							</li>
							<li class="list-group-item">
								Size 1
								<br>
								<span class="post--price"> <span class="icon-rupee label label-info"> <i class="fa fa-inr"></i> <?php the_field('size_1'); ?> </span> </span>
							</li>
							<li class="list-group-item">
								Size 2
								<br>
								<span class="post--price"> <span class="icon-rupee label label-warning"> <i class="fa fa-inr"></i> <?php the_field('size_2'); ?> </span> </span>
							</li>
						</ul>
					</div>
				</div>
			</aside>
			<?php } ?>
			
			<!-- Contact Form ----------------------------------------------->
			<aside class="widget contact">
				<div class="widget--inner">
					<!-- Button trigger modal -->
					<a href="#contactModal" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#contactModal">Email to Buy</a>
					<!-- Modal -->
					<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<h4 class="modal-title" id="myModalLabel">Send Message to <strong>Deval Jayswal</strong></h4>
								</div>
								<div class="modal-body">
									<?php echo do_shortcode('[contact-form-7 id="108" title="Contact form 1"]'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</aside>
			
			<!-- Place ----------------------------------------------->
			<?php if(get_field('place')) { ?>
			<aside class="widget">
				<div class="widget--inner">
					<span> <i class="fa fa-map-marker"></i> <?php the_field('place'); ?> </span>
					<?php

$location = get_field('place');

if( !empty($location) ):
					?>
					<div class="acf-map">
						<div class="marker" data-lat="
						<?php echo $location['lat']; ?>" data-lng="
						<?php echo $location['lng']; ?>"></div>
					</div>
					<?php endif; ?>
					<style type="text/css">
						.acf-map {
							width: 100%;
							height: 150px;
							border: #ccc solid 1px;
							margin: 20px 0;
						}

					</style>
					<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
					<script type="text/javascript">
						(function($) {

							/*
							 *  render_map
							 *
							 *  This function will render a Google Map onto the selected jQuery element
							 *
							 *  @type	function
							 *  @date	8/11/2013
							 *  @since	4.3.0
							 *
							 *  @param	$el (jQuery element)
							 *  @return	n/a
							 */

							function render_map($el) {

								// var
								var $markers = $el.find('.marker');

								// vars
								var args = {
									zoom : 16,
									center : new google.maps.LatLng(0, 0),
									mapTypeId : google.maps.MapTypeId.ROADMAP
								};

								// create map
								var map = new google.maps.Map($el[0], args);

								// add a markers reference
								map.markers = [];

								// add markers
								$markers.each(function() {

									add_marker($(this), map);

								});

								// center map
								center_map(map);

							}

							/*
							 *  add_marker
							 *
							 *  This function will add a marker to the selected Google Map
							 *
							 *  @type	function
							 *  @date	8/11/2013
							 *  @since	4.3.0
							 *
							 *  @param	$marker (jQuery element)
							 *  @param	map (Google Map object)
							 *  @return	n/a
							 */

							function add_marker($marker, map) {

								// var
								var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));

								// create marker
								var marker = new google.maps.Marker({
									position : latlng,
									map : map
								});

								// add to array
								map.markers.push(marker);

								// if marker contains HTML, add it to an infoWindow
								if ($marker.html()) {
									// create info window
									var infowindow = new google.maps.InfoWindow({
										content : $marker.html()
									});

									// show info window when marker is clicked
									google.maps.event.addListener(marker, 'click', function() {

										infowindow.open(map, marker);

									});
								}

							}

							/*
							 *  center_map
							 *
							 *  This function will center the map, showing all markers attached to this map
							 *
							 *  @type	function
							 *  @date	8/11/2013
							 *  @since	4.3.0
							 *
							 *  @param	map (Google Map object)
							 *  @return	n/a
							 */

							function center_map(map) {

								// vars
								var bounds = new google.maps.LatLngBounds();

								// loop through all markers and create bounds
								$.each(map.markers, function(i, marker) {

									var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());

									bounds.extend(latlng);

								});

								// only 1 marker?
								if (map.markers.length == 1) {
									// set center of map
									map.setCenter(bounds.getCenter());
									map.setZoom(16);
								} else {
									// fit to bounds
									map.fitBounds(bounds);
								}

							}

							/*
							 *  document ready
							 *
							 *  This function will render each map when the document is ready (page has loaded)
							 *
							 *  @type	function
							 *  @date	8/11/2013
							 *  @since	5.0.0
							 *
							 *  @param	n/a
							 *  @return	n/a
							 */

							$(document).ready(function() {

								$('.acf-map').each(function() {

									render_map($(this));

								});

							});

						})(jQuery);
					</script>
				</div>
			</aside>
			<?php } ?>
		</div>
	</div>
</div>
<!-- #secondary -->