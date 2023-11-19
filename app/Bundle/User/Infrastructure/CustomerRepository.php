<?php

namespace App\Bundle\User\Infrastructure;

use App\Bundle\Common\Infrastructure\BaseRepository;
use App\Models\Customer as CustomerModel;

class CustomerRepository extends BaseRepository
{
    public function model()
    {
        return CustomerModel::class;
    }
}
