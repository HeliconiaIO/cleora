<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cleora
 */
 
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header class="relative">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'cleora' ); ?></a>
		<div class="max-w-7xl mx-auto px-4 sm:px-6">
			<div x-data="{ open: false }" class="flex flex-col md:items-center md:justify-between md:flex-row border-b-2 border-gray-200">
				<div class="py-2 flex flex-row items-center justify-between">
					<div href="#" class="text-2xl font-semibold text-gray-600	focus:outline-none focus:shadow-outline">
						<?php
						if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) { ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand" rel="home"><?php the_custom_logo(); ?></a>
						<?php }else{ ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand" rel="home"><?php bloginfo( 'name' ); ?></a>
						<?php }
						?>
					</div>
					<button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
						<svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
							<path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
							<path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
						</svg>
					</button>
				</div>
				
				<nav :class="{'flex': open, 'hidden': !open}" class="flex-col md:flex-1 pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
				<?php
					wp_nav_menu( array(
							'theme_location'    => 'primary',
							'depth'             => 2,
							'container'         => '',
							'container_class'   => '',
							'container_id'      => 'cleoraHeader',
							'menu_class'        => 'header-menu',
							'items_wrap'        => '%3$s',
							'walker'            => new Cleora_Nav_Walker(),
					) );
				?>
				</nav>

				<nav class="hidden md:flex items-center justify-end md:flex-1 lg:w-0 space-x-4">
					<?php $facebookLink = get_theme_mod('cleora_header_facebook');
					if( !empty($facebookLink) ) { ?>
					<a href="<?php print esc_url($facebookLink); ?>">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current rounded-sm">
							<path
								d="M0 0v24h24v-24h-24zm16 7h-1.923c-.616 0-1.077.252-1.077.889v1.111h3l-.239 3h-2.761v8h-3v-8h-2v-3h2v-1.923c0-2.022 1.064-3.077 3.461-3.077h2.539v3z">
							</path>
						</svg>
					</a>
					<?php } ?>
					<?php $twitterLink = get_theme_mod('cleora_header_twitter');
					if( !empty($twitterLink) ) { ?>
					<a href="<?php print esc_url($twitterLink); ?>">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current rounded-sm">
							<path
								d="M0 0v24h24v-24h-24zm18.862 9.237c.208 4.617-3.235 9.765-9.33 9.765-1.854 0-3.579-.543-5.032-1.475 1.742.205 3.48-.278 4.86-1.359-1.437-.027-2.649-.976-3.066-2.28.515.098 1.021.069 1.482-.056-1.579-.317-2.668-1.739-2.633-3.26.442.246.949.394 1.486.411-1.461-.977-1.875-2.907-1.016-4.383 1.619 1.986 4.038 3.293 6.766 3.43-.479-2.053 1.079-4.03 3.198-4.03.944 0 1.797.398 2.396 1.037.748-.147 1.451-.42 2.085-.796-.245.767-.766 1.41-1.443 1.816.664-.08 1.297-.256 1.885-.517-.44.656-.997 1.234-1.638 1.697z">
							</path>
						</svg>
					</a>
					<?php } ?>
					<?php $linkedLink = get_theme_mod('cleora_header_linked');
					if( !empty($linkedLink) ) { ?>
					<a href="<?php print esc_url($linkedLink); ?>">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current rounded-sm">
							<path
								d="M0 0v24h24v-24h-24zm8 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.397-2.586 7-2.777 7 2.476v6.759z">
							</path>
						</svg>
					</a>
					<?php } ?>
					<?php $instaLink = get_theme_mod('cleora_header_instagram');
					if( !empty($instaLink) ) { ?>
					<a href="<?php print esc_url($instaLink); ?>">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current rounded-sm">
							<path
								d="M14.667 12c0 1.473-1.194 2.667-2.667 2.667-1.473 0-2.667-1.193-2.667-2.667 0-1.473 1.194-2.667 2.667-2.667 1.473 0 2.667 1.194 2.667 2.667zm3.846-3.232c.038.843.046 1.096.046 3.232s-.008 2.389-.046 3.233c-.1 2.15-1.109 3.181-3.279 3.279-.844.038-1.097.047-3.234.047-2.136 0-2.39-.008-3.232-.046-2.174-.099-3.181-1.132-3.279-3.279-.039-.845-.048-1.098-.048-3.234s.009-2.389.047-3.232c.099-2.152 1.109-3.181 3.279-3.279.844-.039 1.097-.047 3.233-.047s2.39.008 3.233.046c2.168.099 3.18 1.128 3.28 3.28zm-2.405 3.232c0-2.269-1.84-4.108-4.108-4.108-2.269 0-4.108 1.839-4.108 4.108 0 2.269 1.84 4.108 4.108 4.108 2.269 0 4.108-1.839 4.108-4.108zm1.122-4.27c0-.53-.43-.96-.96-.96s-.96.43-.96.96.43.96.96.96c.531 0 .96-.43.96-.96zm6.77-7.73v24h-24v-24h24zm-4 12c0-2.172-.009-2.445-.048-3.298-.131-2.902-1.745-4.52-4.653-4.653-.854-.04-1.126-.049-3.299-.049s-2.444.009-3.298.048c-2.906.133-4.52 1.745-4.654 4.653-.039.854-.048 1.127-.048 3.299 0 2.173.009 2.445.048 3.298.134 2.906 1.746 4.521 4.654 4.654.854.039 1.125.048 3.298.048s2.445-.009 3.299-.048c2.902-.133 4.522-1.745 4.653-4.654.039-.853.048-1.125.048-3.298z">
							</path>
						</svg>
					</a>
					<?php } ?>
					<?php $youtubeLink = get_theme_mod('cleora_header_youtube');
					if( !empty($youtubeLink) ) { ?>
					<a href="<?php print esc_url($youtubeLink); ?>">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current rounded-sm">
							<path
								d="M10 9.333l5.333 2.662-5.333 2.672v-5.334zm14-9.333v24h-24v-24h24zm-4 12c-.02-4.123-.323-5.7-2.923-5.877-2.403-.164-7.754-.163-10.153 0-2.598.177-2.904 1.747-2.924 5.877.02 4.123.323 5.7 2.923 5.877 2.399.163 7.75.164 10.153 0 2.598-.177 2.904-1.747 2.924-5.877z">
							</path>
						</svg>
					</a>
					<?php } ?>
				</nav>

			</div>
		</div>
	</header>
