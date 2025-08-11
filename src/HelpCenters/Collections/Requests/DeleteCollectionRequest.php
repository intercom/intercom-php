<?php

namespace Intercom\HelpCenters\Collections\Requests;

use Intercom\Core\Json\JsonSerializableType;

class DeleteCollectionRequest extends JsonSerializableType
{
    /**
     * @var string $collectionId The unique identifier for the collection which is given by Intercom.
     */
    private string $collectionId;

    /**
     * @param array{
     *   collectionId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->collectionId = $values['collectionId'];
    }

    /**
     * @return string
     */
    public function getCollectionId(): string
    {
        return $this->collectionId;
    }

    /**
     * @param string $value
     */
    public function setCollectionId(string $value): self
    {
        $this->collectionId = $value;
        return $this;
    }
}
