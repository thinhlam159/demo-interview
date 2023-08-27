<?php
namespace App\Bundle\User\Application;

use \App\Bundle\Common\Application\PaginationResult;

final class UserGetResult
{
    /**
     * @var string
     */
    public string $userId;

    /**
     * @var string
     */
    public string $email;

    /**
     * @var string
     */
    public string $firstName;

    /**
     * @var string
     */
    public string $lastName;

    /**
     * @var string
     */
    public string $status;

    /**
     * @param string $userId
     * @param string $email
     * @param string $firstName
     * @param string $lastName
     * @param string $status
     */
    public function __construct(
        string $userId,
        string $email,
        string $firstName,
        string $lastName,
        string $status
    )
    {
        $this->userId = $userId;
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->status = $status;
    }
}
