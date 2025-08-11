<?php

namespace Intercom\Articles\Requests;

use Intercom\Core\Json\JsonSerializableType;

class SearchArticlesRequest extends JsonSerializableType
{
    /**
     * @var ?string $phrase The phrase within your articles to search for.
     */
    private ?string $phrase;

    /**
     * @var ?string $state The state of the Articles returned. One of `published`, `draft` or `all`.
     */
    private ?string $state;

    /**
     * @var ?int $helpCenterId The ID of the Help Center to search in.
     */
    private ?int $helpCenterId;

    /**
     * @var ?bool $highlight Return a highlighted version of the matching content within your articles. Refer to the response schema for more details.
     */
    private ?bool $highlight;

    /**
     * @param array{
     *   phrase?: ?string,
     *   state?: ?string,
     *   helpCenterId?: ?int,
     *   highlight?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->phrase = $values['phrase'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->helpCenterId = $values['helpCenterId'] ?? null;
        $this->highlight = $values['highlight'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getPhrase(): ?string
    {
        return $this->phrase;
    }

    /**
     * @param ?string $value
     */
    public function setPhrase(?string $value = null): self
    {
        $this->phrase = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param ?string $value
     */
    public function setState(?string $value = null): self
    {
        $this->state = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getHelpCenterId(): ?int
    {
        return $this->helpCenterId;
    }

    /**
     * @param ?int $value
     */
    public function setHelpCenterId(?int $value = null): self
    {
        $this->helpCenterId = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getHighlight(): ?bool
    {
        return $this->highlight;
    }

    /**
     * @param ?bool $value
     */
    public function setHighlight(?bool $value = null): self
    {
        $this->highlight = $value;
        return $this;
    }
}
