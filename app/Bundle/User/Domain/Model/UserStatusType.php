<?php
namespace App\Bundle\User\Domain\Model;

use App\Bundle\Common\Domain\Model\InvalidArgumentException;

final class UserStatusType
{
    /** @var int */
    public const ACTIVE = 1;

    /** @var int */
    public const SUSPENDED = 2;

    /** @var int */
    public const DELETED = 3;

    /** @var array<int,string> */
    private const VALUES = [
        self::ACTIVE => 'active',
        self::SUSPENDED => 'suspended',
        self::DELETED => 'delete',
    ];
    private int $type;

    /**
     * @param int $type type
     */
    private function __construct(
        int $type
    ) {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "{$this->getType()}:{$this->getValue()}";
    }

    /**
     * @param string $value value
     * @return self
     */
    public static function fromValue(string $value): UserStatusType
    {
        foreach (self::VALUES as $type => $v) {
            if ($v === $value) {
                return new UserStatusType($type);
            }
        }

        throw new InvalidArgumentException("Giá trị [{$value}] không hợp lệ");
    }

    /**
     * @param int $type type
     * @return self
     */
    public static function fromType(int $type): UserStatusType
    {
        if (!isset(self::VALUES[$type])) {
            throw new InvalidArgumentException("Giá trị [{$type}] không hợp lệ");
        }

        return new UserStatusType($type);
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return self::VALUES[$this->type];
    }
}
