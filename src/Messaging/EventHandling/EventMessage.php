<?php

declare(strict_types=1);

namespace Micrum\Messaging\EventHandling;

use Micrum\Common\DateTime;
use Ramsey\Uuid\UuidInterface;

/**
 * Interface EventMessage.
 */
interface EventMessage
{
    /**
     * Returns the message unique identifier.
     *
     * @return UuidInterface
     */
    public function id(): UuidInterface;

    /**
     * Returns the time when the message occurred.
     *
     * @return DateTime
     */
    public function time(): DateTime;
}
