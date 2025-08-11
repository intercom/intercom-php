<?php

namespace Intercom\Admins\Requests;

use Intercom\Core\Json\JsonSerializableType;

class ListAllActivityLogsRequest extends JsonSerializableType
{
    /**
     * @var string $createdAtAfter The start date that you request data for. It must be formatted as a UNIX timestamp.
     */
    private string $createdAtAfter;

    /**
     * @var ?string $createdAtBefore The end date that you request data for. It must be formatted as a UNIX timestamp.
     */
    private ?string $createdAtBefore;

    /**
     * @param array{
     *   createdAtAfter: string,
     *   createdAtBefore?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->createdAtAfter = $values['createdAtAfter'];
        $this->createdAtBefore = $values['createdAtBefore'] ?? null;
    }

    /**
     * @return string
     */
    public function getCreatedAtAfter(): string
    {
        return $this->createdAtAfter;
    }

    /**
     * @param string $value
     */
    public function setCreatedAtAfter(string $value): self
    {
        $this->createdAtAfter = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCreatedAtBefore(): ?string
    {
        return $this->createdAtBefore;
    }

    /**
     * @param ?string $value
     */
    public function setCreatedAtBefore(?string $value = null): self
    {
        $this->createdAtBefore = $value;
        return $this;
    }
}
