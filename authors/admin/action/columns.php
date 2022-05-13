<?php


    new class
    {

        //01
        public $post_type = 'rj_author';


        //02
        public function Columns($columns)
        {

            $columns = [

                'cb' => null,
                'img' => 'Capa',
                'title' => 'Título',

            ];

            return $columns;
        }

        public function Sortable( $columns )
        {
            $columns['title'] = 'title';

            return $columns;
        }

        public function CustomColumns( $column, $post_id )
        {

            if($column == 'img') :
                $url = get_field('image')['url'] ?? null;
                if($url) :
                    echo '<img style="width: 60px; height: auto" src="' . $url . '">';
                endif;
            endif;

        }

        public function Style()
        {

            global $post;
            $post_type = $_GET['post_type'] ?? $post->post_type ?? null;

            if($post_type == $this->post_type) :

                add_action('admin_head', function() {

                    $css[] = '<style>';
                    $css[] = '.column-img { width: 100px }';
                    $css[] = '.column-crm { width: 150px }';
                    $css[] = '</style>';

                    echo join(' ', $css);


                });

            endif;
        }

        //03
        public function __construct()
        {
            add_filter( 'manage_' . $this->post_type . '_posts_columns' , [$this, 'Columns'], 10);
            add_filter( 'manage_edit-' . $this->post_type . '_sortable_columns' , [$this, 'Sortable'], 10);
            add_action( 'manage_' . $this->post_type . '_posts_custom_column', [$this, 'CustomColumns'], 10, 2 );
            $this->Style();

        }

    };