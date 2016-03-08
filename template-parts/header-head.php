<?php
/**
 * The needed <head> part of every HTML document.
 *
 * @package Penguin Gold
 */
?>

<!DOCTYPE html>
<?php tha_html_before(); ?>
<html <?php language_attributes(); ?> class="no-js">
<head>
<?php tha_head_top(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php tha_head_bottom(); ?>
<?php wp_head(); ?>
</head>