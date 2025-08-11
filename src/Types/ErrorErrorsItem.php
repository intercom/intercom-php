<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class ErrorErrorsItem extends JsonSerializableType
{
    /**
     * @var string $code A string indicating the kind of error, used to further qualify the HTTP response code
     */
    #[JsonProperty('code')]
    private string $code;

    /**
     * @var ?string $message Optional. Human readable description of the error.
     */
    #[JsonProperty('message')]
    private ?string $message;

    /**
     * @var ?string $field Optional. Used to identify a particular field or query parameter that was in error.
     */
    #[JsonProperty('field')]
    private ?string $field;

    /**
     * @param array{
     *   code: string,
     *   message?: ?string,
     *   field?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->code = $values['code'];
        $this->message = $values['message'] ?? null;
        $this->field = $values['field'] ?? null;
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
     * @return ?string
     */
    public function getField(): ?string
    {
        return $this->field;
    }

    /**
     * @param ?string $value
     */
    public function setField(?string $value = null): self
    {
        $this->field = $value;
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
