<?php
/**
 * Hestia Header Layout Manager.
 *
 * @package Hestia
 */

/**
 * Class Hestia_Header_Layout_Manager
 */
class Hestia_Header_Layout_Manager extends Hestia_Abstract_Main {
	/**
	 * Init layout manager.
	 */
	public function init() {

		add_filter( 'get_the_archive_title', array( $this, 'filter_archive_title' ) );

		// Single Post
		add_action( 'hestia_before_single_post_wrapper', array( $this, 'post_page_header' ) );
		add_action( 'hestia_before_single_post_content', array( $this, 'post_page_before_content' ) );

		// Page
		add_action( 'hestia_before_single_page_wrapper', array( $this, 'post_page_header' ) );
		add_action( 'hestia_before_page_content', array( $this, 'post_page_before_content' ) );

		// Index
		add_action( 'hestia_before_index_wrapper', array( $this, 'post_page_header' ) );
		add_action( 'hestia_before_index_posts_loop', array( $this, 'maybe_render_header' ), 0 );
		add_action( 'hestia_before_index_content', array( $this, 'maybe_render_header' ), 0 );

		// WooCommerce
		add_action( 'hestia_before_woocommerce_wrapper', array( $this, 'post_page_header' ) );
		add_action( 'hestia_before_woocommerce_content', array( $this, 'post_page_before_content' ) );

		// Search
		add_action( 'hestia_before_search_wrapper', array( $this, 'generic_header' ) );
		// Attachment
		add_action( 'hestia_before_attachment_wrapper', array( $this, 'generic_header' ) );
		// Archive
		add_action( 'hestia_before_archive_content', array( $this, 'generic_header' ) );

		add_filter( 'hestia_header_layout', array( $this, 'get_header_layout' ) );
	}

