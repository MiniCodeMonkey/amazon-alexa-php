<?php

namespace Alexa\Request;

class SessionEndedRequest extends Request {
	public $reason;

	public function __construct($data) {
		parent::__construct($data);

		$this->reason = $data['request']['reason'];
	}
}