<?php

require_once(MainParams::root() . '/services/selling-platforms/api/BaseApi.php');

/**
 * Class Smi2Api
 * v1: https://advert.24smi.info/public/static/api/index.html?url=advert_api.yaml#/%D0%9F%D1%80%D0%BE%D1%84%D0%B8%D0%BB%D1%8C/get_balance
 * v2: https://cabinet.24smi.info/docs/advert/#/
 */
class Smi2Api extends BaseApi
{
    const apiV1 = 'https://advert.24smi.info/api/v1/';
    const apiV2 = 'https://cabinet.24smi.info/';

    /**
     * @inheritDoc
     * @throws Exception
     */
    protected function auth(ApiUserInterface $apiUser): bool
    {
        if ($this->user->getPassword()) {
            $this->setBaseUrl(self::apiV1);
            $this->setUrl('user/token');
            $data = [
                'email' => $this->user->getEmail(),
                'password' => $this->user->getPassword()
            ];
            $result = $this->post($data);
            $result = json_decode($result, true);
            if (isset($result['token'])) {
                $this->setToken($result['token']);
                $this->addHeader('Authorization: Token ' . $this->getToken());
                $this->isAuthorized = true;
            }
        }
        return $this->isAuthorized;
    }



}