<?php
namespace App\Bundle\User\Domain\Model;

use App\Bundle\Common\Domain\Library\CdAdminText;
use App\Bundle\Common\Domain\Model\InvalidArgumentException;
use App\Bundle\Common\Domain\Model\ValueObjectStringTrait;

final class UserId
{
    use ValueObjectStringTrait;

    /**
     * @var string
     */
    private string $value;

    /**
     * @param string $value value
     */
    public function __construct(
        string $value
    ) {
        $this->value = $value;
        if (!self::validate($value)) {
            throw new InvalidArgumentException("Giá trị [{$value}] không hợp lệ");
        }
    }

    /**
     * @return self
     */
    public static function newId(): self
    {
        return new self(CdAdminText::id());
    }

    /**
     * @param string $value value
     * @return bool
     */
    public static function validate(string $value)
    {
        if ($value === '') {
            return false;
        }

        return true;
    }

    /**
     * @param self $obj obj
     * @return bool
     */
    public function equals(UserId $obj): bool
    {
        return $this->value === $obj->value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
