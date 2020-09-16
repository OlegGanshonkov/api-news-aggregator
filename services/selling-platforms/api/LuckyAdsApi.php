<?php

require_once(MainParams::root() . '/services/selling-platforms/api/BaseApi.php');

/**
 * Class LuckyadsApi
 * https://help.luckyads.pro/ru/articles/4100423-%D0%B8%D0%BD%D1%81%D1%82%D1%80%D1%83%D0%BA%D1%86%D0%B8%D1%8F-%D0%BE%D1%82%D0%BF%D1%80%D0%B0%D0%B2%D0%BA%D0%B8-get-%D0%B7%D0%B0%D0%BF%D1%80%D0%BE%D1%81%D0%BE%D0%B2-%D0%BF%D0%BE-api?reload
 */
class LuckyAdsApi extends BaseApi
{
    protected $baseUrl = 'https://api.luckyads.pro/v1/advertiser/';

    /**
     * @inheritDoc
     */
    protected function auth(ApiUserInterface $apiUser): bool
    {
        if ($this->user->getToken()) {
            $this->addHeader('Private-Token: ' . $this->user->getToken());
            $this->setToken($this->user->getToken());
            $this->isAuthorized = true;
        }
        return $this->isAuthorized;
    }

}