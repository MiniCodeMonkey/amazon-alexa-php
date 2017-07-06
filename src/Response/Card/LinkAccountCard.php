<?php

namespace Alexa\Response\Card;

class LinkAccountCard extends AbstractCard {

    public function __construct() {
        $this->type = 'LinkAccount';
    }

    public function render() {
        return [
            'type' => $this->getType(),
        ];
    }

}
