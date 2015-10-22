<?php
/**
 * Template part for displaying posts.
 *
 * @package DJP2015
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-lg-4 col-md-4 col-sm-6 col-xs-12'); ?>>
	<div class="post--inner">
            <header class="post--header">
                <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        		
                <?php if ( 'post' == get_post_type() ) : ?>
                <div class="entry-meta">
                    <span class="timestamp">
                        <i class="fa fa-clock-o"></i>
                        <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')).' ago'; ?>
                    </span>
                    <!--?php djp2015_posted_on(); ?-->
                </div><!-- .entry-meta -->
                <?php endif; ?>
            </header><!-- .entry-header -->
            
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
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(medium); ?></a>
                        </div>
                    <?php } ?>
                <?php } ?>
				
				<p class="post--price"><span><i class="fa fa-inr"></i></span> <?php the_field('default_price'); ?></p>
                <?php
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'djp2015' ),
                        'after'  => '</div>',
                    ) );
                ?>
            </div><!-- .entry-content -->

            <!-- footer class="entry-footer">
				<?php djp2015_entry_footer(); ?>
            </footer --><!-- .entry-footer -->
        </div>
</article><!-- #post-## -->