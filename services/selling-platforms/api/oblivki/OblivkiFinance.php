<?php

require_once(MainParams::root() . '/services/selling-platforms/api/OblivkiApi.php');
require_once(MainParams::root() . '/services/selling-platforms/interfaces/FinanceInterface.php');

/**
 * Class OblivkiFinance
 */
class OblivkiFinance extends OblivkiApi implements FinanceInterface
{
    /**
     * @return float
     * @throws Exception
     */
    public function balance(): float
    {
        $this->setUrl('user/balance');
        $result = $this->get();
        $result = json_decode($result, true);
        $result = isset($result['balanceAdvert']) ? $result['balanceAdvert'] : false;
        return (float)$result;
    }

}