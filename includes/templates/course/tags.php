<?php
/**
 * Template for displaying course tags
 *
 * @since v.1.0.0
 *
 * @author Themeum
 * @url https://themeum.com
 *
 * @package Tutor Divi Moduels
 */

defined( 'ABSPATH' ) || exit;

do_action('tutor_course/single/before/tags');

/**
 * args[] from settings
 */
$course_id = $args[ 'course' ];
$course_tags = get_tutor_course_tags( $course_id );

if(is_array($course_tags) && count($course_tags)){ ?>
    <div class="tutor-single-course-segment tutor-divi-course-tags-wrapper">
        <div class="course-benefits-title">
            <h3 class="tutor-segment-title"><?php esc_html_e( $args['label'] ); ?></h3>
        </div>
        <ul class="tutor-tag-list">
            <?php
                foreach ($course_tags as $course_tag){
                    $tag_link = get_term_link($course_tag->term_id);
                    echo "<li><a href='".esc_attr( $tag_link )."'> ".esc_html( $course_tag->name )." </a></li>";
                }
            ?>
        </ul>
    </div>
<?php
}

do_action('tutor_course/single/after/tags'); ?>