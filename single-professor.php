<?php
get_header();
while (have_posts()) {
    the_post(); ?>
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg') ?>)"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php the_title(); ?></h1>
            <div class="page-banner__intro">
                <p>Replace later!</p>
            </div>
        </div>
    </div>
    <div class="container container--narrow page-section">
        <div class="generic-content">
            <div class="row-group">
                <div class="one-third">
                    <?php the_post_thumbnail(); ?>
                </div>
                <div class="two-thirds">
                    <?php the_content(); ?>
                </div>
            </div>

        <?php
      //echo  "\n" ;
       echo 123456 ;/* **** had to put this in so 'subjects taught' - is in correct place? get help with this later**** */

            $relatedPrograms = get_field('related_programs');

            if ($relatedPrograms){
                echo '<hr class="section-break">';
                echo '<h4 class="headline healine--medium"> Subect(s) Taught </h4>';
                echo '<ul class="link-list min-list">';
                foreach($relatedPrograms as $program) { ?>
                <li><a href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program); ?></a></li>
                <?php  }
                echo '</ul>';
                }
            //print_r($relatedPrograms); -**** Allows to look inside a variable ****
        ?>
        </div>
    </div>
<?php
}
get_footer();
?>
