<?php

require_once(MainParams::root() . '/services/selling-platforms/interfaces/ApiUserInterface.php');

/**
 * Class ApiUser
 */
class ApiUser implements ApiUserInterface
{
    const API_PLATFORM_1 = 'oblivki';
    const API_PLATFORM_2 = 'smi2';
    
    protected $email = '';
    protected $password = '';
    protected $token = '';
    protected $platform = '';

    /**
     * @param string $platform
     * @param string $email
     * @throws Exception
     */
    function __construct(string $platform, string $email)
    {
        $users = MainParams::apiUsers();
        if (isset($users[$platform][$email])) {
            $this->email = $email;
            $this->password = $users[$platform][$email]['password'];
            $this->token = $users[$platform][$email]['token'];
            $this->platform = $platform;
        } else {
            throw new Exception('Can`t find user');
        }
    }

    /**
     * @inheritDoc
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @inheritDoc
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @inheritDoc
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @inheritDoc
     */
    public function getPlatform(): string
    {
        return $this->platform;
    }

}
