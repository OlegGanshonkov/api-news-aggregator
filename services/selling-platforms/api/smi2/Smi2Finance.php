<?php

require_once(MainParams::root() . '/services/selling-platforms/api/Smi2Api.php');
require_once(MainParams::root() . '/services/selling-platforms/interfaces/FinanceInterface.php');

/**
 * Class Smi2Finance
 */
class Smi2Finance extends Smi2Api implements FinanceInterface
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
        $result = isset($result['balance']) ? $result['balance'] : false;
        return (float)$result;
    }

}