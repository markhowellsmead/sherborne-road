<?php
/**
* Master row controller
* This file loads the sub parts, based on the selected row layout.
*
* @since 	15.2.2017
*/
if (get_field('rows')) {
    while (has_sub_field('rows')) {
        get_template_part('template-parts/row', get_row_layout());
    }
}
