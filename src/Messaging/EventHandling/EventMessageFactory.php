<?php

declare(strict_types=1);

namespace Micrum\Messaging\EventHandling;

/**
 * Defines an interface for building event messages.
 */
interface EventMessageFactory
{
    /**
     * Creates an event of the type defined as the message class name, with a given payload and message headers.
     *
     * @param string $messageClassName
     * @param array  $payload
     * @param array  $headers
     *
     * @return EventMessage
     */
    public function create(string $messageClassName, array $payload, array $headers = []): EventMessage;
}
