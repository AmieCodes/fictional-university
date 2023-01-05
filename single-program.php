<?php

//the_ID(); //shows the page id number.
get_header();

while (have_posts()) {
    the_post();
    pageBanner();
    ?>

    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('program'); ?>">
                    <i class="fa fa-home" aria-hidden="trues"></i> All Programmes
                </a> <span class="metabox__main"><?php the_title() ?></span>
            </p>
        </div>
        <div class="generic-content"><?php the_content(); ?></div>


          <?php
            //******* PROFESSORS ******* -->//
            $relatedProfessors = new WP_Query([
            'posts_per_page' => -1,
            'post_type' => 'professor',
            'orderby' => 'title',//orders by name
            'order' => 'ASC',
            'meta_query' => [
              [
               'key'=> 'related_programs',
               'compare'=> 'LIKE',
               'value'=> '"' . get_the_ID() . '"' //find the right related program in the database
              ]
            ]
          ]);

          if ($relatedProfessors->have_posts()) {
              echo '<hr class="section-break">';
          echo '<h4 class="headline headline--medium">' . get_the_title() . ' Professors </h4';

          echo '<ul class="professor-cards">';
          while ($relatedProfessors->have_posts()) {
              $relatedProfessors->the_post(); ?>
            <li class="professor-card__list-item">
                <a class="professor-card" href="<?php the_permalink(); ?>">
                    <img class="professor-card__image" src="<?php the_post_thumbnail_url('professorLandscape'); ?>">
                    <span class="professor-card__name"><?php the_title(); ?></span>
                </a>
            </li>
          <?php }
          echo '</ul>';
          }

          wp_reset_postdata(); //resets code so the next lot is pulled through - needed for multiple querys on a page.

            //******* EVENTS ******* -->//
            $today = date('Ymd');
            $homepageEvents = new WP_Query(['posts_per_page' => 2,
              'post_type' => 'event',
              'meta_key' => 'event_date',
              'orderby' => 'meta_value_num',
              'order' => 'ASC',
              'meta_query' => [
                [
                  'key' => 'event_date',
                  'compare' => '>=',
                  'value' => $today,
                  'type' => 'numeric'
                ],
                [
                 'key'=> 'related_programs',
                 'compare'=> 'LIKE',
                 'value'=> '"' . get_the_ID() . '"' //find the right related program in the database
                ]
              ]
            ]);

            if ($homepageEvents->have_posts()) {
                echo '<hr class="section-break">';
            echo '<h4 class="headline headline--medium"> Upcoming ' . get_the_title() . ' Events </h4';

            while ($homepageEvents->have_posts()) {
                $homepageEvents->the_post(); ?>
                <div class="event-summary">
                    <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
                        <span class="event-summary__month"><?php
                        $eventDate = new DateTime(get_field('event_date'));
                        echo $eventDate->format('M');
                         ?></span>
                        <span class="event-summary__day"><?php
                        echo $eventDate->format('d');
                        ?></span>
                    </a>

                    <div class="event-summary__content">
                        <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php
                        the_title(); ?></a></h5>
                        <p><?php if (has_excerpt()) {
                            echo get_the_excerpt();
                          } else {
                            echo wp_trim_words(get_the_content(), 18);
                          } ?><a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a></p>
                    </div>
                </div>
            <?php }
            }


            wp_reset_postdata();

            ?> <!-- ***** END OF WHILE LOOP  Events ***** -->
        </div>
<?php }

get_footer();

?>
