<?php

declare(strict_types=1);

namespace Micrum\Common;

/**
 * Class DateTime.
 */
class DateTime extends \DateTimeImmutable
{
    /**
     * @return string
     */
    public function toString(): string
    {
        return $this->format('U');
    }
}
