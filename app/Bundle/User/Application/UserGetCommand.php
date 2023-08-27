<?php
namespace App\Bundle\User\Application;

final class UserGetCommand
{
    /**
     * @var string
     */
    public string $userId;

    /**
     * @param string $userId userId
     */
    public function __construct(string $userId){
        $this->userId = $userId;
    }
}
