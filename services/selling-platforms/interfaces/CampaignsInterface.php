<?php

interface CampaignsInterface
{

    public function campaigns(int $cid = null): array;

    public function campaignsCpc(int $cid): array;

    public function campaignsRatio(int $cid): array;

}