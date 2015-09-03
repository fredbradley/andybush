<?php
show_admin_bar(false);
require_once(dirname(__FILE__).'/included-plugins/plugin-includes.php');
function theme_name_scripts() {
//	wp_enqueue_style( 'strap_style', get_template_directory_uri().'/style.css' );
	wp_enqueue_style('google-fonts', 'http://fonts.googleapis.com/css?family=Vast+Shadow|Oswald|Playfair+Display:400,700|Playfair+Display+SC:400,700');
//	wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );


function bush_footer_widgets_init() {
	for ($i = 1; $i <= 4; $i++) {
		register_sidebar( 
			array(
				'name'          => esc_html__( 'Footer Widgets '.$i, '_s' ),
				'id'            => 'footer-widgets-'.$i,
				'description'   => 'For widgets... in the footer!',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h1 class="widget-title">',
				'after_title'   => '</h1>',
			)
		);
	}
	
}
add_action( 'widgets_init', 'bush_footer_widgets_init');

function copyright($from=2014) {
	if (date("Y")==$from) {
		$dates = date("Y");
	} else {
		$dates = $from." - ".date("Y");
	}
	return "&copy; Copyright ".$dates;
}

if ( ! function_exists( '_s_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function _s_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<!--<time class="entry-date published" datetime="%1$s">%2$s</time>--><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', '_s' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', '_s' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
	
		$categories_list = get_the_category_list( esc_html__( ', ', '_s' ) );
		if ( $categories_list && _s_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', '_s' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', '_s' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . '<i class="fa fa-fw fa-tags"></i> %1$s' . '</span>', $tags_list ); // WPCS: XSS OK.
		}


	echo '<span class="posted-on"><i class="fa fa-fw fa-clock-o"></i>' . $posted_on . '</span>';
	//<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

