<?php
/**
 * The template for displaying all single posts.
 *
 * @package DJP2015
 */

get_header(); ?>
<div class="container-fluid">
	<div class="row">
	        <header id="intro" class="entry-header">
	            
	        </header><!-- .entry-header -->
	</div>
</div>
	
<div class="container">
	<div id="primary" class="col-md-8">
        	<div class="row">
	            <main id="main" class="site-main" role="main">
	        
	                <?php while ( have_posts() ) : the_post(); ?>
	                    
	                    <?php get_template_part( 'template-parts/content', 'single' ); ?>
	                    <?php endwhile; // End of the loop. ?>
	                
	            </main><!-- #main -->
            	</div>
        </div><!-- #primary -->
	
	<?php include 'photometas.php'; ?>
	
	<div id="discussion">
		<?php
		    // If comments are open or we have at least one comment, load up the comment template.
		    if ( comments_open() || get_comments_number() ) :
		        comments_template();
		    endif;
		?>
	</div>
</div>



<?php get_footer(); ?>