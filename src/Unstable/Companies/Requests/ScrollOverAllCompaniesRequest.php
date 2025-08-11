<?php

namespace Intercom\Unstable\Companies\Requests;

use Intercom\Core\Json\JsonSerializableType;

class ScrollOverAllCompaniesRequest extends JsonSerializableType
{
    /**
     * @var ?string $scrollParam
     */
    private ?string $scrollParam;

    /**
     * @param array{
     *   scrollParam?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->scrollParam = $values['scrollParam'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getScrollParam(): ?string
    {
        return $this->scrollParam;
    }

    /**
     * @param ?string $value
     */
    public function setScrollParam(?string $value = null): self
    {
        $this->scrollParam = $value;
        return $this;
    }
}
