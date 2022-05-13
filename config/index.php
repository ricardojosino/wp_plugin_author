<?php

    header('Content-type: text/plain; charset=utf-8');

    // CONSTANTES
    define('RJ_AUTHOR_NAME', 'rj-author'); // Nome do plugin. (Mesmo nome da pasta do plugin)
    define('RJ_AUTHOR_TITLE', 'Autores'); // Nome em texto
    define('RJ_AUTHOR_MODE', 'production'); // dev, test, production
    define('RJ_AUTHOR_VERSION', 3); // Versão do plugin. é inserido na versão dos assets também.
    define("RJ_AUTHOR_DIR", WP_PLUGIN_DIR . '/' . RJ_AUTHOR_NAME);
    define("RJ_AUTHOR_URL", WP_PLUGIN_URL . '/' . RJ_AUTHOR_NAME);

    // ACF
    include 'acf.php';