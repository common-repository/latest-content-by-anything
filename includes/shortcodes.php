<?php
/**
 * Shortcode function for displaying latest content by anything
 *
 * @param array $atts Shortcode attributes.
 * @return string       Generated HTML output.
 */
function latest_content_by_anything_shortcode($atts)
{
    $atts = shortcode_atts(
        array(
            'num_items' => 5,
            'post_type' => 'post',
            'taxonomy' => '',
            'term' => '',
            'thumbnail_size' => 'thumbnail',
            'excerpt_length' => 100,
            'display_titles' => 'true',
            'layout' => 'vertical', // Default layout is vertical
            'hide_price' => 'false', // New attribute to hide/show price
            'design' => '', // Design attribute
        ),
        $atts
    );

    // Check if the add-on is active
    $is_addon_active = is_plugin_active('latest-content-by-anything-pro/latest-content-by-anything-pro.php');

    // Sanitize inputs
    $num_items = absint($atts['num_items']);
    $post_type = sanitize_text_field($atts['post_type']);
    $taxonomy = sanitize_text_field($atts['taxonomy']);
    $term = sanitize_text_field($atts['term']);
    $thumbnail_size = sanitize_text_field($atts['thumbnail_size']);
    $excerpt_length = absint($atts['excerpt_length']);
    $display_titles = ($atts['display_titles'] == 'true') ? true : false;
    $layout_class = $atts['layout'] === 'horizontal' ? 'horizontal-layout' : 'vertical-layout';
    $hide_price = ($atts['hide_price'] == 'true') ? true : false;

    // If the add-on is active and design attribute is provided, use it, otherwise use the default
    $design = '';
    if ($is_addon_active && isset($atts['design']) && !empty($atts['design'])) {
        $design = sanitize_text_field($atts['design']);
    } elseif ($is_addon_active) {
        $design = 'vertical-1'; // Default design option
    }

    // Query arguments
    $args = array(
        'post_type' => $post_type,
        'posts_per_page' => $num_items,
        'tax_query' => array(),
    );

    // Add taxonomy query if provided
    if (!empty($taxonomy) && !empty($term)) {
        $args['tax_query'][] = array(
            array(
                'taxonomy' => $taxonomy,
                'field' => 'slug',
                'terms' => $term,
            ),
        );
    }

    // Query content
    $query = new WP_Query($args);

    // Output
if ($query->have_posts()) {
    $output = '<div class="latest-content ' . esc_attr($layout_class) . ' ' . esc_attr($design) . '">';

    while ($query->have_posts()) {
        $query->the_post();

        // Get the current post ID
        $post_id = get_the_ID();

        // Initialize product if the post type is 'product'
        $product = null;
        if ($post_type === 'product') {
            $product = wc_get_product($post_id);
        }

        $output .= '<div class="content-item">';

        // Display the post's featured image with a permalink
        $output .= '<a href="' . esc_url(get_permalink()) . '">';
        if (has_post_thumbnail()) {
            $output .= get_the_post_thumbnail($post_id, $thumbnail_size);
        }
        $output .= '</a>';

        // Display the post title if required
        if ($display_titles) {
            $output .= '<h3 class="content-title"><a href="' . esc_url(get_permalink()) . '">' . get_the_title() . '</a></h3>';
        }

        // Display the post excerpt if a length is specified
        if ($excerpt_length > 0) {
            $output .= '<div class="content-excerpt">' . wp_trim_words(get_the_excerpt(), $excerpt_length) . '</div>';
        }

        // Display the product price if applicable
        if (!$hide_price && $product && $product->get_price_html()) {
            $output .= '<div class="product-price">' . $product->get_price_html() . '</div>';
        }

        $output .= '</div>'; // Close content-item
    }

    $output .= '</div>'; // Close latest-content
    wp_reset_postdata(); // Reset post data
} else {
    // Display a "no content" message if no posts are found
    $output = esc_html__('No content found.', 'latest-content-by-anything');
}

return $output;

}
add_shortcode('latest_content_by_anything', 'latest_content_by_anything_shortcode');
?>