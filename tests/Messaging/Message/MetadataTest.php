<?php

declare(strict_types=1);

namespace Micrum\Tests\Messaging\Message;

use Micrum\Messaging\Message\Metadata;
use PHPUnit\Framework\TestCase;

class MetadataTest extends TestCase
{
    protected function assertPreConditions(): void
    {
        self::assertTrue(
            class_exists($name = 'Micrum\Messaging\Message\Metadata'),
            sprintf('Class "%s" not found.', $name)
        );
    }

    /**
     * @test
     */
    public function it_can_be_serialized()
    {
        $json = json_encode(new Metadata(['foo' => 'bar']));

        if (JSON_ERROR_NONE !== ($err = json_last_error())) {
            $this->fail(sprintf('Unexpected exception while serializing metadata object: %s', $err));
        }

        self::assertSame('{"foo":"bar"}', $json);
    }

    /**
     * @test
     */
    public function it_can_be_deserialized()
    {
        $metadata = json_decode('{"foo":"bar"}', true);

        if (JSON_ERROR_NONE !== ($err = json_last_error())) {
            $this->fail(sprintf('Unexpected exception while deserializing metadata object: %s', $err));
        }

        self::assertSame(['foo' => 'bar'], $metadata);
    }

    /**
     * @test
     */
    public function it_can_be_merged_with_other_metadata()
    {
        $metadata = new Metadata(['a' => 1, 'b' => 2]);

        $merged = $metadata->merge(new Metadata(['b' => 4, 'c' => 3]));
        self::assertEquals(new Metadata(['a' => 1, 'b' => 2, 'c' => 3]), $merged);

        $merged = $metadata->merge(new Metadata(['b' => 4, 'c' => 3]), true);
        self::assertEquals(new Metadata(['a' => 1, 'b' => 4, 'c' => 3]), $merged);
    }
}
