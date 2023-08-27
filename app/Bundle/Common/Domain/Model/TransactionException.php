<?php
namespace App\Bundle\Common\Domain\Model;

class TransactionException extends DomainException
{
    protected $errorCode = 102;
    protected $errorTitle = 'Xử lý không thành công';
}
