<?php


class HelloWorld extends ElectroApi {

    protected function onDevise() {
        $this->resSendOK([
            'Hello' => 'World'
        ]);
    }
}