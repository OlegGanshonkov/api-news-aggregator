<?php

require_once(MainParams::root() . '/services/selling-platforms/interfaces/ApiFactoryInterface.php');
require_once(MainParams::root() . '/services/selling-platforms/interfaces/FinanceInterface.php');
require_once(MainParams::root() . '/services/selling-platforms/interfaces/CampaignsInterface.php');

/**
 * Abstract class ApiFactory
 * 
 * Example:
 * $user = new ApiUser('oblivki', $user['email']);
 * $finance = ApiFactory::getFactory($user)->getFinance();
 * $balance = $finance->balance();
 * echo $balance;
 *
 */
abstract class ApiFactory implements ApiFactoryInterface
{
    /**
     * @var ApiUserInterface
     */
    public $user;

    /**
     * @param ApiUserInterface $apiUser
     * @throws Exception
     */
    function __construct(ApiUserInterface $apiUser)
    {
        $this->user = $apiUser;
    }

    /**
     * Возвращает фабрику
     *
     * @param ApiUserInterface $apiUser
     * @return ApiFactoryInterface
     * @throws Exception
     */
    public static function getFactory(ApiUserInterface $apiUser)
    {
        switch ($apiUser->getPlatform()) {
            case $apiUser::API_PLATFORM_1:
                return new OblivkiApiFactory($apiUser);
            case $apiUser::API_PLATFORM_2:
                return new Smi2ApiFactory($apiUser);;
        }
        throw new Exception('Factory not found.');
    }

    /**
     * @return FinanceInterface
     */
    abstract public function getFinance(): FinanceInterface;

    /**
     * @return CampaignsInterface
     */
    abstract public function getCampaigns(): CampaignsInterface;
}
