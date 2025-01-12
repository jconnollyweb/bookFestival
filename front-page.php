<?php
/*
Template Name: Homepage
*/
get_header();
?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/front-page.css">


<section class="homepage-banner">
    <h1>Welcome to the Book Festival</h1>
    <p>Join us for an unforgettable celebration of literature.</p>
    <div id="countdown-timer">
        <div><span id="days">00</span> Days</div>
        <div><span id="hours">00</span> Hours</div>
        <div><span id="minutes">00</span> Minutes</div>
        <div><span id="seconds">00</span> Seconds</div>
    </div>
</section>

<section class="books-section">
    <div class="books-container">
        <?php
        // Query the 'books' custom post type
        $books_query = new WP_Query([
            'post_type' => 'books',
            'posts_per_page' => -1, 
        ]);

        // Loop through the books
        if ($books_query->have_posts()) :
            while ($books_query->have_posts()) :
                $books_query->the_post();
                
                // Get the ACF fields
                $book_title = get_field('book_title');
                $book_cover = get_field('book_cover');
                $book_description = get_field('book_description');
        ?>
                <div class="book-card">
                    <?php if ($book_cover): ?>
                        <img src="<?php echo esc_url($book_cover['url']); ?>" alt="<?php echo esc_attr($book_cover['alt']); ?>" class="book-cover">
                    <?php endif; ?>
                    <h2 class="book-title"><?php echo esc_html($book_title); ?></h2>
                    <p class="book-description"><?php echo esc_html($book_description); ?></p>
                </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
        ?>
            <p>No books available at the moment. Please check back later.</p>
        <?php endif; ?>
    </div>
</section>

<script>
 document.addEventListener('DOMContentLoaded', function () {
    const container = document.querySelector('.books-container');

    let scrollAmount = 0; // Initial scroll position
    const scrollSpeed = 1; // Adjust speed for smoothness

    function autoScroll() {
        scrollAmount += scrollSpeed;

        // Reset to the start when the scroll reaches the end
        if (scrollAmount >= container.scrollWidth - container.offsetWidth) {
            scrollAmount = 0;
        }

        container.scrollLeft = scrollAmount;

        requestAnimationFrame(autoScroll); 
    }

    autoScroll(); // Start auto-scrolling
});


</script>

<?php
get_footer();
?>
