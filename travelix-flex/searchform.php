<?php
/** Search form. @package Travelix_Flex */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label><span class="screen-reader-text"><?php esc_html_e( 'جستجو برای:', 'travelix-flex' ); ?></span><input type="search" class="search-field" placeholder="<?php esc_attr_e( 'نام تور، مقصد یا مقاله…', 'travelix-flex' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s"></label>
	<button type="submit" class="search-submit"><?php esc_html_e( 'جستجو', 'travelix-flex' ); ?></button>
</form>

