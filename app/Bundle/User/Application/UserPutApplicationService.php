<?php
namespace App\Bundle\User\Application;

use App\Bundle\Common\Constants\MessageConst;
use App\Bundle\Common\Domain\Model\InvalidArgumentException;
use App\Bundle\Common\Domain\Model\RecordNotFoundException;
use App\Bundle\Common\Domain\Model\TransactionException;
use App\Bundle\User\Domain\Model\IUserRepository;
use App\Bundle\User\Domain\Model\User;
use App\Bundle\User\Domain\Model\UserId;
use App\Bundle\User\Domain\Model\UserStatusType;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

final class UserPutApplicationService
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
     * @param \App\Bundle\User\Application\UserPutCommand $command command
     * @return \App\Bundle\User\Application\UserPutResult
     */
    public function handle(UserPutCommand $command): UserPutResult
    {
        $userId = new UserId($command->userId);
        $user = $this->userRepository->findById($userId);
        if (!$user) {
            throw new RecordNotFoundException(MessageConst::NOT_FOUND['message']);
        }
        $existingEmail = $this->userRepository->checkExistingEmail($command->email, $userId);
        if ($existingEmail) {
            throw new InvalidArgumentException(MessageConst::EXISTING_EMAIL['message']);
        }

        $user = new User(
            new UserId($command->userId),
            $command->firstName,
            $command->lastName,
            $command->email,
            UserStatusType::fromValue($command->status)
        );

        DB::beginTransaction();
        try {
            $userId = $this->userRepository->updateUser($user);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e);
            throw new TransactionException('Update fail');
        }

        return new UserPutResult(
            $userId->getValue()
        );
    }
}
