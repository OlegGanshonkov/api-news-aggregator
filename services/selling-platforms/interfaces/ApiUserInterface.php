<?php

interface ApiUserInterface
{

    /**
     * Get user platform
     * @return string
     */
    public function getPlatform(): string;

    /**
     * Get user email
     * @return string
     */
    public function getEmail(): string;

    /**
     * Get user password
     * @return string
     */
    public function getPassword(): string;

    /**
     * Get user token
     * @return string
     */
    public function getToken(): string;

    /**
     * Get user userId
     * @return string
     */
    public function getUserId(): string;

}