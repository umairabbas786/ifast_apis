<?php

class PostedAds extends ElectroApi {

    protected function onDevise() {
        $this->resSendOK([
            'eevee' => 'Hi i\'m PostedAds agent.'
        ]);
    }
}
