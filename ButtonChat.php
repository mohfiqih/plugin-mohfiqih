<?php
/*
Plugin Name: Button Sosial Media
Description: Belajar Membuat Plugin WP
Version: 1.0
Author: Moh. Fiqih Erinsyah
Author URI: https://mohfiqih.github.io/portofolio/
*/

class ButtonChat {
    public function __construct() {
        // Bootstrap
        add_action('wp_enqueue_scripts', array($this, 'enqueue_bootstrap'));

        // Admin Notice
        add_action('admin_notices', array($this, 'plugin_chat'));
    }

    public function plugin_chat() {
        include(plugin_dir_path(__FILE__) . 'view/button_sosmed.php');
    }

    public function enqueue_bootstrap() {
            wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
            wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery'), null, true);
    }
}

$advanced_popup_plugin = new ButtonChat();