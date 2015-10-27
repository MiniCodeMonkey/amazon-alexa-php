<?php

namespace Alexa\Request;

class IntentRequest extends Request {
	public $intentName;
	public $slots = [];

	public function __construct($data) {
		parent::__construct($data);

		$this->intentName = $data['request']['intent']['name'];

		if (isset($data['request']['intent']['slots'])) {
			foreach ($data['request']['intent']['slots'] as $slot) {
				if (isset($slot['value'])) {
					$this->slots[$slot['name']] = $slot['value'];
				}
			}
		}
	}
}