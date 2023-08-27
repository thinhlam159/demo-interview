<?php
namespace App\Bundle\User\Application;

use App\Bundle\Common\Constants\MessageConst;
use App\Bundle\Common\Domain\Model\RecordNotFoundException;
use App\Bundle\Common\Domain\Model\TransactionException;
use App\Bundle\User\Domain\Model\IUserRepository;
use App\Bundle\User\Domain\Model\UserId;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

final class UserDeleteApplicationService
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
     * @param \App\Bundle\User\Application\UserDeleteCommand $command command
     * @return \App\Bundle\User\Application\UserDeleteResult
     */
    public function handle(UserDeleteCommand $command): UserDeleteResult
    {
        $user = $this->userRepository->findById(new UserId($command->userId));
        if (!$user) {
            throw new RecordNotFoundException(MessageConst::NOT_FOUND['message']);
        }

        DB::beginTransaction();
        try {
            $this->userRepository->deleteById($user->getUserId());
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e);
            throw new TransactionException('Update fail');
        }

        return new UserDeleteResult();
    }
}
