<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class UpdateArticleRequestBody extends JsonSerializableType
{
    /**
     * @var ?value-of<UpdateArticleRequestBodyParentType> $parentType
     */
    #[JsonProperty('parent_type')]
    private ?string $parentType;

    /**
     * @param array{
     *   parentType?: ?value-of<UpdateArticleRequestBodyParentType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->parentType = $values['parentType'] ?? null;
    }

    /**
     * @return ?value-of<UpdateArticleRequestBodyParentType>
     */
    public function getParentType(): ?string
    {
        return $this->parentType;
    }

    /**
     * @param ?value-of<UpdateArticleRequestBodyParentType> $value
     */
    public function setParentType(?string $value = null): self
    {
        $this->parentType = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
