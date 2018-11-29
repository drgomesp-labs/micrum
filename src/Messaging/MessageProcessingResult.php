<?php

declare(strict_types=1);

namespace Micrum\Messaging;

/**
 * Interface MessageProcessingResult.
 */
interface MessageProcessingResult
{
    const ACKNOWLEDGE = 'acknowledge';

    const REJECT = 'reject';

    const REQUEUE = 'requeue';
}
