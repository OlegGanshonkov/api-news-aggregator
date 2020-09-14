<?php

require_once(MainParams::root() . '/services/selling-platforms/ApiFactory.php');
require_once(MainParams::root() . '/services/selling-platforms/api/smi2/Smi2Finance.php');
require_once(MainParams::root() . '/services/selling-platforms/api/smi2/Smi2Campaigns.php');

/**
 * Class SmiApi
 */
class Smi2ApiFactory extends ApiFactory
{

    /**
     * @return FinanceInterface
     * @throws Exception
     */
    public function getFinance(): FinanceInterface
    {
        return new Smi2Finance($this->user);
    }

    /**
     * @return CampaignsInterface
     * @throws Exception
     */
    public function getCampaigns(): CampaignsInterface
    {
        return new Smi2Campaigns($this->user);
    }

}