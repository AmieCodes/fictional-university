<?php
get_header();

    While(have_posts()) {
        the_post();  ?>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2> <!--This pulls the title and makes it a link-->
        <?php the_content(); ?>  <!--This pulls the content-->
    <?php }

get_footer();
?>
