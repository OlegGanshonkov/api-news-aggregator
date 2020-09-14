<?php

interface ApiFactoryInterface
{

    /**
     * @return FinanceInterface
     */
    public function getFinance(): FinanceInterface;

}