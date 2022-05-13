<?php

    new class
    {

        public $post_type = 'rj_author';

        public function group()
        {

            $config = [

                'key' => 'group_rj_author_details', // (string) Identificador exclusivo para grupo de campos. Deve começar com 'group_'
                'title' => 'Descrição', // (string) Título do metabox
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
            $this->fieldDescription();
            $this->fieldImage();

        }

        public function fieldDescription()
        {

            $config = [
                'key' => 'field_rj_author_description', // (string) Identificador exclusivo do campo. Deve começar com 'field_
                'label' => 'Descrição', // (string) Rótulo do campo
                'name' => 'description', // (string) Usado para salvar e carregar dados. Palavra única, sem espaços. Sublinhados e traços permitidos
                'type' => 'textarea', // (string) Tipo de campo (texto, área de texto, imagem, etc)
                'parent' => 'group_rj_author_details', // Nome da chave do grupo que esse campo pertecence
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
                'rows' => 3,
            ];

            acf_add_local_field($config);


        }

        public function fieldImage()
        {

            $config = [
                'key' => 'field_rj_author_image', // (string) Identificador exclusivo do campo. Deve começar com 'field_
                'label' => 'Foto do perfil', // (string) Rótulo do campo
                'name' => 'image', // (string) Usado para salvar e carregar dados. Palavra única, sem espaços. Sublinhados e traços permitidos
                'type' => 'image', // (string) Tipo de campo (texto, área de texto, imagem, etc)
                'parent' => 'group_rj_author_details', // Nome da chave do grupo que esse campo pertecence
                'instructions' => 'Envie uma foto no formato jpg pequena e na proporção quadrada. Um bom tamanho seria 512 x 512 pixel', // (string) Instruções para autores. Exibido ao enviar dados
                'required' => 0, // (int) Se o valor do campo é obrigatório ou não. Padrões para 0
                'conditional_logic' => 0, // (misto) Ocultar ou mostrar condicionalmente este campo com base nos valores de outro campo. Melhor usar a interface do usuário do ACF e exportar para entender a estrutura da matriz. Padrões para 0
                'wrapper' => ['width' => '', 'class' => '', 'id' => ''], // (array) Um array de atributos dados ao elemento de campo
                'default_value' => null, // (misto) Um valor padrão usado pelo ACF se nenhum valor ainda foi salvo
                'preview_size' => 'thumbnail',
                'max_size' => '1000kb'
            ];

            acf_add_local_field($config);


        }


        public function __construct()
        {
            add_action('acf/init', [$this, 'group'], 10 );
        }


    };

