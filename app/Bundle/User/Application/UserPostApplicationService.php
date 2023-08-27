<?php
namespace App\Bundle\User\Application;

use App\Bundle\Common\Constants\MessageConst;
use App\Bundle\Common\Domain\Model\InvalidArgumentException;
use App\Bundle\Common\Domain\Model\TransactionException;
use App\Bundle\User\Domain\Model\IUserRepository;
use App\Bundle\User\Domain\Model\User;
use App\Bundle\User\Domain\Model\UserId;
use App\Bundle\User\Domain\Model\UserStatusType;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

final class UserPostApplicationService
{
    /**
     * @var IUserRepository
     */
    private IUserRepository $userRepository;

    /**
     * @param \App\Bundle\User\Domain\Model\IUserRepository $userRepository userRepository
     */
    public function __construct(
        IUserRepository $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    /**
     * @param \App\Bundle\User\Application\UserPostCommand $command command
     * @return \App\Bundle\User\Application\UserPostResult
     */
    public function handle(UserPostCommand $command): UserPostResult
    {
        $existingEmail = $this->userRepository->checkExistingEmail($command->email);
        if ($existingEmail) {
            throw new InvalidArgumentException(MessageConst::EXISTING_EMAIL['message']);
        }
        $userId = UserId::newId();
        $user = new User(
            $userId,
            $command->firstName,
            $command->lastName,
            $command->email,
            UserStatusType::fromValue($command->status),
        );

        DB::beginTransaction();
        try {
            $userId = $this->userRepository->createUser($user);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e);
            throw new TransactionException('Created fail');
        }

        return new UserPostResult(
            $userId->getValue()
        );
    }
}
