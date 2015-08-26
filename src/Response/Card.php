<?php

namespace Alexa\Response;

class Card {
	public $type = 'Simple';
	public $title = '';
	public $content = '';

	public function render() {
		return [
			'type' => $this->type,
			'title' => $this->title,
			'content' => $this->content,
		];
	}
}