<?php

namespace Intercom\Unstable\Emails\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * A list of email settings
 */
class EmailList extends JsonSerializableType
{
    /**
     * @var ?string $type The type of object
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<EmailSetting> $data
     */
    #[JsonProperty('data'), ArrayType([EmailSetting::class])]
    private ?array $data;

    /**
     * @param array{
     *   type?: ?string,
     *   data?: ?array<EmailSetting>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->data = $values['data'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?string $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?array<EmailSetting>
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param ?array<EmailSetting> $value
     */
    public function setData(?array $value = null): self
    {
        $this->data = $value;
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
