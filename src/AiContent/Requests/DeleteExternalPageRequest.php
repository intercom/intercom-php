<?php

namespace Intercom\AiContent\Requests;

use Intercom\Core\Json\JsonSerializableType;

class DeleteExternalPageRequest extends JsonSerializableType
{
    /**
     * @var string $pageId The unique identifier for the external page which is given by Intercom.
     */
    private string $pageId;

    /**
     * @param array{
     *   pageId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->pageId = $values['pageId'];
    }

    /**
     * @return string
     */
    public function getPageId(): string
    {
        return $this->pageId;
    }

    /**
     * @param string $value
     */
    public function setPageId(string $value): self
    {
        $this->pageId = $value;
        return $this;
    }
}
