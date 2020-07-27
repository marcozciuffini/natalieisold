<footer style="background:<?php echo the_field('page_color'); ?>">
    <?php if (is_front_page()) : ?>
    <div class="footer">
        <div class="footer__title" style="background: #FFB6E1;"><?php echo the_field('footer_heading'); ?></div>
        <p><?php echo the_field('footer_description'); ?></p>
        <?php endif; ?>
        <div class="icons <?php if (!is_front_page()) : echo 'solo-icons'; endif; ?>">
            <?php if( get_field('wordpress', '22') ) { ?>
                <a href="<?php the_field('wordpress', '22'); ?>" target="_blank" class="footer__icon-background"><img src="<?php echo get_bloginfo('template_directory'); ?>/pictures/wordpress.png" class="icon"></a>
            <?php } ?>
            <?php if( get_field('instagram', '22') ) { ?>
                <a href="<?php the_field('instagram', '22'); ?>" target="_blank" class="footer__icon-background"><img src="<?php echo get_bloginfo('template_directory'); ?>/pictures/instagram.png" class="icon"></a>
            <?php } ?>
            <?php if( get_field('spotify', '22') ) { ?>
                <a href="<?php the_field('spotify', '22'); ?>" target="_blank" class="footer__icon-background"><img src="<?php echo get_bloginfo('template_directory'); ?>/pictures/spotify.png" class="icon"></a>
            <?php } ?>
        </div>
        <?php if (is_home()) : ?>
    </div>
<?php endif; ?>


</footer>
<?php wp_footer(); ?>
</body>
</html>
