<?php

declare(strict_types=1);

namespace Micrum\Messaging;

use Micrum\Messaging\Message\Metadata;
use Micrum\Messaging\Message\Payload;

/**
 * Trait MessageTrait.
 */
trait MessageTrait
{
    /**
     * @var Metadata
     */
    protected $metadata;

    /**
     * @var Payload
     */
    protected $payload;

    /**
     * @var string
     */
    protected $messageName;

    /**
     * @return Metadata
     */
    public function metadata(): Metadata
    {
        return $this->metadata;
    }

    /**
     * @return Payload
     */
    public function payload(): Payload
    {
        return $this->payload;
    }

    /**
     * @param Metadata $metadata
     *
     * @return self
     */
    public function addMetadata(Metadata $metadata): self
    {
        $clone = clone $this;
        $clone->metadata = $this->metadata ? $metadata->merge($this->metadata) : $metadata;

        return $clone;
    }

    public function jsonSerialize()
    {
        return [
            'metadata' => $this->metadata ?? null,
            'payload' => $this->payload,
        ];
    }
}
