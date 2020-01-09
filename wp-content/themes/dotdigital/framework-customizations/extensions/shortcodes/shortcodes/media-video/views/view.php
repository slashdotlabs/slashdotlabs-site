<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */

global $wp_embed;
$unique_id = uniqid();

$width  = ( is_numeric( $atts['width'] ) && ( $atts['width'] > 0 ) ) ? $atts['width'] : '300';
$height = ( is_numeric( $atts['height'] ) && ( $atts['height'] > 0 ) ) ? $atts['height'] : '200';
$link = $atts['media_link'];
$video = $atts['media_video'];
if ( $video ) {
	$link = $video;
}
?>
<div class="video-wrapper video-shortcode shortcode-container">
    <div class="video_image_cover"
         style="width: <?php echo esc_attr( $width ) ?>px; height: <?php echo esc_attr( $height ) ?>px; background-image:url('<?php echo esc_attr( $atts['media_image']['url'] ) ?>')">
		<?php /*echo do_shortcode( $iframe ); */?>
	    <?php if ( $link ): ?>
            <a href="<?php echo esc_url( $link ); ?>" <?php echo ( $video ) ? ' data-gal="prettyPhoto[gal-video-'. $unique_id .']"' : ''; ?>></a>
	    <?php endif; //$link ?>
    </div>
</div>
