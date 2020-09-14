<?php

require_once(MainParams::root() . '/services/selling-platforms/api/OblivkiApi.php');
require_once(MainParams::root() . '/services/selling-platforms/interfaces/CampaignsInterface.php');

/**
 * Class OblivkiFinance
 */
class OblivkiCampaigns extends OblivkiApi implements CampaignsInterface
{
    /**
     * Список кампаний со статистикой | $cid - Получить информацию о кампании
     * @param int|null $cid
     * @return array
     * @throws Exception
     */
    public function campaigns(int $cid = null): array
    {
        $this->setUrl($cid ? 'campaign/' . $cid : 'campaigns');
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
        $result = $this->campaigns($cid);
        if (isset($result['price'])) {
            return $result['price'];
        }
    }

    public function campaignsRatio(int $cid): array
    {
        // TODO: Implement campaignsRatio() method.
    }
}