<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package nevler
 */
?>
<?php get_template_part('modules/header/head'); ?>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site container">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'nevler' ); ?></a>

    <?php get_template_part('modules/header/jumbosearch'); ?>

    <?php get_template_part('modules/header/masthead'); ?>

	<?php if (has_header_image()) : ?>
	<div id="header-image">
		<img src="<?php header_image(); ?>" width="100%">
	</div>
	<?php endif; ?>

    <?php get_template_part('modules/header/top','bar'); ?>

    <?php //get_template_part('modules/social/social','fa'); ?>
    <div id="social-icons">
        <?php get_template_part('modules/social/social', 'fa'); ?>
        <div id="top-search-form"><?php get_search_form(); ?></div>
    </div>

	
	<div class="mega-container">
			
		<?php get_template_part('framework/featured-components/featured', 'area1'); ?>
	
		<div id="content" class="site-content container">