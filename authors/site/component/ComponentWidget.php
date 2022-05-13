<?php

    namespace RJ\Author\Authors\Site\Component;
    use RJ\Author\Authors\Site\Data\DataProfile;


    class ComponentWidget
    {

        // 01
        private $instance;
        private $dir = RJ_AUTHOR_DIR;
        private $view;
        private $render;


        // 02
        private function template()
        {
            ob_start();

            $getData = new DataProfile();
            $data = $getData->get();

            include $this->dir .  '/authors/site/view/widget-template-1.php';
            $this->view[] = ob_get_clean();
        }

        private function render()
        {
            if($this->view) :
                $this->render = join('', $this->view);
            endif;
        }


        //03
        public function setInstance($instance)
        {
            $this->instance = $instance;
        }

        public function getRender()
        {
            return $this->render;
        }

        public function run()
        {
            $this->template();
            $this->render();
        }


    }