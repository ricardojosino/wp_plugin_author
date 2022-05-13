<?php

    // Plugin Name:       Autores de artigos
    // Plugin URI:        https://ricardojosino.com.br
    // Description:       Abre a possibilidade de criar uma lista de autores e vincular ao artigo de forma independente do usuario do WordPress. Você poderá inserir um widget no template single do blog para exibir um responsável pelo conteúdo do artigo. Usado muito em artigos para saúde.
    // Version:           1
    // Requires PHP:      7.0
    // Author:            Ricardo Josino
    // Author URI:        https://ricardojosino.com.br
    // License:           GPL v2 or later
    // License URI:       https://www.gnu.org/licenses/gpl-2.0.html
    // Text Domain:       rj-author
    // Domain Path:       /languages

    // CONFIG
    include 'config/index.php';

    // MÓDULOS

    // Módulo principal
    include 'authors/index.php';