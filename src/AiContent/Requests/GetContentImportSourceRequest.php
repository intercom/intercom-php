<?php

namespace Intercom\AiContent\Requests;

use Intercom\Core\Json\JsonSerializableType;

class GetContentImportSourceRequest extends JsonSerializableType
{
    /**
     * @var string $sourceId The unique identifier for the content import source which is given by Intercom.
     */
    private string $sourceId;

    /**
     * @param array{
     *   sourceId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->sourceId = $values['sourceId'];
    }

    /**
     * @return string
     */
    public function getSourceId(): string
    {
        return $this->sourceId;
    }

    /**
     * @param string $value
     */
    public function setSourceId(string $value): self
    {
        $this->sourceId = $value;
        return $this;
    }
}
