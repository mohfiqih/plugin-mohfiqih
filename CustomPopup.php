<?php
/*
Plugin Name: Custom Popup Plugin
Description: Plugin untuk menampilkan pop-up kustom.
Version: 1.0
Author: Moh. Fiqih Erinsyah
Author URI: https://mohfiqih.github.io/portofolio/
*/

// Daftarkan Custom Post Type (CPT)
add_action('init', 'custom_popup_plugin_register_cpt');
function custom_popup_plugin_register_cpt() {
    $labels = array(
        'name'               => _x('Pop Ups', 'post type general name', 'custom-popup-plugin'),
        'singular_name'      => _x('Pop Up', 'post type singular name', 'custom-popup-plugin'),
        'menu_name'          => _x('Pop Ups', 'admin menu', 'custom-popup-plugin'),
        'name_admin_bar'     => _x('Pop Up', 'add new on admin bar', 'custom-popup-plugin'),
        'add_new'            => _x('Add New', 'pop up', 'custom-popup-plugin'),
        'add_new_item'       => __('Add New Pop Up', 'custom-popup-plugin'),
        'new_item'           => __('New Pop Up', 'custom-popup-plugin'),
        'edit_item'          => __('Edit Pop Up', 'custom-popup-plugin'),
        'view_item'          => __('View Pop Up', 'custom-popup-plugin'),
        'all_items'          => __('All Pop Ups', 'custom-popup-plugin'),
        'search_items'       => __('Search Pop Ups', 'custom-popup-plugin'),
        'not_found'          => __('No pop ups found', 'custom-popup-plugin'),
        'not_found_in_trash' => __('No pop ups found in trash', 'custom-popup-plugin')
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'pop-up'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'thumbnail'),
    );

    register_post_type('custom_popup', $args);
}

// Tambahkan bidang kustom untuk menentukan halaman tampilan Pop Up
add_action('add_meta_boxes', 'custom_popup_plugin_meta_boxes');
function custom_popup_plugin_meta_boxes($post) {
    add_meta_box('custom_popup_page_box', 'Display Page', 'custom_popup_page_box_callback', 'custom_popup', 'side');
}

function custom_popup_page_box_callback($post) {
    // Tampilkan daftar halaman untuk memilih halaman tampilan
    $pages = get_pages();
    $selectedPageId = get_post_meta($post->ID, 'custom_popup_page', true);
    ?>
    <label for="custom_popup_page">Select Page:</label>
    <select name="custom_popup_page" id="custom_popup_page">
        <option value="">Select</option>
        <?php
        foreach ($pages as $page) {
            echo '<option value="' . esc_attr($page->ID) . '" ' . selected($selectedPageId, $page->ID, false) . '>' . esc_html($page->post_title) . '</option>';
        }
        ?>
    </select>

    <?php if (!empty($selectedPageId)) : ?>
        <div class="custom-popup" data-popup-page-id="<?php echo esc_attr($selectedPageId); ?>">
            <p>This is a custom Pop Up for the selected page.</p>
        </div>
    <?php endif;
}

// Simpan data halaman tampilan Pop Up saat Pop Up disimpan
add_action('save_post', 'custom_popup_plugin_save_meta');
function custom_popup_plugin_save_meta($post_id) {
    if (isset($_POST['custom_popup_page'])) {
        update_post_meta($post_id, 'custom_popup_page', sanitize_text_field($_POST['custom_popup_page']));
    }
}

// Tambahkan skrip JavaScript untuk menampilkan Pop Up
add_action('wp_enqueue_scripts', 'custom_popup_plugin_enqueue_scripts');
function custom_popup_plugin_enqueue_scripts() {
    if (is_single() && get_post_type() === 'custom_popup') {
        wp_enqueue_script('custom-popup-plugin', plugin_dir_url(__FILE__) . 'js/popup.js', array('jquery'), '1.0', true);
    }
}
