<?php

    // Inclua o plug-in ACF.
    include_once( WP_PLUGIN_DIR . '/rj-author/includes/acf/' . 'acf.php' );

    // Personalize a configuração de URL para corrigir URLs de recursos incorretos.
    add_filter('acf/settings/url', function($url) {
        return WP_PLUGIN_URL . '/rj-author/includes/acf/';
    });

    // (Opcional) Oculte o item de menu de administração do ACF.
    add_filter('acf/settings/show_admin', function($show_admin) {
        return false;
    });

