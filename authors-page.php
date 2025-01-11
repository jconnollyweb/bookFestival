<?php
/*
Template Name: Authors Page
*/
get_header();
?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/author.css">

<section class="authors-section">
    <h1>Meet Our Authors</h1>
    <div class="authors-container">
        <?php
        // Query the Authors post type
        $authors_query = new WP_Query(array(
            'post_type' => 'authors',
            'posts_per_page' => -1,
            'post_status' => 'publish',
        ));

        if ($authors_query->have_posts()) :
            while ($authors_query->have_posts()) : $authors_query->the_post();
                $post_id = get_the_ID();

                // Retrieve ACF fields for the current post
                $author_name = get_field('authors_name', $post_id);
                $author_image = get_field('authors_image', $post_id);
                $author_description = get_field('author_description', $post_id);
                $author_website = get_field('authors_website', $post_id);
        ?>
                <div class="author-card">
                    <h2 class="author-name"><?php echo esc_html($author_name); ?></h2>
                    <?php if ($author_image) : ?>
                        <img class="author-portrait" src="<?php echo esc_url($author_image['url']); ?>" alt="<?php echo esc_attr($author_image['alt']); ?>">
                    <?php endif; ?>
                    <p class="author-description"><?php echo esc_html($author_description); ?></p>
                    <?php if ($author_website) : ?>
                        <a class="author-website" href="<?php echo esc_url($author_website); ?>" target="_blank">Visit Website</a>
                    <?php endif; ?>
                </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>No authors found.</p>';
        endif;
        ?>
    </div>
</section>

<?php
get_footer();
?>
