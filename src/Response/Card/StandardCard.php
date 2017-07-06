<?php

namespace Alexa\Response\Card;

class StandardCard extends AbstractCard {

    protected $text = '';
    protected $smallImageUrl = '';
    protected $largeImageUrl = '';

    public function __construct()
    {
        $this->title = 'Standard';
    }

    /**
     * @return string
     */
    public function getSmallImageUrl()
    {
        return $this->smallImageUrl;
    }

    /**
     * @param string $smallImageUrl
     */
    public function setSmallImageUrl($smallImageUrl)
    {
        $this->smallImageUrl = $smallImageUrl;
    }

    /**
     * @return string
     */
    public function getLargeImageUrl()
    {
        return $this->largeImageUrl;
    }

    /**
     * @param string $largeImageUrl
     */
    public function setLargeImageUrl($largeImageUrl)
    {
        $this->largeImageUrl = $largeImageUrl;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    public function render() {
        return [
            'type' => $this->getType(),
            'title' => $this->getTitle(),
            'text' => $this->getText(),
            'image' => [
                'smallImageUrl' => $this->getSmallImageUrl(),
                'largeImageUrl' => $this->getLargeImageUrl()
            ]
        ];
    }

}