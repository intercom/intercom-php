<?php

namespace Intercom\InternalArticles\Requests;

use Intercom\Core\Json\JsonSerializableType;

class SearchInternalArticlesRequest extends JsonSerializableType
{
    /**
     * @var ?string $folderId The ID of the folder to search in.
     */
    private ?string $folderId;

    /**
     * @param array{
     *   folderId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->folderId = $values['folderId'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getFolderId(): ?string
    {
        return $this->folderId;
    }

    /**
     * @param ?string $value
     */
    public function setFolderId(?string $value = null): self
    {
        $this->folderId = $value;
        return $this;
    }
}
