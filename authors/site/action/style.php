<?php

    add_action('wp_enqueue_scripts', function() {

        // nome único, diretório, versão, tipo de midia
        wp_enqueue_style( 'rj_author_authors_site', RJ_AUTHOR_URL . '/authors/site/asset/css/style.css', [], RJ_AUTHOR_VERSION, 'all' );

    });