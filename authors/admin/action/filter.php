<?php

    new class
    {

        public $post_type = 'rj_author';
        public $dir = RJ_AUTHOR_DIR;

        public function filter()
        {
            $search = $_GET['s'] ?? null;
            include $this->dir . '/authors/admin/view/filter.php';
        }

        public function style()
        {
            add_action('admin_head', function() {

                $css[] = '<style>';
                $css[] = '.column-img { width: 100px }';
                $css[] = '.column-crm { width: 150px }';
                $css[] = '.column-specialties { width: 400px }';
                $css[] = '.tablenav {height: auto !important}';
                $css[] = '#post-search-input {display: none !important}';
                $css[] = '#search-submit {display: none !important}';
                $css[] = '</style>';

                echo join(' ', $css);


            });
        }


        public function __construct()
        {
            $post_type = $_GET['post_type'] ?? null;

            if($this->post_type == $post_type) :
                add_action('restrict_manage_posts', [$this, 'filter']);
                $this->style();
            endif;
        }

    };