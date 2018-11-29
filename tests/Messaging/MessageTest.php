<?php

declare(strict_types=1);

namespace Micrum\Tests\Messaging;

use Micrum\Messaging\Message;
use Micrum\Messaging\Message\Metadata;
use Micrum\Messaging\Message\Payload;
use Micrum\Messaging\MessageTrait;
use PHPUnit\Framework\TestCase;

class MessageTest extends TestCase
{
    protected function assertPreConditions(): void
    {
        self::assertTrue(
            interface_exists($name = 'Micrum\Messaging\Message'),
            sprintf('Interface "%s" not found.', $name)
        );
    }

    /**
     * @test
     */
    public function it_can_be_serialized()
    {
        $json = json_encode(new DummyMessage(new Payload(), new Metadata()));

        if (JSON_ERROR_NONE !== ($err = json_last_error())) {
            $this->fail(sprintf('Unexpected exception while serializing message object: %s', $err));
        }

        self::assertSame('{"metadata":[],"payload":[]}', $json);
    }

    /**
     * @test
     */
    public function it_can_be_deserialized()
    {
        $msg = json_decode('{"metadata":[],"payload":[]}', true);

        if (JSON_ERROR_NONE !== ($err = json_last_error())) {
            $this->fail(sprintf('Unexpected exception while deserializing message object: %s', $err));
        }

        self::assertSame(['metadata' => [], 'payload' => []], $msg);
    }

    /**
     * @test
     */
    public function it_should_clone_message_when_adding_metadata()
    {
        $msg = new DummyMessage(new Payload([]));
        $clone = $msg->addMetadata(new Metadata(['a' => 1]));

        self::assertNotSame($msg, $clone);
        self::assertEquals(new Payload([]), $msg->payload());
        self::assertEquals(new Metadata(['a' => 1]), $clone->metadata());
    }
}

class DummyMessage implements Message
{
    use MessageTrait;

    public function __construct(Payload $payload, Metadata $metadata = null)
    {
        $this->payload = $payload;
        $this->metadata = $metadata;
    }
}
