<?php

declare(strict_types=1);

namespace Micrum\Messaging\EventHandling\EventMessage;

use Enqueue\Client\TopicSubscriberInterface;
use Interop\Queue\Context;
use Interop\Queue\Message;
use Interop\Queue\Processor;
use Micrum\Messaging\EventHandling\EventMessageProcessor;

/**
 * Class InteropProcessor.
 */
class InteropProcessor implements Processor, TopicSubscriberInterface
{
    private const SUBSCRIBED_TOPICS = [];

    /**
     * @var EventMessageProcessor
     */
    protected $actualProcessor;

    /**
     * InteropProcessor constructor.
     *
     * @param EventMessageProcessor $actualProcessor
     */
    public function __construct(EventMessageProcessor $actualProcessor)
    {
        $this->actualProcessor = $actualProcessor;
    }

    public function process(Message $message, Context $context)
    {
        try {
            // TODO $this->actualProcessor->process(...);
        } catch (\Throwable $e) {
            // TODO
        }
    }

    public static function getSubscribedTopics()
    {
        return static::SUBSCRIBED_TOPICS;
    }
}
