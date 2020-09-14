<?php

interface RequestInterface
{

    /**
     * GET request
     */
    public function get();

    /**
     * POST request
     * @param array $data
     */
    public function post(array $data);
}