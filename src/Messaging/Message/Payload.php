<?php

declare(strict_types=1);

namespace Micrum\Messaging\Message;

use JsonSerializable;

/**
 * Class Payload.
 */
class Payload extends \ArrayObject implements JsonSerializable
{
    public function jsonSerialize()
    {
        return (array) $this;
    }
}
