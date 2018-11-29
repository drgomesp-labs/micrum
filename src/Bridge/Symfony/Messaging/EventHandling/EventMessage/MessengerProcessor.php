<?php

declare(strict_types=1);

namespace Micrum\Bridge\Symfony\Messaging\EventHandling\EventMessage;

use Micrum\Messaging\EventHandling\EventMessage;
use Micrum\Messaging\EventHandling\EventMessageFactory;
use Micrum\Messaging\EventHandling\EventMessageProcessor;
use Micrum\Messaging\MessageProcessingResult;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\MessageBusInterface;

/**
 * Class MessengerProcessor.
 */
class MessengerProcessor implements EventMessageProcessor
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var MessageBusInterface
     */
    private $eventBus;

    /**
     * @var EventMessageFactory
     */
    private $eventFactory;

    /**
     * MessengerProcessor constructor.
     *
     * @param LoggerInterface     $logger
     * @param MessageBusInterface $eventBus
     * @param EventMessageFactory $eventFactory
     */
    public function __construct(
        LoggerInterface $logger,
        MessageBusInterface $eventBus,
        EventMessageFactory $eventFactory
    ) {
        $this->logger = $logger;
        $this->eventBus = $eventBus;
        $this->eventFactory = $eventFactory;
    }

    public function process(EventMessage $eventMessage): MessageProcessingResult
    {
        // TODO: Implement process() method.
    }
}
