<?php

$term = get_queried_object();
$tax_image = get_field('taxonomy_image', $term);

if ($tax_image) {
    $class = 'with-image';
    $attribute = ' style="background-image:url(' . $tax_image['url'] . ')"';
} else {
    $class = '';
    $attribute = '';
}

?><header class="post list-header <?=$class?>" <?=$attribute?>>
    <div class="row column">
	<div class="list-header-content">
	<h1 class="title title-large"><small>Photo collection</small><?php echo single_term_title('', false); ?></h1>
	<?php
$header_description = term_description();
if (!empty($header_description)): ?>
	<p class="list-header-description"><?php echo $header_description; ?></p>
	<?php
endif;
?>
</div></div>
</header>
