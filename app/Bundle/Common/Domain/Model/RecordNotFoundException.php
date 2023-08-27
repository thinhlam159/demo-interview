<?php
namespace App\Bundle\Common\Domain\Model;

class RecordNotFoundException extends DomainException
{
    protected $errorCode = 400;
    protected $errorTitle = 'Bản ghi tương ứng không tồn tại';
}
