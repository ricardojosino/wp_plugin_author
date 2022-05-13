<?php

    new class
    {

        public $post_type = 'post';


        public function group()
        {

            $config = [

                'key' => 'group_rj_author_post_author', // (string) Identificador exclusivo para grupo de campos. Deve começar com 'group_'
                'title' => 'Responsável pelo conteúdo', // (string) Título do metabox
                'fields' => [], // (array) Uma matriz de campos
                'location' => [
                    [
                        ['param' => 'post_type', 'operator' => '==', 'value' => $this->post_type]
                    ]
                ], // (array) Um array contendo 'grupos de regras' onde cada 'grupo de regras' é um array contendo 'regras'. Cada grupo é considerado um 'ou' e cada regra é considerada um 'e'.
                'menu_order' => 2, // (int) Os grupos de campos são mostrados em ordem do menor para o maior. Padrões para 0
                'position' => 'normal',  // (string) Determina a posição na tela de edição. Padrões para normal. Opções de 'acf_after_title', 'normal' ou 'side'
                'style' => 'default', // (string) Determina o estilo da metabox. O padrão é 'padrão'. Opções de 'default' ou 'seamless'
                'label_placement' => 'top', // (string) Determina onde os rótulos de campo são colocados em relação aos campos. O padrão é 'top'. Opções de 'top' (acima dos campos) ou 'left' (ao lado dos campos)
                'instruction_placement' => 'label', // (string) Determina onde as instruções de campo são colocadas em relação aos campos. O padrão é 'label'. Opções de 'label' (abaixo dos rótulos) ou 'field' (abaixo dos campos)
                'hide_on_screen' => null, // (array) Uma matriz de elementos para ocultar na tela

            ];

            acf_add_local_field_group($config);
            $this->fieldAuthors();

        }

        public function fieldAuthors()
        {

            $config = [
                'key' => 'field_rj_author_post_author', // (string) Identificador exclusivo do campo. Deve começar com 'field_
                'label' => 'Autor', // (string) Rótulo do campo
                'name' => 'author', // (string) Usado para salvar e carregar dados. Palavra única, sem espaços. Sublinhados e traços permitidos
                'type' => 'select', // (string) Tipo de campo (texto, área de texto, imagem, etc)
                'parent' => 'group_rj_author_post_author', // Nome da chave do grupo que esse campo pertecence
                'instructions' => '', // (string) Instruções para autores. Exibido ao enviar dados
                'required' => 0, // (int) Se o valor do campo é obrigatório ou não. Padrões para 0
                'conditional_logic' => 0, // (misto) Ocultar ou mostrar condicionalmente este campo com base nos valores de outro campo. Melhor usar a interface do usuário do ACF e exportar para entender a estrutura da matriz. Padrões para 0
                'wrapper' => ['width' => '', 'class' => '', 'id' => ''], // (array) Um array de atributos dados ao elemento de campo
                'default_value' => null, // (misto) Um valor padrão usado pelo ACF se nenhum valor ainda foi salvo
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
                'readonly' => false,
                'disabled' => false,
                'choices' => $this->listAuthors(),
            ];

            acf_add_local_field($config);

        }

        public function listAuthors()
        {

            $config = [
                'post_type' => 'rj_author',
                'orderby' => 'title',
                'order' => 'asc',
                'post_status' => 'publish'
            ];

            $query = get_posts($config);

            $list[''] = 'Nenhum responsável';

            if($query) :

                foreach($query as $item) :
                    $list[$item->ID] = $item->post_title;
                endforeach;

            endif;


            return $list;

        }

        public function __construct()
        {

            add_action('acf/init', [$this, 'group'], 10 );
        }

    };