	/**
	 * Remove "Category:", "Tag:", "Author:" from the archive title.
	 *
	 * @param string $title Archive title.
	 */
	public function filter_archive_title( $title ) {
		if ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_tag() ) {
			$title = single_tag_title( '', false );
		} elseif ( is_author() ) {
			$title = '<span class="vcard">' . get_the_author() . '</span>';
		} elseif ( is_year() ) {
			$title = get_the_date( 'Y' );
		} elseif ( is_month() ) {
			$title = get_the_date( 'F Y' );
		} elseif ( is_day() ) {
			$title = get_the_date( 'F j, Y' );
		} elseif ( is_post_type_archive() ) {
			$title = post_type_archive_title( '', false );
		} elseif ( is_tax() ) {
			$title = single_term_title( '', false );
		}
		return $title;
	}



	/**
	 * Get page specific layout or the customizer setting.
	 *
	 * @return string
	 */
	public function get_header_layout( $layout ) {
		$page_id = hestia_get_current_page_id();

		/**
		 * If it's blog, default will be 'default'
		 */
		if ( is_home() ) {
			$layout = 'default';
		}

		/**
		 * By default, get value from customizer. If it's cart or checkout, the default will be no-content.
		 */
		if ( class_exists( 'WooCommerce' ) ) {

			if ( is_cart() || is_checkout() ) {
				$layout = 'no-content';
			}

			if ( is_shop() ) {
				$layout = 'default';
			}

			if ( is_product() ) {
				return 'no-content';
			}
		}

		/**
		 * Try to get individual layout.
		 */
		$individual_layout = get_post_meta( $page_id, 'hestia_header_layout', true );
		return ! empty( $individual_layout ) ? $individual_layout : $layout;
	}

	/**
	 * The single post header.
	 */
	public function post_page_header() {
		$layout = apply_filters( 'hestia_header_layout', get_theme_mod( 'hestia_header_layout', 'default' ) );
		if ( $layout === 'classic-blog' ) {
			return;
		}
		$this->display_header( $layout, 'post' );
	}

	/**
	 * Single post before content.
	 * This function display the title in page if layout is not default.
	 */
	public function post_page_before_content() {
		$layout = apply_filters( 'hestia_header_layout', get_theme_mod( 'hestia_header_layout', 'default' ) );

		if ( $layout === 'default' ) {
			return;
		}
		echo $this->render_header( $layout );
	}

	/**
	 * Display page header on single page and on full width page template.
	 *
	 * @param string $layout header layout.
	 * @param string $type post / page / other.
	 */
	private function display_header( $layout, $type ) {
		echo '<div id="primary" class="' . esc_attr( $this->boxed_page_layout_class() ) . ' page-header header-small"
				' . $this->parallax_attribute() . '>';

		switch ( $type ) {
			case 'post':
			case 'page':
				if ( $layout !== 'no-content' ) {
					echo $this->render_header( $layout );
				}
				break;
			case 'generic':
				echo $this->render_header( $layout );
				break;
		}

		$this->render_header_background();
		echo '</div>';
	}

	/**
	 * Determine whether or not to add parallax attribute on header.
	 */
	private function parallax_attribute() {
		if ( class_exists( 'WooCommerce' ) && is_product() ) {
			return '';
		}
		return 'data-parallax="active"';
	}

	/**
	 * Decide if
	 */
	public function maybe_render_header() {
		$hook = current_action();
		if ( $hook === 'hestia_before_index_posts_loop' && hestia_featured_posts_enabled() !== false ) {
			$this->post_page_before_content();
		}
		if ( $hook === 'hestia_before_index_content' && hestia_featured_posts_enabled() === false ) {
			$this->post_page_before_content();
		}
	}

	/**
	 * Display header content based on layout.
	 */
	private function render_header( $layout ) {

		if ( is_attachment() ) {
			$layout = 'default';
		}

		$header_output  = $this->header_content( $layout );
		$header_output .= $this->maybe_render_post_meta( $layout );

		$image_url = $this->get_page_background();

		if ( ! empty( $image_url ) ) {
			$image_id   = attachment_url_to_postid( $image_url );
			$image1_alt = '';
			if ( $image_id ) {
				$image1_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
			}

			if ( $layout === 'classic-blog' && class_exists( 'WooCommerce' ) && ! is_product() && ! is_cart() && ! is_checkout() ) {
				$image_markup = '<img class="wp-post-image image-in-page" src="' . esc_url( $image_url ) . '" alt="' . esc_attr( $image1_alt ) . '">';
				if ( is_shop() ) {
					$image_markup = '<div class="col-md-12 image-in-page-wrapper">' . $image_markup . '</div>';
				}
				$header_output .= $image_markup;
			}
		}

		if ( $layout === 'default' ) {
			$header_output = '<div class="container"><div class="row"><div class="col-md-10 col-md-offset-1 text-center">' . $header_output . '</div></div></div>';
		}
		return $header_output;
	}

	/**
	 * Header content display.
	 *
	 * @param string $header_layout the header layout.
	 */
	private function header_content( $header_layout ) {

		$title_class = 'hestia-title';

		if ( $header_layout !== 'default' ) {
			$title_class .= ' title-in-content';
		}
		if ( class_exists( 'WooCommerce' ) && is_woocommerce() ) {
			$header_content_output  = '<div class="col-md-12">';
			$header_content_output .= '<h1 class="' . esc_attr( $title_class ) . '">';
			if ( is_shop() ) {
				$header_content_output .= woocommerce_page_title( false );
			}
			if ( is_product() || is_cart() || is_checkout() ) {
				$header_content_output .= the_title( '', '', false );
			}
			$header_content_output .= '</h1>';
			$header_content_output .= '</div>';
			return $header_content_output;
		}
		if ( is_archive() ) {
			$title                 = get_the_archive_title();
			$header_content_output = '';

			if ( ! empty( $title ) ) {
				$header_content_output .= '<h1 class="hestia-title">' . $title . '</h1>';
			}

			$description = get_the_archive_description();
			if ( $description ) {
				$header_content_output .= '<h5 class="description">' . $description . '</h5>';
			}
			return $header_content_output;
		}
		if ( is_search() ) {
			$header_content_output = '<h1 class="' . esc_attr( $title_class ) . '">';
			/* translators: search result */
			$header_content_output .= sprintf( esc_html__( 'Search Results for: %s', 'hestia' ), get_search_query() );
			$header_content_output .= '</h1>';
			return $header_content_output;
		}
		if ( is_front_page() && ( get_option( 'show_on_front' ) === 'posts' ) ) {
			$header_content_output  = '<h1 class="' . esc_attr( $title_class ) . '">';
			$header_content_output .= get_bloginfo( 'description' );
			$header_content_output .= '</h1>';

			return $header_content_output;
		}

		$entry_class = '';
		if ( ! is_page() ) {
			$entry_class = 'entry-title';
		}
		$header_content_output = '<h1 class="' . esc_attr( $title_class ) . ' ' . esc_attr( $entry_class ) . '">' . single_post_title( '', false ) . '</h1>';

		return $header_content_output;
	}

	/**
	 * Check if post meta should be displayed.
	 *
	 * @param string $header_layout the header layout.
	 */
	private function maybe_render_post_meta( $header_layout ) {
		if ( ! is_single() ) {
			return '';
		}

		if ( class_exists( 'WooCommerce' ) ) {
			if ( is_product() ) {
				return '';
			}
		}

		global $post;
		$post_meta_output = '';
		$author_id        = $post->post_author;
		$author_name      = get_the_author_meta( 'display_name', $author_id );
		$author_posts_url = get_author_posts_url( get_the_author_meta( 'ID', $author_id ) );

		if ( $header_layout === 'default' ) {
			$post_meta_output .= '<h4 class="author">';
		} else {
			$post_meta_output .= '<p class="author meta-in-content">';
		}

		$post_meta_output .= apply_filters(
			'hestia_single_post_meta',
			sprintf(
				/* translators: %1$s is Author name wrapped, %2$s is Date*/
				esc_html__( 'Published by %1$s on %2$s', 'hestia' ),
				/* translators: %1$s is Author name, %2$s is Author link*/
				sprintf(
					'<a href="%2$s" class="vcard author"><strong class="fn">%1$s</strong></a>',
					esc_html( $author_name ),
					esc_url( $author_posts_url )
				),
				/* translators: %s is Date */
				sprintf(
					'<time class="date updated published" datetime="%2$s">%1$s</time>',
					esc_html( get_the_time( get_option( 'date_format' ) ) ),
					esc_html( get_the_date( DATE_W3C ) )
				)
			)
		);
		if ( $header_layout === 'default' ) {
			$post_meta_output .= '</h4>';
		} else {
			$post_meta_output .= '</p>';
		}

		return $post_meta_output;
	}


	/**
	 * Add the class to account for boxed page layout.
	 *
	 * @return string
	 */
	private function boxed_page_layout_class() {
		$layout = get_theme_mod( 'hestia_general_layout', 1 );

		if ( isset( $layout ) && $layout == 1 ) {
			return 'boxed-layout-header';
		}

		return '';
	}


	/**
	 * Render the header background div.
	 */
	private function render_header_background() {
		$background_image            = apply_filters( 'hestia_header_image_filter', $this->get_page_background() );
		$customizer_background_image = get_background_image();

		$header_filter_div = '<div class="header-filter';

		/* Header Image */
		if ( ! empty( $background_image ) ) {
			$header_filter_div .= '" style="background-image: url(' . esc_url( $background_image ) . ');"';
			/* Gradient Color */
		} elseif ( empty( $customizer_background_image ) ) {
			$header_filter_div .= ' header-filter-gradient"';
			/* Background Image */
		} else {
			$header_filter_div .= '"';
		}
		$header_filter_div .= '></div>';

		echo apply_filters( 'hestia_header_wrapper_background_filter', $header_filter_div );

	}

	/**
	 * Get Woo category thumbnail.
	 */
	private function get_category_thumbnail( $term_id ) {
		if ( ! empty( $term_id ) ) {
			$category_thumbnail = get_term_meta( $term_id, 'thumbnail_id', true );
		}
		// Get product category's image
		return ! empty( $category_thumbnail ) ? wp_get_attachment_url( $category_thumbnail ) : false;
	}

	/**
	 * This is the single product header image.
	 * This function searches in all categories of a product for a thumbanil.
	 * If the category have a thumbnail, get the image and search further
	 * to find the last category that have a thumbnail.
	 *
	 * @return bool|string
	 */
	private function get_single_product_background() {
		// Bail if it's not WooCommerce or if not single product.
		if ( ! hestia_check_woocommerce() || ! is_product() ) {
			return false;
		}

		$terms = get_the_terms( get_queried_object_id(), 'product_cat' );
		if ( empty( $terms ) ) {
			return false;
		}

		$thumb_tmp = '';
		foreach ( $terms as $term ) {
			$categ_thumb = $this->get_category_thumbnail( $term->term_id );
			if ( ! empty( $categ_thumb ) ) {
				$thumb_tmp = $categ_thumb;
			}
		}
		return $thumb_tmp;
	}

	/**
	 *  This is the product category header image.
	 *
	 * @param string $shop_id Shop page id.
	 */
	private function get_product_category_background( $shop_id ) {
		// Bail if it's not WooCommerce or if not single product.
		if ( ! hestia_check_woocommerce() || ! is_product_category() ) {
			return false;
		}

		$category = get_queried_object();

		/**
		 * Try to get category thumbnail.
		 */
		$category_thumbnail = $this->get_category_thumbnail( $category->term_id );
		if ( ! empty( $category_thumbnail ) ) {
			return $category_thumbnail;
		}

		/**
		 * If category does not have a thumbnail, try to get page thumbnail
		 */
		if ( empty( $shop_id ) ) {
			return '';
		}

		$thumb_tmp = get_the_post_thumbnail_url( $shop_id );
		if ( ! empty( $thumb_tmp ) ) {
			return $thumb_tmp;
		}

		return '';
	}

	/**
	 * Get background for shop page.
	 *
	 * @param string $shop_id Shop page id.
	 *
	 * @return bool
	 */
	private function get_shop_page_background( $shop_id ) {
		// Bail if it's not WooCommerce or if not single product.
		if ( ! hestia_check_woocommerce() || empty( $shop_id ) ) {
			return false;
		}

		return get_the_post_thumbnail_url( $shop_id );
	}

	/**
	 * Get header background image for single page.
	 *
	 * @return false|string
	 */
	private function get_post_page_background() {

		if ( class_exists( 'WooCommerce' ) && is_product() ) {
			return false;
		}

		$pid = hestia_get_current_page_id();
		if ( empty( $pid ) ) {
			return false;
		}

		// Get featured image
		$thumb_tmp = get_the_post_thumbnail_url( $pid );
		if ( is_home() && 'page' === get_option( 'show_on_front' ) ) {
			$page_for_posts_id = get_option( 'page_for_posts' );
			if ( ! empty( $page_for_posts_id ) ) {
				$thumb_tmp = get_the_post_thumbnail_url( $page_for_posts_id );
			}
		}
		return $thumb_tmp;
	}


	/**
	 *  Handle Pages and Posts Header image.
	 *  Single Product: Product Category Image > Header Image > Gradient
	 *  Product Category: Product Category Image > Header Image > Gradient
	 *  Shop Page: Shop Page Featured Image > Header Image > Gradient
	 *  Blog Page: Page Featured Image > Header Image > Gradient
	 *  Single Post: Featured Image > Gradient
	 */
	private function get_page_background() {
		// Default header image
		$thumbnail                 = get_header_image();
		$use_header_image_sitewide = get_theme_mod( 'hestia_header_image_sitewide', false );
		// If the option to use Header Image Sitewide is enabled, return header image and exit function.
		if ( (bool) $use_header_image_sitewide === true ) {
			return esc_url( $thumbnail );
		}

		if ( class_exists( 'WooCommerce' ) ) {

			$shop_id = get_option( 'woocommerce_shop_page_id' );
			if ( is_product() ) {
				$thumbnail = $this->get_single_product_background();
				if ( ! empty( $thumbnail ) ) {
					return esc_url( $thumbnail );
				}
			}

			if ( is_product_category() ) {
				$thumbnail = $this->get_product_category_background( $shop_id );
				if ( ! empty( $thumbnail ) ) {
					return esc_url( $thumbnail );
				}
			}

			if ( is_shop() ) {
				$thumbnail = $this->get_shop_page_background( $shop_id );
				if ( ! empty( $thumbnail ) ) {
					return esc_url( $thumbnail );
				}
			}
		}

		$thumbnail = $this->get_post_page_background();
		if ( ! empty( $thumbnail ) ) {
			return esc_url( $thumbnail );
		}

		return esc_url( get_header_image() );

	}

	/**
	 * Generic header used for index | search | attachment | WooCommerce.
	 */
	public function generic_header() {
		$this->display_header( 'default', 'generic' );
	}
}
