<?php

namespace Alexa\Request;

use RuntimeException;
use InvalidArgumentException;
use DateTime;

abstract class Request {
	const TIMESTAMP_VALID_TOLERANCE_SECONDS = 30;

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

	public function validate() {
		$this->validateTimestamp();
	}

	private function validateTimestamp() {
		$now = new DateTime;
		$differenceInSeconds = $now->getTimestamp() - $this->timestamp->getTimestamp();

		if ($differenceInSeconds > self::TIMESTAMP_VALID_TOLERANCE_SECONDS) {
			throw new InvalidArgumentException('Request timestamp was too old. Possible replay attack.');
		}
	}
}
