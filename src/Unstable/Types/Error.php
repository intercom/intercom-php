<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * The API will return an Error List for a failed request, which will contain one or more Error objects.
 */
class Error extends JsonSerializableType
{
    /**
     * @var string $type The type is error.list
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var ?string $requestId
     */
    #[JsonProperty('request_id')]
    private ?string $requestId;

    /**
     * @var array<ErrorErrorsItem> $errors An array of one or more error objects
     */
    #[JsonProperty('errors'), ArrayType([ErrorErrorsItem::class])]
    private array $errors;

    /**
     * @param array{
     *   type: string,
     *   errors: array<ErrorErrorsItem>,
     *   requestId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->requestId = $values['requestId'] ?? null;
        $this->errors = $values['errors'];
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getRequestId(): ?string
    {
        return $this->requestId;
    }

    /**
     * @param ?string $value
     */
    public function setRequestId(?string $value = null): self
    {
        $this->requestId = $value;
        return $this;
    }

    /**
     * @return array<ErrorErrorsItem>
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @param array<ErrorErrorsItem> $value
     */
    public function setErrors(array $value): self
    {
        $this->errors = $value;
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
