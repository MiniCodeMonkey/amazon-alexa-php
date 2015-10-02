<?php

namespace Alexa\Request;

use RuntimeException;
use DateTime;

abstract class Request {
	public $requestId;
	public $timestamp;
	public $user;

	public function __construct($data) {
		$this->requestId = $data['request']['requestId'];
		$this->timestamp = new DateTime($data['request']['timestamp']);
		$this->user = new User($data['session']['user']);
	}

	public static function fromData($data) {
		$requestType = $data['request']['type'];

		if (!class_exists('\\Alexa\\Request\\' . $requestType)) {
			throw new RuntimeException('Unknown request type: ' . $requestType);
		}

		$className = '\\Alexa\\Request\\' . $requestType;

		$request = new $className($data);
		return $request;
	}
}