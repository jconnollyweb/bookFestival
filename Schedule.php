<?php
/*
Template Name: Schedule
*/
get_header();
?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/schedule.css">

<div class="schedule-container">
    <h1>Schedule</h1>
    
    <?php
    // Query for the custom post type "Day"
    $args = array(
        'post_type' => 'day',
        'post_status' => 'publish',
        'posts_per_page' => -1, // Fetch all Days
        'meta_key' => 'day', 
        'orderby' => 'meta_value',
        'order' => 'ASC'
    );
    $days_query = new WP_Query($args);

    if ($days_query->have_posts()) :
        while ($days_query->have_posts()) : $days_query->the_post();

            // Get ACF fields for the current post
            $day = get_field('day');
            $time = get_field('time');
            $location = get_field('location');
            $first_guest_speaker = get_field('first_guest_speaker');
            $summary = get_field('summary');
            $second_guest_speaker = get_field('second_guest_speaker');
            $second_summary = get_field('second_summary');
    ?>

    <div class="schedule-day">
        <h2><?php echo esc_html($day); ?> - <?php echo esc_html($time); ?></h2>
        <p><strong>Location:</strong> <?php echo esc_html($location); ?></p>

        <div class="schedule-speakers">
            <?php if ($first_guest_speaker) : ?>
                <div class="speaker">
                    <h3>First Guest Speaker: <?php echo esc_html($first_guest_speaker); ?></h3>
                    <p><?php echo esc_html($summary); ?></p>
                </div>
            <?php endif; ?>

            <?php if ($second_guest_speaker) : ?>
                <div class="speaker">
                    <h3>Second Guest Speaker: <?php echo esc_html($second_guest_speaker); ?></h3>
                    <p><?php echo esc_html($second_summary); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p>No schedule available at the moment.</p>';
    endif;
    ?>
</div>

<?php get_footer(); ?>
