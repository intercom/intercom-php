<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class NotFoundErrorBodyErrorsItem extends JsonSerializableType
{
    /**
     * @var string $code ticket_not_found
     */
    #[JsonProperty('code')]
    private string $code;

    /**
     * @var ?string $message Ticket not found
     */
    #[JsonProperty('message')]
    private ?string $message;

    /**
     * @param array{
     *   code: string,
     *   message?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->code = $values['code'];
        $this->message = $values['message'] ?? null;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $value
     */
    public function setCode(string $value): self
    {
        $this->code = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param ?string $value
     */
    public function setMessage(?string $value = null): self
    {
        $this->message = $value;
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
