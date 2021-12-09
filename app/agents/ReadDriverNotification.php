<?php

class ReadDriverNotification extends ElectroApi {

    protected function onDevise() {
        $this->resSendOK([
            'eevee' => 'Hi i\'m ReadDriverNotification agent.'
        ]);
    }
}
