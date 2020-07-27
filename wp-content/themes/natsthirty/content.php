<?php while (have_posts()) : the_post(); ?>


    <div class="full-page page-header wigglies">
        <h1 class="page-title"><?php echo the_field('front_page_heading'); ?></h1>
        <img class="front-page-image" src="<?php the_field('front_page_image'); ?>" alt="front-page-image"/>
        <p style="height: 10%"></p>
    </div>
    <section class="wigglies-page">
        <div class="blurb">

            <h2 class="blurb__title"><?php echo the_field('blurb_heading'); ?></h2>
            <p class="blurb__description"><?php echo the_field('blurb_description'); ?></p>
        </div>
        <div class="videos__header">
            <h2 class="heading"><?php echo the_field('video_heading'); ?></h2>
            <p class="sub-heading"><?php echo the_field('video_description'); ?></p>
        </div>
        <div class="videos__container">
            <?php if (get_field('video')) : ?>
                <div class="video__container">
                    <img src="<?php echo get_bloginfo('template_directory'); ?>/pictures/tv.png"
                         class="video-background">
                    <iframe src="https://player.vimeo.com/video/427320253" class="video" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                    <p><a href="https://vimeo.com/427320253">Natalie</a></p>
                </div>
            <?php endif; ?>
        </div>
        <!--        <div class="full-page"></div>-->


        <div class="messages__header">
            <h2 class="messages__title"><?php echo the_field('wishes_heading'); ?></h2>
            <p class="messages__description"><?php echo the_field('wishes_description'); ?></p>
        </div>

    </section>
    <div class="message-form">
        <?php $fields = array(
            'author' => '<p class="message-form__author">' . '<label for="author">' . __('') . '</label>' .
                '<input class="message-form__author-textarea" id="author" name="author" type="text" size="27" aria-required="true" required="required" placeholder="Your Name... (required)"/></p>',
            'cookies' => '',
        );

        $comments_args = array(
            'fields' => $fields,
            'title_reply' => '',
            'label_submit' => '',
            'comment_notes_before' => '',
            'comment_notes_after' => '',
            'comment_field' => '<p class="message-form__content"><label for="comment">' . _x('', 'noun') . '</label>
        <textarea class="message-form__content-textarea" id="comment" name="comment" cols="50" rows="8" aria-required="true" required="true" placeholder="Write Your Message Here... (250 characters)"  maxlength="250"></textarea></p>',

        ); ?>

        <?php comment_form($comments_args); ?>

    </div>

    <?php $args = array(
    'status' => 'approve',
    'order' => 'ASC'
);

    // The comment Query
    $comments_query = new WP_Comment_Query;
    $comments = $comments_query->query($args);

    // Comment Loop
    if ($comments) :
        $index = 1; ?>


        <div class="lanterns__visible-container">
            <div class="lanterns__container">
                <?php
                foreach ($comments as $comment) : ?>

                    <div class="lantern__panel" id="panel_<?php echo $index; ?>">

                        <div class="lantern__comment">
                            <h3 class="lantern__comment-author" id="lantern_author_<?php echo $index; ?>">
                                <?php echo $comment->comment_author ?>
                            </h3>
                            <p class="lantern__comment-message" id="lantern_message_<?php echo $index; ?>">
                                <?php echo $comment->comment_content ?>
                            </p>
                        </div>
                        </p>
                        <div class="frame" id="frame_<?php echo $index; ?>"
                             onclick="showMessage(<?php echo $index; ?>)">
                            <div class="strip">
                                <div class="a"></div>
                                <div class="b"></div>
                                <div class="c"></div>
                                <div class="d"></div>
                                <div class="e"></div>
                                <div class="f"></div>
                                <div class="g"></div>
                                <div class="h"></div>
                                <div class="i"></div>
                                <div class="j"></div>
                                <div class="k"></div>
                                <div class="l"></div>
                                <div class="m"></div>
                                <div class="n"></div>
                                <div class="o"></div>
                                <div class="p"></div>
                                <div class="q"></div>
                                <div class="r"></div>
                                <div class="s"></div>
                                <div class="t"></div>
                                <div class="u"></div>
                                <div class="v"></div>
                                <div class="w"></div>
                                <div class="x"></div>
                            </div>
                        </div>
                    </div>

                    <?php $index++;
                endforeach; ?>
            </div>
            <div class="lanterns__buttons">
                <img src="<?php echo get_bloginfo('template_directory'); ?>/pictures/arrow.png"
                     onclick="changeLantern(-1)" alt="arrow-left" class="lanterns__arrow lanterns__arrow-left">
                <div class="lanterns__spanels">
                    <?php
                    $spanelIndex = 1;
                    foreach ($comments as $comment) : ?>
                        <span class="lanterns__spanel" id="lantern_spanel_<?php echo $spanelIndex; ?>"></span>
                        <?php $spanelIndex++ ?>
                    <?php endforeach; ?>
                </div>
                <img src="<?php echo get_bloginfo('template_directory'); ?>/pictures/arrow.png"
                     onclick="changeLantern(1)" alt="arrow-right" class="lanterns__arrow lanterns__arrow-right">
            </div>
        </div>

    <?php
    else :
        echo 'No comments found.';
    endif; ?>
    <div class="after-lanterns"></div>
<?php endwhile; ?>

