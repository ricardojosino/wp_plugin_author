<?php

new class
{

    public $post_type = 'rj_author';

    public function labels()
    {

        return [

            'name' => 'Autores', //nome geral para o tipo de postagem, geralmente plural.
            'singular_name' => 'Autor', //nome para um objeto deste tipo de postagem.
            'menu_name' => 'Autor', // Nome exibido no menu sidebar do painel
            'name_admin_bar' => 'Autor', // Cadeia de caracteres para uso em Novo na barra de menus do administrador. O padrão é o mesmo que 'singular_name'
            'add_new' => 'Adicionar novo',  // o texto adicionar novo. O padrão é "Adicionar novo"
            'add_new_item' => 'Novo',
            'edit_item' => 'Editar',
            'new_item' => 'Novo autor',
            'view_item' => 'Visualizar',
            'view_items' => null, // Rótulo para visualizar arquivos do tipo post.
            'search_items' => 'Pesquisar autores',
            'not_found' => 'Nenhum autor encontrado',
            'not_found_in_trash' => 'Nenhum autor encontrado',
            'parent_item_colon' => null,
            'all_items' => 'Todos', // Para submenu
            'archives' => null, // Sequência para uso com arquivos nos menus de navegação. O padrão é Post Archives / Page Archives.
            'attributes' => null, //Rótulo para a caixa meta de atributos. O padrão é 'Post Attributes' / 'Page Attributes'.
            'insert_into_item' => '', // String para o botão do quadro de mídia. O padrão é Inserir no post / Inserir na página.
            'uploaded_to_this_item' => '',  // String para o filtro de quadro de mídia. O padrão é enviado para esta postagem / Enviado para esta página.
            'featured_image' => 'Imagem de capa', // O padrão é a Imagem de capa.
            'set_featured_image' => 'Definir imagem de capa', // O padrão é Definir imagem de capa.
            'remove_featured_image' => 'Remover imagem de capa', // O padrão é Remover imagem de capa.
            'use_featured_image' => 'Usar como imagem de capa', // O padrão é Usar como imagem de capa
            'filter_items_list' => null, // String para a tabela exibe o cabeçalho oculto.
            'items_list_navigation' => null, // String para o cabeçalho oculto da paginação da tabela.
            'items_list' => null, // String para o cabeçalho oculto da tabela.
            'filter_by_date' => null,
            'item_published' => null,
            'item_published_privately' => null,
            'item_reverted_to_draft' => null,
            'item_scheduled' => null,
            'item_updated' => null,
            'item_link' => null,
            'item_link_description' => null,

        ];


    }

    public function config()
    {
        return [

            'labels'             => $this->labels(),
            'public'             => true, // Controla como o tipo é visível para os autores (show_in_nav_menus, show_ui) e leitores (exclude_from_search, publicly_queryable).
            'publicly_queryable' => true, // Se as consultas podem ser realizadas no front end como parte de parse_request ().
            'show_ui'            => true, // Se deve gerar uma interface do usuário padrão para gerenciar esse tipo de postagem no admin.
            'show_in_menu'       => true, // Onde mostrar o tipo de postagem no menu do administrador. show_ui deve ser verdadeiro.
            'show_in_nav_menus' => true, // Se post_type está disponível para seleção nos menus de navegação.
            'show_in_admin_bar' => null, // Seja para disponibilizar esse tipo de postagem na barra de administração do WordPress.
            'menu_position'      => 5, // A posição no menu ordenar o tipo de postagem deve aparecer.
            'show_in_rest' => true, // Se deseja incluir o tipo de postagem na API REST. Defina como true para que o tipo de postagem esteja disponível no editor de blocos.
            'rest_base' => null, // Para alterar o URL base da rota da API REST. O padrão é $ post_type.
            'rest_controller_class' => null, // Nome da classe do Controlador da API REST. O padrão é ' WP_REST_Posts_Controller '.
            'menu_icon' => 'dashicons-groups', // A URL para o ícone a ser usado para este menu ou o nome do ícone do iconfont
            'capability_type'    => 'post', // Tipo de estrutura de conteúdo. post, page
            'hierarchical'       => false, // Se o tipo de postagem é hierárquico (por exemplo, página). Permite que o pai seja especificado. O parâmetro 'supports' deve conter 'page-attributes' para mostrar a caixa de seleção pai na página do editor. Padrão: falso
            'has_archive'        => false, // Define se é do tipo archive
            'rewrite'            => null, // Aciona o processamento de reescritas para esse tipo de postagem. Para evitar reescritas, defina como falso.
            'query_var'          => true, // Fica disponivel na query principal.
            'exclude_from_search' => true, // Exclue da query search.
            'supports'           => [ 'title'], // title, editor, author, thumbnail, excerpt, trackbacks, custom-fields, comments, revisions, page-attributes, post-formats

        ];
    }


    public function __construct()
    {
        add_action('init', function() {
            register_post_type($this->post_type, $this->config());
        }, 1);


    }

};