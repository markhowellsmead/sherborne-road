<?php if (is_singular()) : ?>

    <?php if ($comments) : ?>

    	<div class="comments">

    		<h3 class="comment-reply-title"><?php _e('Comments', 'sherborne_road') ?></h3>

    		<?php wp_list_comments(array('style' => 'div')); ?>

    		<?php if (paginate_comments_links('echo=0')) : ?>

    			<div class="pagination"><?php paginate_comments_links(); ?></div>

    		<?php endif; ?>

    	</div> <!-- comments -->

    <?php endif; ?>

    <?php if (comments_open() || pings_open()) : ?>

    	<?php comment_form('comment_notes_before=&comment_notes_after='); ?>

    <?php endif; ?>

<?php endif; ?>
