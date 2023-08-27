<?php
namespace App\Bundle\User\Application;

use App\Bundle\Common\Application\PaginationResult;
use App\Bundle\User\Domain\Model\IUserRepository;

final class UserListGetApplicationService
{
    /**
     * @var \App\Bundle\User\Domain\Model\IUserRepository
     */
    private IUserRepository $userRepository;

    /**
     * @param \App\Bundle\User\Domain\Model\IUserRepository $userRepository userRepository
     */
    public function __construct(IUserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    /**
     * @param \App\Bundle\User\Application\UserListGetCommand $command command
     * @return \App\Bundle\User\Application\UserListGetResult
     */
    public function handle(UserListGetCommand $command): UserListGetResult
    {
        [$users, $pagination] = $this->userRepository->findAll();

        /** @var \App\Bundle\User\Application\UserResult[] $userManageResult */
        $userManageResult = [];

        foreach ($users as $user) {
            $userManageResult[] = new UserResult(
                $user->getUserId()->getValue(),
                $user->getFirstName(),
                $user->getLastName(),
                $user->getEmail(),
                $user->getStatus()->getValue()
            );
        }
        $paginationResult = new PaginationResult(
            $pagination->getTotalPages(),
            $pagination->getPerPage(),
            $pagination->getCurrentPage(),
        );

        return new UserListGetResult(
            $userManageResult,
            $paginationResult
        );
    }
}
