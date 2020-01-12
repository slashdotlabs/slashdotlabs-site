<?php
/**
 * The template part for selected footer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<?php if( is_active_sidebar('sidebar-footer-1') ) :?>
    <footer id="footer" class="page_footer section_padding_top_50 section_padding_bottom_65 columns_padding_25 ds">
        <div class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-10 col-md-8 col-md-offset-2 text-center to_animate" data-animation="fadeInUp">
				    <?php dynamic_sidebar( 'sidebar-footer-1' ); ?>
                </div>
            </div>

        </div>
    </footer><!-- .page_footer -->
<?php endif; ?>