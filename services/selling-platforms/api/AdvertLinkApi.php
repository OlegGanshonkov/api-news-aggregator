<?php

require_once(MainParams::root() . '/services/selling-platforms/api/BaseApi.php');

/**
 * Class AdvertLinkApi
 * https://advertlink.ru/apidoc/
 */
class AdvertLinkApi extends BaseApi
{
    protected $baseUrl = 'https://advertlink.ru/api/v1/';

    /**
     * @inheritDoc
     */
    protected function auth(ApiUserInterface $apiUser): bool
    {
        if ($this->user->getUserId() && $this->user->getToken()) {
            $this->addParams(['api_user_id' => $this->user->getUserId()]);
            $this->addParams(['api_key' => $this->user->getToken()]);
            $this->isAuthorized = true;
        }
        return $this->isAuthorized;
    }

}