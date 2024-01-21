<?php get_header() ?>

<div class="container">

   <?php while (have_posts()) : the_post(); ?>
      <article <?php post_class(); ?>>
         <h2><?php the_title(); ?></h2>
         <div class="content">
            <!-- <!-- this is the content of pagee .php -->
            <?php the_content(); ?> 
            <?php
            if (is_page('Contact')) {
               // Code specific to 'your-page-slug'
               get_template_part('inc/section', 'contact');
            } elseif (is_page('Blog')) {
               // Code specific to 'another-page'
               get_template_part('inc/section','blog');
            } else {
               // Default code for other pages
               echo "This is a generic page.";
            }
            ?>

         </div>
      </article>
   <?php endwhile; ?>
</div>


<?php get_footer() ?>