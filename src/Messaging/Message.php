<?php

declare(strict_types=1);

namespace Micrum\Messaging;

use JsonSerializable;
use Micrum\Messaging\Message\Metadata;
use Micrum\Messaging\Message\Payload;

/**
 * Interface Message.
 */
interface Message extends JsonSerializable
{
    /**
     * Returns the message metadata.
     *
     * @return Metadata
     */
    public function metadata(): Metadata;

    /**
     * @return \Micrum\Messaging\Message\Payload
     */
    public function payload(): Payload;
}
