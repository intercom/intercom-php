<?php

namespace Intercom\Articles\Requests;

use Intercom\Core\Json\JsonSerializableType;

class FindArticleRequest extends JsonSerializableType
{
    /**
     * @var string $articleId The unique identifier for the article which is given by Intercom.
     */
    private string $articleId;

    /**
     * @param array{
     *   articleId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->articleId = $values['articleId'];
    }

    /**
     * @return string
     */
    public function getArticleId(): string
    {
        return $this->articleId;
    }

    /**
     * @param string $value
     */
    public function setArticleId(string $value): self
    {
        $this->articleId = $value;
        return $this;
    }
}
