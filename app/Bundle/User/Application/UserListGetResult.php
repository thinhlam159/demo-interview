<?php
namespace App\Bundle\User\Application;

use App\Bundle\Common\Application\PaginationResult;

final class UserListGetResult
{
    /**
     * @param \App\Bundle\User\Application\UserResult[] $userResult userResult
     * @param \App\Bundle\Common\Application\PaginationResult $paginationResult paginationResult
     */
    public function __construct(
        public array $userResult,
        public PaginationResult $paginationResult
    ) {

    }
}
