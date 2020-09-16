<?php

require_once(MainParams::root() . '/services/selling-platforms/ApiFactory.php');
require_once(MainParams::root() . '/services/selling-platforms/api/luckyads/LuckyAdsFinance.php');

/**
 * Class OblivkiApiFactory
 */
class LuckyAdsApiFactory extends ApiFactory
{

    /**
     * @return FinanceInterface
     * @throws Exception
     */
    public function getFinance(): FinanceInterface
    {
        return new LuckyAdsFinance($this->user);
    }

    public function getCampaigns(): CampaignsInterface
    {
        // TODO: Implement getCampaigns() method.
    }

}