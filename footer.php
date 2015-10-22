<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package DJP2015
 */

?>

	</div><!-- #content -->

	<footer id="footer" role="contentinfo">
		<div class="container">
			<div class="developed-by col-md-3">
            	<div class="row">
            		<p>Developed by <a href="http://kutec.co.in" target="_blank" title="KU Technologies"><img src="<?php echo get_template_directory_uri(); ?>/img/credits.png"></a></p>
                </div>
            </div>
            <div class="col-md-9">
            	<div class="row">
            		<p>&copy; <?php echo date('Y'); ?>, <?php bloginfo( 'name' ); ?>.</p>
                    <p>IMAGES ON THIS SITE IS COPYRIGHTED BY LAW. If you really like image, please approach <a href="mailto:devjays@gmail.com?subject=SiteFooter">Deval Jayswal</a> to buy. 
              	</div>
            </div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
