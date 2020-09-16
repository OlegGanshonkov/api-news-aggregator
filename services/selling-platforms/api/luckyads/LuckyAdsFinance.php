<?php

require_once(MainParams::root() . '/services/selling-platforms/api/LuckyAdsApi.php');
require_once(MainParams::root() . '/services/selling-platforms/interfaces/FinanceInterface.php');

/**
 * Class OblivkiFinance
 */
class LuckyAdsFinance extends LuckyAdsApi implements FinanceInterface
{
    /**
     * @return float
     * @throws Exception
     */
    public function balance(): float
    {

        $this->setUrl('balance');
        $result = $this->get();
        $result = json_decode($result, true);
        $result = isset($result['data']) && isset($result['data']['current_balance'])
            ? $result['data']['current_balance'] : false;
        return (float)$result;
    }

}