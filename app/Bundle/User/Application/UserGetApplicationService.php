<?php
namespace App\Bundle\User\Application;

use App\Bundle\Common\Domain\Model\RecordNotFoundException;
use App\Bundle\User\Domain\Model\IUserRepository;
use App\Bundle\User\Domain\Model\UserId;
use App\Bundle\Common\Constants\MessageConst;

final class UserGetApplicationService
{
    /**
     * @var \App\Bundle\User\Domain\Model\IUserRepository
     */
    private IUserRepository $userRepository;

    /**
     * @param \App\Bundle\User\Domain\Model\IUserRepository $userRepository userRepository
     */
    public function __construct(
        IUserRepository $userRepository,
    ) {
        $this->userRepository = $userRepository;
    }

    /**
     * @param \App\Bundle\User\Application\UserGetCommand $command command
     * @return \App\Bundle\User\Application\UserGetResult
     */
    public function handle(UserGetCommand $command): UserGetResult
    {
        $user = $this->userRepository->findById(new UserId($command->userId));
        if (!$user) {
            throw new RecordNotFoundException(MessageConst::NOT_FOUND['message']);
        }

        return new UserGetResult(
            $user->getUserId()->getValue(),
            $user->getEmail(),
            $user->getFirstName(),
            $user->getLastName(),
            $user->getStatus()->getValue(),
        );
    }
}
