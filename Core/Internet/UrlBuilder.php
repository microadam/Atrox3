<?php
/**
 * @author Paul Serby <paul.serby@clock.co.uk>
 * @copyright Clock Limited 2011
 * @version 3.2 - $Revision: 777 $ - $Date: 2008-10-30 12:49:04 +0000 (Thu, 30 Oct 2008) $
 * @package Internet
 */
class UrlBuilder {

	/**
	 *
	 * @var string
	 */
	protected $url;

	/**
	 * @var array
	 */
	protected $queryStringParameters;

	/**
	 * @var string
	 */
	protected $protocol;

	/**
	 * @var string
	 */
	protected $username;

	/**
	 * @var string
	 */

	protected $password;

	/**
	 * @var string
	 */
	protected $hostname;

	/**
	 * @var string
	 */
	protected $port;

	/**
	 * @var string
	 */
	protected $path;

	/**
	 * @var string
	 */
	protected $hash;

	public function __construct($url) {
		$this->setUrl($url);
	}

	/**
	 *
	 * @return string The reconstructed url
	 */
	public function __toString() {

		$queryString = "";
		if (count($this->queryStringParameter) > 1) {
			$queryString = "?" . http_build_query($this->queryStringParameter);
		}

		return $protocol . "://" .
			($this->username ? $this->username . ($this->password ? ":{$this->password}" : "") . "@" : "") .
			$this->hostname .
			$this->path .
			$queryString .
			($this->hash ? "#{$hash}" : "");

	}

	public function setUrl($url) {
		$urlParts = parse_url($url);
		$this->protocol = $urlParts["scheme"];
		$this->hostname = $urlParts["host"];
		$this->port = $urlParts["port"];
		$this->user = $urlParts["user"];
		$this->password = $urlParts["pass"];
		$this->path = $urlParts["path"];
		$this->queryStringParameters = parse_str($urlParts["query"]);
	}

	/**
	 * Gets $url
	 * @return string
	 */
	public function getUrl() {
		return $this->__toString();
	}

	/**
	 * Sets a single query string parameter
	 * @param $queryStringParameters
	 * @return UrlBuilder
	 */
	 public function setQueryStringParameter($key, $value) {
		$this->queryStringParameters[$key] = $value;
		return $this;
	}

	/**
	 * Sets $queryStringParameters
	 * @param $queryStringParameters
	 * @return UrlBuilder
	 */
	 public function setQueryStringParameters($queryStringParameters) {
		$this->queryStringParameters = parse_str($queryStringParameters);
		return $this;
	}

	/**
	 * Gets $queryStringParameters
	 * @return
	 */
	public function getQueryStringParameters() {
		return http_build_query($this->queryStringParameters);
	}

	/**
	 * Sets $protocol
	 * @param $protocol
	 * @return UrlBuilder
	 */
	 public function setProtocol($protocol) {
		$this->protocol = $protocol;
		return $this;
	}

	/**
	 * Gets $protocol
	 * @return
	 */
	public function getProtocol() {
		return $this->protocol;
	}

	/**
	 * Sets $username
	 * @param $username
	 * @return UrlBuilder
	 */
	 public function setUsername($username) {
		$this->username = $username;
		return $this;
	}

	/**
	 * Gets $username
	 * @return
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * Sets $password
	 * @param $password
	 * @return UrlBuilder
	 */
	 public function setPassword($password) {
		$this->password = $password;
		return $this;
	}

	/**
	 * Gets $password
	 * @return
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * Sets $hostname
	 * @param $hostname
	 * @return UrlBuilder
	 */
	 public function setHostname($hostname) {
		$this->hostname = $hostname;
		return $this;
	}

	/**
	 * Gets $hostname
	 * @return
	 */
	public function getHostname() {
		return $this->hostname;
	}

	/**
	 * Sets $port
	 * @param $port
	 * @return UrlBuilder
	 */
	 public function setPort($port) {
		$this->port = $port;
		return $this;
	}

	/**
	 * Gets $port
	 * @return
	 */
	public function getPort() {
		return $this->port;
	}

	/**
	 * Sets $path
	 * @param $path
	 * @return UrlBuilder
	 */
	 public function setPath($path) {
		$this->path = $path;
		return $this;
	}

	/**
	 * Gets $path
	 * @return
	 */
	public function getPath() {
		return $this->path;
	}

	/**
	 * Sets $hash
	 * @param string $hash
	 * @return UrlBuilder
	 */
	 public function setHash($hash) {
		$this->hash = $hash;
		return $this;
	}

	/**
	 * Gets $hash
	 * @return string
	 */
	public function getHash() {
		return $this->hash;
	}

}