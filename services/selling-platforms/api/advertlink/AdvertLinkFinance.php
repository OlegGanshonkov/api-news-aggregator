<?php

require_once(MainParams::root() . '/services/selling-platforms/api/AdvertLinkApi.php');
require_once(MainParams::root() . '/services/selling-platforms/interfaces/FinanceInterface.php');

/**
 * Class OblivkiFinance
 */
class AdvertLinkFinance extends AdvertLinkApi implements FinanceInterface
{
    /**
     * @return float
     * @throws Exception
     */
    public function balance(): float
    {

        $this->addParams(['action' => 'advert_balance']);
        $result = $this->get();
        $result = json_decode($result, true);
        $result = isset($result['success']) && isset($result['success']['data'])
            && isset($result['success']['data']['balance'])?
            $result['success']['data']['balance'] : false;
        return (float)$result;
    }

}