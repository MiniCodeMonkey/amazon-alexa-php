<?php

namespace Alexa\Request;

class LaunchRequest extends Request {
	public $applicationId;

	public function __construct($data) {
		parent::__construct($data);

		$this->applicationId = $data['session']['application']['applicationId'];
	}
}
