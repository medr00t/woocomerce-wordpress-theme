<?php get_header() ?>

<div class="container">
    <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class(); ?>>
            <h2><?php the_title(); ?></h2>
            this is the content of single page
            <div class="content">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>

</div>

<?php get_footer() ?>