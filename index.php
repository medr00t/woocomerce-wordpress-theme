<?php
get_header();


if (have_posts()) :
    while (have_posts()) :

        the_post();
        // Display post content here
?><section class="post">
            <div class="container">
                <article <?php post_class(); ?>>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php the_content(); ?>
                </article>
            </div>
        </section>
<?php
    endwhile;
else :

    echo '<div class="container no-post-section">
    <h1>No posts found !</h1>
    
     <a href="' . home_url('/') . '" class="link-secondary ">Return Home</a>
    </div>';
endif;

get_footer();
?>