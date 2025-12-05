<?php

namespace Intercom\InternalArticles\Requests;

use Intercom\Core\Json\JsonSerializableType;

class DeleteInternalArticleRequest extends JsonSerializableType
{
    /**
     * @var int $internalArticleId The unique identifier for the internal article which is given by Intercom.
     */
    private int $internalArticleId;

    /**
     * @param array{
     *   internalArticleId: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->internalArticleId = $values['internalArticleId'];
    }

    /**
     * @return int
     */
    public function getInternalArticleId(): int
    {
        return $this->internalArticleId;
    }

    /**
     * @param int $value
     */
    public function setInternalArticleId(int $value): self
    {
        $this->internalArticleId = $value;
        return $this;
    }
}
