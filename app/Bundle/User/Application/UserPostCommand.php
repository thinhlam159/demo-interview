<?php
namespace App\Bundle\User\Application;

final class UserPostCommand
{
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
    public string $email;

    /**
     * @var string
     */
    public string $status;

    /**
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param string $status
     */
    public function __construct(
        string $firstName,
        string $lastName,
        string $email,
        string $status
    )
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->status = $status;
    }
}


