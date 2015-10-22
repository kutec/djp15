<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package DJP2015
 */

get_header(); ?>
	<?php if ( is_home() ) : ?>
    <div id="primary" class="col-md-12">
    <?php else : ?>
    <div id="primary" class="col-md-9">
    <?php endif; ?>
    	<div class="row">
            <main id="main" class="site-main" role="main">
            	<div class="container">
            		<?php if ( !is_front_page() ) : ?>
            				<h2 class="page-title">My Portfolio<br><br><small>I am available for projects. <br>Kindly <strong><a href="/contact" title="Contact Page">contact</a></strong> me or shoot me an <strong><a href="mailto:devjays@gmail.com?subject=DevalJayswal.com" title="devjays@gmail.com">email</a>.</small></h2>
            			<?php endif; ?>
            		<div class="row">
            			<div id="portfolio" class="clearfix">
	                        <?php if ( have_posts() ) : ?>
	                
	                            <?php /* Start the Loop */ ?>
	                            <?php while ( have_posts() ) : the_post(); ?>
	                
	                                <?php
	                
	                                    /*
	                                     * Include the Post-Format-specific template for the content.
	                                     * If you want to override this in a child theme, then include a file
	                                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
	                                     */
	                                    get_template_part( 'template-parts/content', get_post_format() );
	                                ?>
	                
	                            <?php endwhile; ?>
	                
	                            <?php the_posts_navigation(); ?>
	                
	                        <?php else : ?>
	                
	                            <?php get_template_part( 'template-parts/content', 'none' ); ?>
	                
	                        <?php endif; ?>
	                        </div>
                        </div>
            	</div>
            </main><!-- #main -->
    	</div>
	</div><!-- #primary -->

<?php get_footer(); ?>
<script>
	$('#portfolio').dataURL();
</script>
<script>
jQuery('.home #secondary .widget').addClass('col-md-4 col-sm-6 col-xs-12');
// init Isotope
/*
var $posts = $('#portfolio .post').isotope({ 
	itemSelector: '.post--inner',
	percentPosition: true,
	resizable: true,
	layoutMode: 'masonry',
	masonry: {
		// use element for option
		columnWidth: '.post--inner'
	}
});

// layout Isotope after each image loads
$posts.imagesLoaded().progress( function() {
	$posts.isotope('layout');
});
*/
</script>