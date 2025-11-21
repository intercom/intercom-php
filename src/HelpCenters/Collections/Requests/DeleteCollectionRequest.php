<?php

namespace Intercom\HelpCenters\Collections\Requests;

use Intercom\Core\Json\JsonSerializableType;

class DeleteCollectionRequest extends JsonSerializableType
{
    /**
     * @var int $collectionId The unique identifier for the collection which is given by Intercom.
     */
    private int $collectionId;

    /**
     * @param array{
     *   collectionId: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->collectionId = $values['collectionId'];
    }

    /**
     * @return int
     */
    public function getCollectionId(): int
    {
        return $this->collectionId;
    }

    /**
     * @param int $value
     */
    public function setCollectionId(int $value): self
    {
        $this->collectionId = $value;
        return $this;
    }
}
