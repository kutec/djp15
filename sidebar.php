<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package DJP2015
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<?php if ( is_home() ) : ?>
    <div id="secondary" class="col-md-12" role="complementary">
<?php else : ?>
    <div id="secondary" class="col-md-3" role="complementary">
<?php endif; ?>
	<div class="row">
		<div class="secondary-inner">
        	<?php if(is_home()) { ?>
            <div class="container">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
        	</div>
            <?php } else { dynamic_sidebar( 'sidebar-1' ); } ?>
			
		</div>
	</div>
</div><!-- #secondary -->
