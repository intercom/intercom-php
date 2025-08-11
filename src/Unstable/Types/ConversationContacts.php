<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * The list of contacts (users or leads) involved in this conversation. This will only contain one customer unless more were added via the group conversation feature.
 */
class ConversationContacts extends JsonSerializableType
{
    /**
     * @var ?'contact.list' $type
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<ContactReference> $contacts The list of contacts (users or leads) involved in this conversation. This will only contain one customer unless more were added via the group conversation feature.
     */
    #[JsonProperty('contacts'), ArrayType([ContactReference::class])]
    private ?array $contacts;

    /**
     * @param array{
     *   type?: ?'contact.list',
     *   contacts?: ?array<ContactReference>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->contacts = $values['contacts'] ?? null;
    }

    /**
     * @return ?'contact.list'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'contact.list' $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?array<ContactReference>
     */
    public function getContacts(): ?array
    {
        return $this->contacts;
    }

    /**
     * @param ?array<ContactReference> $value
     */
    public function setContacts(?array $value = null): self
    {
        $this->contacts = $value;
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
