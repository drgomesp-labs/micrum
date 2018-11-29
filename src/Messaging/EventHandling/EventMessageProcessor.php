<?php

declare(strict_types=1);

namespace Micrum\Messaging\EventHandling;

use Micrum\Messaging\MessageProcessingResult;

/**
 * Defines a processor capable of handling event messages.
 */
interface EventMessageProcessor
{
    /**
     * Processes the given event message.
     *
     * @param EventMessage $eventMessage
     *
     * @return MessageProcessingResult
     */
    public function process(EventMessage $eventMessage): MessageProcessingResult;
}
