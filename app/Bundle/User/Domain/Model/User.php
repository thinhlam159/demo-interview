<?php
namespace App\Bundle\User\Domain\Model;

final class User {
    /**
     * @var UserId
     */
    private UserId $userId;

    /**
     * @var string
     */
    private string $firstName;

    /**
     * @var string
     */
    private string $lastName;

    /**
     * @var string
     */
    private string $email;

    /**
     * @var UserStatusType
     */
    private UserStatusType $status;

    /**
     * @param UserId $userId
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param UserStatusType $status
     */
    public function __construct(
        UserId $userId,
        string $firstName,
        string $lastName,
        string $email,
        UserStatusType $status
    )
    {
        $this->userId = $userId;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->status = $status;
    }

    /**
     * @return UserId
     */
    public function getUserId(): UserId
    {
        return $this->userId;
    }

    /**
     * @param UserId $userId
     */
    public function setUserId(UserId $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return UserStatusType
     */
    public function getStatus(): UserStatusType
    {
        return $this->status;
    }

    /**
     * @param UserStatusType $status
     */
    public function setStatus(UserStatusType $status): void
    {
        $this->status = $status;
    }
}
