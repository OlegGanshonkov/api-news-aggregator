<?php

require_once(MainParams::root() . '/services/selling-platforms/interfaces/RequestInterface.php');

/**
 * Class BaseApi
 */
abstract class BaseApi implements RequestInterface
{
    /**
     * Base api url
     * @var string
     */
    protected $baseUrl = '';

    /**
     * Method url
     * @var string
     */
    protected $url = '';

    /**
     * Request headers
     * @var array
     */
    protected $headers = [];

    /**
     * GET params
     * @var array
     */
    protected $params = [];

    /**
     * @var ApiUserInterface
     */
    protected $user;

    /**
     * @var bool
     */
    protected $isAuthorized = false;

    /**
     * @var string
     */
    protected $token;

    /**
     * @param ApiUserInterface $apiUser
     * @throws Exception
     */
    function __construct(ApiUserInterface $apiUser)
    {
        $this->user = $apiUser;
        if (!$this->auth($apiUser)) {
            throw new Exception('Failed authorization');
        }
    }

    /**
     * Authorization
     * @param ApiUserInterface $apiUser
     * @return bool
     */
    abstract protected function auth(ApiUserInterface $apiUser): bool;

    /**
     * @return bool|string
     * @throws Exception
     */
    public function get()
    {
        if ($this->params) {
            $url = $this->baseUrl . $this->url . '?';
            foreach ($this->params as $key => $param){
                foreach ($param as $paramKey => $paramItem){
                    $url .= $paramKey . '=' . $paramItem;
                }
                if (isset($this->params[$key + 1])){
                    $url .= '&';
                }
            }
            $curl = curl_init($url);
        } else {
            $curl = curl_init($this->baseUrl . $this->url);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        if ($this->headers) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, $this->headers);
        }
        $response = curl_exec($curl);
        if ($response === false) {
            throw new Exception('Error curl: ' . curl_error($curl));
        } else {
            return $response;
        }
    }

    /**
     * @param array $data
     * @return bool|string
     * @throws Exception
     */
    public function post(array $data)
    {
        $curl = curl_init($this->baseUrl . $this->url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        if ($this->headers) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, $this->headers);
        }
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        $response = curl_exec($curl);

        if ($response === false) {
            throw new Exception('Error curl: ' . curl_error($curl));
        } else {
            return $response;
        }
    }

    /**
     * Set method url
     * @param string $url
     */
    protected function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * Set api base url
     * @param string $url
     */
    protected function setBaseUrl(string $url): void
    {
        $this->baseUrl = $url;
    }

    /**
     * Set token
     * @param string $token
     */
    protected function setToken(string $token): void
    {
        $this->token = $token;
    }

    /**
     * @return string
     */
    protected function getToken(): string
    {
        return $this->token;
    }

    /**
     * @return ApiUserInterface
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param string $value
     */
    protected function addHeader(string $value): void
    {
        array_push($this->headers, $value);
    }

    /**
     * Add GET params
     * @param array $value
     */
    protected function addParams(array $value): void
    {
        array_push($this->params, $value);
    }

}
