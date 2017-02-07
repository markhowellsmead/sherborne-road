<header class="post list-header">
	<h1 class="title title-large"><small>Portfolio entries relating to</small><?php echo single_term_title('', false);?></h1>
	<?php
    $header_description = term_description();
    if (!empty($header_description)):?>
	<h2 class="description"><?php echo $header_description;?></h2>
	<?php
    endif;
    ?>
</header>
