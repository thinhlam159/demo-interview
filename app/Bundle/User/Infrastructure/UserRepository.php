<?php
namespace App\Bundle\User\Infrastructure;

use App\Bundle\Common\Constants\PaginationConst;
use App\Bundle\User\Domain\Model\IUserRepository;
use App\Bundle\User\Domain\Model\Pagination;
use App\Bundle\User\Domain\Model\User;
use App\Bundle\User\Domain\Model\UserId;
use App\Bundle\User\Domain\Model\UserStatusType;
use App\Models\User as ModelUser;

class UserRepository implements IUserRepository
{
    /**
     * @inheritDoc
     */
    public function createUser(User $user): UserId
    {
        $result = ModelUser::create([
            'id' => $user->getUserId()->asString(),
        	'first_name' => $user->getFirstName(),
            'last_name' => $user->getLastName(),
            'email' => $user->getEmail(),
            'status' => $user->getStatus()->getType()
    	]);

        return new UserId($result->id);
    }

    /**
     * @inheritDoc
     */
    public function deleteById(UserId $userId): bool
    {
        $entity = ModelUser::find($userId->getValue());
        $entity->status = UserStatusType::DELETED;
        $entity->save();
        $entity->delete();

        return true;
    }

    /**
     * @inheritDoc
     */
    public function findById(UserId $userId): ?User
    {
        $entity = ModelUser::find($userId->getValue());
        if (!$entity) {
            return null;
        }

        $user = new User(
            new UserId($entity->id),
            $entity->first_name,
            $entity->last_name,
            $entity->email,
            UserStatusType::fromType($entity->status),
        );

        return $user;
    }

    /**
     * @inheritDoc
     */
    public function findAll(): array
    {
       $entities = ModelUser::paginate(PaginationConst::PAGINATE_ROW);

       /** @var \App\Bundle\User\Domain\Model\User[] $result */
       $users = [];

       foreach ($entities as $entity) {
           $users[] = new User(
               new UserId($entity->id),
               $entity->first_name,
               $entity->last_name,
               $entity->email,
               UserStatusType::fromType($entity->status)
           );
       }

        $pagination = new Pagination(
            $entities->lastPage(),
            $entities->perPage(),
            $entities->currentPage()
        );

       return [
           $users,
           $pagination
       ];
    }

    /**
     * @inheritDoc
     */
    public function updateUser(User $user): UserId
    {
        $entity = ModelUser::find($user->getUserId()->getValue());

        $data = [
            'email' => $user->getEmail(),
            'first_name' => $user->getFirstName(),
            'last_name' => $user->getLastName(),
            'status' => $user->getStatus()->getType()
        ];

        $entity->update($data);

        return new UserId($entity->id);
    }

    /**
     * @inheritDoc
     */
    public function checkExistingEmail(string $email, ?UserId $userId = null): bool
    {
        $query = ModelUser::where('email', '=', $email);
        if (!is_null($userId)) {
            $query = $query->where('id', '!=', $userId->asString());
        }
        $entity = $query->first();

        if (is_null($entity)) {
            return false;
        }

        return true;
    }
}
