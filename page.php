<?php
get_header();
while (have_posts()) {
    the_post();
    pageBanner([
    //the below sets custom values
    //    'title' => 'This is the custom title',
    //    'subtitle' => 'custom subtitle',
    //    'photo' => '#'
    ]);
    ?>


    <div class="container container--narrow page-section">
        <?php
        $the_parent = wp_get_post_parent_id(get_the_ID());
        if ($the_parent) { ?>
            <div class="metabox metabox--position-up metabox--with-home-link">
                <p>
                    <a class="metabox__blog-home-link" href="<?php echo get_permalink($the_parent); ?>">
                        <i class="fa fa-home" aria-hidden="trues"></i> Back to <?php echo get_the_title($the_parent); ?>
                    </a> <span class="metabox__main"><?php the_title(); ?></span>
                </p>
            </div>
        <?php }
        ?>
        <?php
        $testArray = get_pages(array(
            'child_of' => get_the_ID()
        ));
        if ($the_parent or $testArray) { ?>
            <div class="page-links">
                <h2 class="page-links__title"><a href="<?php get_permalink($the_parent) ?>"><?php echo get_the_title($the_parent) ?></a></h2>
                <ul class="min-list">
                    <?php
                    if ($the_parent) {
                        $findChildOf = $the_parent;
                    } else {
                        $findChildOf = get_the_ID();
                    }
                    wp_list_pages(array(
                        'title_li' => NULL,
                        'child_of' => $findChildOf,
                        'sort_column' => 'menu_order'
                    ));
                    ?>
                </ul>
            </div>
        <?php } ?>
        <div class="generic-content">
            <?php the_content(); ?>
        </div>
    </div>
<?php
}
get_footer();
?>
