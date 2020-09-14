<?php

require_once(MainParams::root() . '/services/selling-platforms/api/BaseApi.php');

/**
 * Class OblivkiApi
 * https://my.oblivki.biz/inner-page/api
 */
class OblivkiApi extends BaseApi
{
    protected $baseUrl = 'https://api.oblivki.biz/1.0/';

    /**
     * @inheritDoc
     */
    protected function auth(ApiUserInterface $apiUser): bool
    {
        if ($this->user->getToken()) {
            $this->addHeader('Authorization: access-token ' . $this->user->getToken());
            $this->setToken($this->user->getToken());
            $this->isAuthorized = true;
        }
        return $this->isAuthorized;
    }

}