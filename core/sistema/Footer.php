<?php


namespace core\sistema;


class Footer {

    private $js = [];
    private $instance = null;

    public function getInstance() {
        if ($this->instance !== null) {
            return $this->instance;
        } else {
            return new Footer();
        }
    }

    public function setJS($path) {
        $this->js[] = $path;
    }

    public function getJS() {
        return $this->js;
    }
}
