<?php
namespace App\Bundle\User\Application;

final class UserResult
{
    /**
     * @param string $userId
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param string $status
     */
    public function __construct(
        public string $userId,
        public string $firstName,
        public string $lastName,
        public string $email,
        public string $status,
    ) {

    }
}
