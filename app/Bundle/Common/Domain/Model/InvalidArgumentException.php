<?php
namespace App\Bundle\Common\Domain\Model;

class InvalidArgumentException extends DomainException
{
    protected $errorCode = 400;
    protected $errorTitle = 'Tham số không hợp lệ';

    /**
     * @param string $message message
     */
    public function __construct(string $message)
    {
        parent::__construct($message);
        $this->errorTitle = $message;
    }
}
