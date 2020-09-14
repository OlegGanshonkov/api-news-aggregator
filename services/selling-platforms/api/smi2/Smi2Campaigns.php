<?php

require_once(MainParams::root() . '/services/selling-platforms/api/Smi2Api.php');
require_once(MainParams::root() . '/services/selling-platforms/interfaces/CampaignsInterface.php');

/**
 * Class Smi2Finance
 */
class Smi2Campaigns extends Smi2Api implements CampaignsInterface
{

    /**
     * Список кампаний со статистикой | $cid - Получить информацию о кампании
     * @param int|null $cid
     * @return array
     * @throws Exception
     */
    public function campaigns(int $cid = null): array
    {
        $this->setUrl($cid ? 'campaigns/' . $cid : 'campaigns');
        $result = $this->get();
        $result = json_decode($result, true);
        return $result;
    }

    /**
     * Информация об установленной и минимально допустимой ценой клика. Метод может быть полезен для определения
     * минимально допустимого значения для поля cpc при создании или изменении анонса.
     * @param int $cid
     * @return array
     * @throws Exception
     */
    public function campaignsCpc(int $cid): array
    {
        $this->setUrl('campaigns/' . $cid . '/cpc');
        $result = $this->get();
        $result = json_decode($result, true);
        return $result;
    }

    /**
     * @param int $cid
     * @return array
     * @throws Exception
     */
    public function campaignsRatio(int $cid): array
    {
        $this->setBaseUrl(self::apiV2);
        $this->setUrl('advert/v2/campaigns/' . $cid . '/ratio');
        $result = $this->get();
        $result = json_decode($result, true);
        return $result;
    }

}