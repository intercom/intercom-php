<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use DateTime;
use Intercom\Core\Types\ArrayType;
use Intercom\Core\Types\Union;

/**
 * You can create an phone switch
 */
class CreatePhoneSwitchRequest extends JsonSerializableType
{
    /**
     * @var string $phone Phone number in E.164 format, that will receive the SMS to continue the conversation in the Messenger.
     */
    #[JsonProperty('phone')]
    private string $phone;

    /**
     * @var ?array<string, (
     *    string
     *   |int
     *   |DateTime
     *   |CustomObjectInstanceList
     * )> $customAttributes
     */
    #[JsonProperty('custom_attributes'), ArrayType(['string' => new Union('string', 'integer', 'datetime', CustomObjectInstanceList::class)])]
    private ?array $customAttributes;

    /**
     * @param array{
     *   phone: string,
     *   customAttributes?: ?array<string, (
     *    string
     *   |int
     *   |DateTime
     *   |CustomObjectInstanceList
     * )>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->phone = $values['phone'];
        $this->customAttributes = $values['customAttributes'] ?? null;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $value
     */
    public function setPhone(string $value): self
    {
        $this->phone = $value;
        return $this;
    }

    /**
     * @return ?array<string, (
     *    string
     *   |int
     *   |DateTime
     *   |CustomObjectInstanceList
     * )>
     */
    public function getCustomAttributes(): ?array
    {
        return $this->customAttributes;
    }

    /**
     * @param ?array<string, (
     *    string
     *   |int
     *   |DateTime
     *   |CustomObjectInstanceList
     * )> $value
     */
    public function setCustomAttributes(?array $value = null): self
    {
        $this->customAttributes = $value;
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
