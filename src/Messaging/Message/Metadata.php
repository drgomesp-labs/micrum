<?php

declare(strict_types=1);

namespace Micrum\Messaging\Message;

/**
 * Class Metadata.
 */
class Metadata extends \ArrayObject implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return (array) $this;
    }

    /**
     * Merges this metadata with a given metadata. With the default behaviour, the merge operation will ignore repeated
     * keys and keep the original values – you can override this behaviour by setting the $override flag to true.
     *
     * @param Metadata $metadata
     * @param bool     $override Set this to true to override keys instead of keeping the left side of the merge
     *
     * @return Metadata
     */
    public function merge(Metadata $metadata, bool $override = false): Metadata
    {
        $merged = (array) $this + (array) $metadata;

        if ($override) {
            $merged = array_merge((array) $this, (array) $metadata);
        }

        return new self($merged);
    }
}
