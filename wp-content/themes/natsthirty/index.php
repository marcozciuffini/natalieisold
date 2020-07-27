<?php get_header(); ?>

<section class="main">


    <?php while (have_posts()) : the_post(); ?>

    <div class="full-page page-header wigglies">
        <div class="page-title">
            <?php echo get_the_title() ?>
        </div>
        <div class="page-intro">
            <p><?php the_field('header_description'); ?></p>
        </div>
        <div class="<?php if (!is_page('70')) : ?>page-image<?php else : ?>art-image<?php endif;?>" >
            <img src="<?php the_field('header_image'); ?>" alt="page-header-image"/>
        </div>
    </div>

    <div class="theme-page wigglies-page">
            <?php the_content(); ?>
    </div>

        <?php endwhile; ?>

</section>

<?php get_footer(); ?>

