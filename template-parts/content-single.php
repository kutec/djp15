<?php
/**
 * Template part for displaying single posts.
 *
 * @package DJP2015
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-12'); ?>>
	<div class="row">
	    <div class="post--inner"> 
	    	<div class="entry-content">
	                <?php if(get_field('img_full')) { ?>
	                    <div class="post--img uploaded">
	                        <img src="<?php the_field('img_full'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
	                    </div>
	                <?php  } else if(get_field('img_full_url')) { ?>
	                    <div class="post--img external">
	                        <img src="<?php the_field('img_full_url'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
	                    </div>
	                <?php } else { ?>
	                    <?php if(has_post_thumbnail()){ ?>
	                        <div class="post--img thumbnail">
	                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
	                        </div>
	                    <?php } ?>
	                <?php } ?>
	                
	                <?php
	                    wp_link_pages( array(
	                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'djp2015' ),
	                        'after'  => '</div>',
	                    ) );
	                ?>
	                <footer class="entry-footer">
		        	<?php djp2015_entry_footer(); ?>
		      	</footer><!-- .entry-footer -->
	 	</div><!-- .entry-content -->
	        
	    </div>
	</div>
</article><!-- #post-## -->
