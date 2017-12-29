<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();


// Adding actions to display custom elements
// on the content top area
add_action( 'royal_content_top', 'royal_header_title', 5 );


function royal_body_class() {
	$body_classes = array();
	$body_classes[] = sprintf( 'sliding-desktop-%s', royal_option( 'sliding__menuDesktop' ) );
	$body_classes[] = sprintf( 'sliding-%s', royal_option( 'sliding__menuStyle' ) );

	return join( ' ', apply_filters( 'royal_body_class', $body_classes ) );
}


function royal_sidebar_position() {
	return apply_filters( 'royal_sidebar_position', royal_option( 'global__sidebar__position' ) );
}


function royal_sidebar_id() {
	return apply_filters( 'royal_sidebar_id', 'primary' );
}


function royal_has_sidebar() {
	return royal_sidebar_position() != 'none';
}


function royal_header_title() {
	if ( ( is_front_page() && royal_option( 'header__titlebar__home' ) == 'off' ) || royal_option( 'header__titlebar' ) == 'none' ) {
		return;
	}

	get_template_part( 'tmpl/header-title' );
}


/**
 * An action callback to display the comments list and
 * comment form
 * 
 * @return  void
 * @since   1.0.0
 */
function royal_comments_list() {
	if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
		return;
	}
	
	// If comments are open or we have at least one comment, load up the comment template.
	if ( is_singular() && ( comments_open() || get_comments_number() ) ) {
		comments_template();
	}
}


/**
 * An action callback to display the related posts content
 * at the bottom of the page.
 * 
 * @return  void
 * @since   1.0.0
 */
function royal_related_posts() {
	if ( is_single() ) {
		get_template_part( 'tmpl/post/content-related' );
	}
}


/**
 * The helper function to show the pagination bar
 * on the blog pages
 * 
 * @param   WP_Query  $query  The custom query
 * @return  void
 * @since   1.0.0
 */
