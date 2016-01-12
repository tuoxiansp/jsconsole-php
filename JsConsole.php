<?php
//chenyutong@baixing.com

class JsConsole {

	const URL_REMOTE = 'http://jsconsole.com/remote/';

	private static function getRemoteLogUrl ($sessionId) {
		return self::URL_REMOTE . $sessionId . '/log';
	}

	private static function getFormattedLog ($content, $type = '') {
		return json_encode([
			'response' => $content,
			'cmd' => 'remote console.log',
			'type' => $type
		]);
	}

	public static function log ($content, $sessionId) {
		\HttpClient::post(self::getRemoteLogUrl($sessionId), ['data' => self::getFormattedLog($content)]);
	}

	public static function info ($content, $sessionId) {
		\HttpClient::post(self::getRemoteLogUrl($sessionId), ['data' => self::getFormattedLog($content, 'info')]);
	}

	public static function error ($content, $sessionId) {
		\HttpClient::post(self::getRemoteLogUrl($sessionId), ['data' => self::getFormattedLog($content, 'error')]);
	}
}