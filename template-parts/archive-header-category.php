<header class="post list-header">
    <div class="row column">
    	<h1 class="title title-large"><?php echo single_cat_title('', false); ?></h1>
    	<?php
$header_description = term_description();
if (!empty($header_description)): ?>

    	<p class="list-header-description"><?php echo $header_description; ?></p>

    	<?php
endif;
?>
    </div>
</header>
