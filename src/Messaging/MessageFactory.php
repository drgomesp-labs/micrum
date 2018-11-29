<?php

declare(strict_types=1);

namespace Micrum\Messaging\Factory;

use Micrum\Messaging\Message;

/**
 * Interface MessageFactory.
 */
interface MessageFactory
{
    /**
     * Creates an event of the type defined in as the message name, given a payload and some headers.
     *
     * @param string $messageClassName
     * @param array  $payload
     * @param array  $headers
     *
     * @return Message
     */
    public function create(string $messageClassName, array $payload, array $headers = []): Message;
}