function royal_pagination( $query = null ) {
	global $wp_query;

	if ( ! ( $query instanceOf WP_Query ) )
		$query = &$wp_query;

	// Don't print empty markup if there's only one page.
	if ( $query->max_num_pages < 2 ) return;

	if ( is_page_template() )
		$paged = get_query_var( 'page' ) ? intval( get_query_var( 'page' ) ) : 1;
	else
		$paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	// Set up paginated links.
	$links = paginate_links( array(
		'total'    => $query->max_num_pages,
		'current'  => $paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '&larr; Previous', 'royal' ),
		'next_text' => __( 'Next &rarr;', 'royal' ),
	) );

	$numeric_links = paginate_links( array(
		'total'    => $query->max_num_pages,
		'current'  => $paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_next' => false
	) );

	$next_link    = get_next_posts_link( __( 'Next &rarr;', 'royal' ), $query->max_num_pages );
	$prev_link    = get_previous_posts_link( __( '&larr; Previous', 'royal' ) );
	$more_link    = get_next_posts_link( __( 'Load More', 'royal' ), $query->max_num_pages );
	$paging_style = royal_option( 'paging-style' );

	if ( $paging_style == 'pager' && ! ( empty( $next_link ) && empty( $prev_link ) ) ) {
		printf( '<nav class="navigation paging-navigation pager">
			<div class="pagination loop-pagination">%s %s</div>
		</nav>', $prev_link, $next_link );
	}
	elseif ( $paging_style == 'numeric' && ! empty( $numeric_links ) ) {
		printf( '<nav class="navigation paging-navigation numeric">
			<div class="pagination loop-pagination">%s</div>
		</nav>', $numeric_links );
	}
	elseif ( $paging_style == 'loadmore' && ! empty( $next_link ) ) {
		printf( '<nav class="navigation paging-navigation loadmore">
			<div class="pagination loop-pagination">%s</div>
		</nav>', $more_link );
	}
	elseif ( ! empty( $links ) ) {
		printf( '<nav class="navigation paging-navigation pager-numeric">
			<div class="pagination loop-pagination">%s</div>
		</nav>', $links );
	}
}


/**
 * The helper function which get the post content
 * and apply the filters before output it into the browser
 * 
 * @return  void
 * @since   1.0.0
 */
function royal_the_content() {
	$content = call_user_func_array( 'get_the_content', func_get_args() );
	$content = apply_filters( 'the_content', $content );
	$content = apply_filters( 'royal_the_content', $content );
	$content = str_replace( ']]>', ']]&gt;', $content );

	echo wp_kses_post( $content );
}


/**
 * Display the current page title on the header
 * 
 * @return  void
 * @since   1.0.0
 */
function royal_header_page_title() {
	global $wp_query;
	
	$title = '';
	$subtitle = '';

	if ( is_singular() ) {
		$title = get_the_title();
		$subtitle = '';

		if ( function_exists( 'get_field' ) ) {
			if ( $custom_title = get_field( 'title' ) ) {
				$title = $custom_title;
			}

			if ( $custom_subtitle = get_field( 'subtitle' ) ) {
				$subtitle = $custom_subtitle;
			}
		}
	}
	elseif ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
		if ( is_shop() ) {
			$title = get_page( get_option( 'woocommerce_shop_page_id' ) )->post_title;
		}
		elseif ( is_tax() ) {
			$title = get_queried_object()->name;
		}
	}
	elseif ( is_tax() || is_category() || is_tag() ) {
		$prefix = esc_html__( 'Archive for: ', 'royal' );

		if ( is_category() )
			$prefix = esc_html__( 'Archive for category: ', 'royal' );
		
		if ( is_tag() )
			$prefix = esc_html__( 'Archive for tag: ', 'royal' );
		
		$title = $prefix . get_queried_object()->name;
	}
	elseif ( is_year() ) {
		$title = sprintf( esc_html__( 'Archive for year: %s', 'royal' ), get_the_time( 'Y' ) );
	}
	elseif ( is_month() ) {
		$title = sprintf( esc_html__( 'Archive for month: %s', 'royal' ), get_the_time( 'F, Y' ) );
	}
	elseif ( is_day() || is_time() ) {
		$title = sprintf( esc_html__( 'Archive for date: %s', 'royal' ), get_the_time( 'F d, Y' ) );
	}
	elseif ( is_home() ) {
		if ( get_option( 'show_on_front' ) == 'page' ) {
			$page = get_page( get_option( 'page_for_posts' ) );
			$title = $page->post_title;

			if ( function_exists( 'get_field' ) ) {
				if ( $custom_title = get_field( 'title', $page->ID ) ) {
					$title = $custom_title;
				}

				if ( $custom_subtitle = get_field( 'subtitle', $page->ID ) ) {
					$subtitle = $custom_subtitle;
				}
			}	
		}
		else {
			$title = __( 'Blog', 'royal' );
		}
	}
	elseif ( is_author() ) {
		$title = sprintf( esc_html__( 'Archive for author: %s', 'royal' ), get_user_option( 'display_name', get_query_var( 'author' ) ) );
	}
	elseif ( is_search() ) {
		$keyword = get_query_var( 's' );
		$post_count = $wp_query->found_posts;
		
		if ( $post_count <= 1 )
			$title = sprintf( esc_html__( '%d search result for "%s"', 'royal' ), $post_count, $keyword );
		else
			$title = sprintf( esc_html__( '%d search results for "%s"', 'royal' ), $post_count, $keyword );
	}
	elseif ( is_post_type_archive() ) {
		$post_type        = royal_current_post_type();
		$post_type_object = get_post_type_object( $post_type );
		$title            = $post_type_object->labels->singular_name;

		if ( $post_type == 'postfolio' ) {
			$title = royal_option( 'portfolio_page_title', $post_type_object->labels->singular_name );
		}
	}
	elseif ( is_404() ) {
		$title = esc_html__( '404 - Page Not Found', 'royal' );
	}

	if ( ! empty( $subtitle ) ) {
		$subtitle = sprintf( '<p class="subtitle">%s</p>', $subtitle );
	}
	
	printf( '<h1 class="page-title-inner">%s</h1>%s', esc_html( $title ), $subtitle );
}
