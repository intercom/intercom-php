<?php

namespace Intercom\Articles\Requests;

use Intercom\Core\Json\JsonSerializableType;

class FindArticleRequest extends JsonSerializableType
{
    /**
     * @var int $articleId The unique identifier for the article which is given by Intercom.
     */
    private int $articleId;

    /**
     * @param array{
     *   articleId: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->articleId = $values['articleId'];
    }

    /**
     * @return int
     */
    public function getArticleId(): int
    {
        return $this->articleId;
    }

    /**
     * @param int $value
     */
    public function setArticleId(int $value): self
    {
        $this->articleId = $value;
        return $this;
    }
}
