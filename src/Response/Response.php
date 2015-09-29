<?php

namespace Alexa\Response;

class Response {
	public $version = '1.0';
	public $sessionAttributes = [];

	public $outputSpeech = null;
	public $card = null;
	public $reprompt = null;
	public $shouldEndSession = false;

	public function __construct() {
		$this->outputSpeech = new OutputSpeech;
	}

	public function respond($text) {
		$this->outputSpeech = new OutputSpeech;
		$this->outputSpeech->text = $text;

		return $this;
	}

	public function reprompt($text) {
		$this->reprompt = new Reprompt;
		$this->reprompt->outputSpeech->text = $text;

		return $this;
	}

	public function withCard($title, $content = '') {
		$this->card = new Card;
		$this->card->title = $title;
		$this->card->content = $content;
		
		return $this;
	}

	public function endSession($shouldEndSession = true) {
		$this->shouldEndSession = $shouldEndSession;

		return $this;
	}

	public function render() {
		return [
			'version' => $this->version,
			'sessionAttributes' => $this->sessionAttributes,
			'response' => [
				'outputSpeech' => $this->outputSpeech ? $this->outputSpeech->render() : null,
				'card' => $this->card ? $this->card->render() : null,
				'reprompt' => $this->reprompt ? $this->reprompt->render() : null,
				'shouldEndSession' => $this->shouldEndSession ? true : false
			]
		];
	}
}