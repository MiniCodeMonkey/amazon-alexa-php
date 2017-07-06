<?php

namespace Alexa\Response\Card;

abstract class AbstractCard {

	public $type = 'Simple';
	public $title = '';
	public $content = '';

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

	public function render() {
		return [
			'type' => $this->type,
			'title' => $this->title,
			'content' => $this->content,
		];
	}

}
