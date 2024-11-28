<?php // remove opening php tag

wp_reset_query();
$args = [
     'post_type'      => 'post',
     'post_status'    => 'publish',
     'posts_per_page' => 3
];
$blog_query = new WP_Query( $args );
?>

<?php if ( $blog_query->have_posts() ) : ?>
<?php while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>

<?php endwhile; ?>
<?php endif; ?>

<!-- https://whiteleydesigns.com/performance-optimization/ -->