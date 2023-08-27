<?php

namespace App\Bundle\Common\Domain\Library;

use Symfony\Component\Uid\Ulid;

class CdAdminText
{
    /**
     * @return string
     */
    public static function id(): string
    {
        return Ulid::generate();
    }
}
