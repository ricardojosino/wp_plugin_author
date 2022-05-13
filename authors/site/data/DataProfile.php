<?php

    namespace RJ\Author\Authors\Site\Data;

    class DataProfile
    {

        // 01
        private $mode = RJ_AUTHOR_MODE;
        private $url = RJ_AUTHOR_URL . '/authors';
        private $dir = RJ_AUTHOR_DIR . '/authors';
        private $post_type = 'rj_author';


        // 02
        private function item($id, $name, $description, $image)
        {
            return [
                'id' => $id,
                'name' => $name,
                'description' => $description,
                'image' => $image,
            ];
        }

        private function dataDev()
        {
            return $this->item(1, 'Pedro Henrique', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ac enim sem. Curabitur nec pretium tortor, a aliquet quam.', $this->url . '/site/asset/img/sample.jpg');
        }

        private function dataProduction()
        {

            $current_post = get_post(get_the_ID());

            $post_id = get_field('author', $current_post->ID);
            $post = get_post($post_id) ?? false;

            $name = $post->post_title ?? null;
            $description = get_field('description', $post_id) ?? null;
            $image = get_field('image', $post_id)['url'] ?? null;

            if($post_id) :
                return $this->item($post_id, $name, $description, $image);
                    else :
                return false;
            endif;

        }

        private function getData()
        {
            if($this->mode == 'dev') :
                return $this->dataDev();

            else :
                return $this->dataProduction();
            endif;
        }

        //03
        public function get()
        {
            return $this->getData();
        }


    }