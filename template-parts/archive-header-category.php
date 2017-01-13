<header class="post list-header">
	<h1 class="title title-large"><?php echo single_cat_title('',false);?></h1>
	<?php 
	$header_description = term_description();
	if( !empty($header_description) ):?>

	<h2 class="description"><?php echo $header_description;?></h2>

	<?php
	endif;
	?>

</header>