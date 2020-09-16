<?php

require_once(MainParams::root() . '/services/selling-platforms/ApiFactory.php');
require_once(MainParams::root() . '/services/selling-platforms/api/advertlink/AdvertLinkFinance.php');

/**
 * Class OblivkiApiFactory
 */
class AdvertLinkApiFactory extends ApiFactory
{

    /**
     * @return FinanceInterface
     * @throws Exception
     */
    public function getFinance(): FinanceInterface
    {
        return new AdvertlinkFinance($this->user);
    }

    public function getCampaigns(): CampaignsInterface
    {
        // TODO: Implement getCampaigns() method.
    }
}