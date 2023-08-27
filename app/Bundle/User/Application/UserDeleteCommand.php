<?php
namespace App\Bundle\User\Application;

final class UserDeleteCommand
{
    /**
     * @param string $userId
     */
    public function __construct(
        public string $userId,
    )
    {
        
    }
}


