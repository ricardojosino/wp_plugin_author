<?php

    use RJ\Author\Authors\Site\Component\ComponentWidget;

    class RJ_AuthorResponsible extends WP_Widget
    {

        // DESCRIÇÃO DO WIDGET
        public function __construct()
        {
            $id = 'widget-rj_author_responsible';
            $name = 'Autor Responsável';
            $description = array('description' => 'Exibe um perfil do autor');

            parent::__construct($id, $name, $description);
        }


        // HTML DO WIDGET
        public function widget($arqs, $instance)
        {
            $widget = new ComponentWidget();
            $widget->setInstance($instance);
            $widget->run();

            echo $widget->getRender();
        }


        // FORMULÁRIO DE CONFIGURAÇÃO DO WIDGET
        public function form($instance)
        {

            echo 'Widget instalado';
        }


        // SALVA OS DADOS DE CONFIGURAÇÃO
        public function update($data, $old_data)
        {


        }


    };


    // REGISTRA O WIDGET NO WORDPRESS
    add_action('widgets_init', function() {

        register_widget('RJ_AuthorResponsible');

    }, 5, null);