<?php
namespace App\Bundle\User\Domain\Model;

interface IUserRepository
{
    /**
     * @param \App\Bundle\User\Domain\Model\User $user user
     * @return \App\Bundle\User\Domain\Model\UserId
     */
    public function createUser(User $user): UserId;

    /**
     * @param \App\Bundle\User\Domain\Model\UserId $userId userId
     * @return \App\Bundle\User\Domain\Model\User
     */
    public function findById(UserId $userId): ?User;

    /**
     * @param \App\Bundle\User\Domain\Model\UserId $userId userId
     * @return bool
     */
    public function deleteById(UserId $userId): bool;

    /**
     * no param
     * @return array{\App\Bundle\User\Domain\Model\User[], \App\Bundle\User\Domain\Model\Pagination}
     */
    public function findAll(): array;

    /**
     * @param \App\Bundle\User\Domain\Model\User $user user
     * @return \App\Bundle\User\Domain\Model\UserId
     */
    public function updateUser(User $user): UserId;

    /**
     * @param string $email email
     * @param \App\Bundle\User\Domain\Model\UserId|null $userId userId
     * @return bool
     */
    public function checkExistingEmail(string $email, ?UserId $userId = null): bool;
}
