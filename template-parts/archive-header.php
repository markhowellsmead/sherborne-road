<?php

if (have_posts()){
	
	if( is_category() ){

		get_template_part('template-parts/archive-header-category');

	}else if( is_tag() ){

		get_template_part('template-parts/archive-header-tag');

	}else if( is_tax('collection') ){

		get_template_part('template-parts/archive-header-collection');

	}else if( is_year() ){

		get_template_part('archive-header-year');

	}else if( is_month() ){

		get_template_part('archive-header-month');

	}else if( is_day() ){

		get_template_part('archive-header-day');

	}else if( is_search() ){

		get_template_part('archive-header-search');

	}

}