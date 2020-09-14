<?php

require_once(MainParams::root() . '/services/selling-platforms/ApiFactory.php');
require_once(MainParams::root() . '/services/selling-platforms/api/oblivki/OblivkiFinance.php');
require_once(MainParams::root() . '/services/selling-platforms/api/oblivki/OblivkiCampaigns.php');

/**
 * Class OblivkiApiFactory
 */
class OblivkiApiFactory extends ApiFactory
{

    /**
     * @return FinanceInterface
     * @throws Exception
     */
    public function getFinance(): FinanceInterface
    {
        return new OblivkiFinance($this->user);
    }

    /**
     * @return CampaignsInterface
     * @throws Exception
     */
    public function getCampaigns(): CampaignsInterface
    {
        return new OblivkiCampaigns($this->user);
    }

}