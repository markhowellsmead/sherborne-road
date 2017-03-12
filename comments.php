<?php if (is_singular()): ?>

    <?php if (comments_open() || pings_open()): ?>

        <div class="comments aside">

            <div class="row column">
               <?php comment_form([
    'class_submit' => 'button',
    'title_reply_before' => '<h5>',
    'title_reply_after' => '</h5>',
]);?>
            </div>

            <?php if ($comments): ?>

                <div class="row column">

            		<h3 class="comment-reply-title"><?php _e('Comments', 'sherborne_road')?></h3>

            		<?php wp_list_comments(array('style' => 'div'));?>

            		<?php if (paginate_comments_links('echo=0')): ?>

            			<div class="pagination block-margin-after"><?php paginate_comments_links();?></div>

            		<?php endif;?>
                </div>

            <?php endif;?>

    	</div>

    <?php endif;?>

<?php endif;?>
