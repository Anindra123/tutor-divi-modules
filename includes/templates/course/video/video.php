<?php
/**
 * Display Video
 *
 * @since v.2.0.0
 *
 * @author themeum
 * @url https://themeum.com
 *
 * @package TutorLMS/DiviModules
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$course_id  = $data['course_id'];
$video_info = tutor_utils()->get_video_info( $course_id );
do_action( 'tutor_lesson/single/before/video' );

$source_key = is_object( $video_info ) && 'html5' !== $video_info->source ? 'source_' . $video_info->source : null;

$has_source = ( is_object( $video_info ) && $video_info->source_video_id ) || ( isset( $source_key ) ? $video_info->$source_key : null );

if ( $has_source ) {
	$template = trailingslashit( DTLMS_TEMPLATES . 'video' ) . $video_info->source . '.php';
	if ( file_exists( $template ) ) {
		tutor_load_template_from_custom_path(
			$template,
			array( 'course_id' => $course_id )
		);
	} else {
		echo esc_html( $video_info->source . ' Video template not found', 'tutor-lms-divi-modules' );
	}
} else {
	$feature_image = get_post_meta( $course_id, '_thumbnail_id', true );
	$url           = $feature_image ? wp_get_attachment_url( $feature_image ) : null;
	if ( $url ) {
		echo '<div class="tutor-lesson-feature-image">
                <img src="' . esc_url( $url ) . '" />
            </div>';
	}
}
do_action( 'tutor_lesson/single/after/video' );
