<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * deleted contact object
 */
class ContactDeleted extends JsonSerializableType
{
    /**
     * @var 'contact' $type always contact
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $id The unique identifier for the contact which is given by Intercom.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var ?string $externalId The unique identifier for the contact which is provided by the Client.
     */
    #[JsonProperty('external_id')]
    private ?string $externalId;

    /**
     * @var bool $deleted Whether the contact is deleted or not.
     */
    #[JsonProperty('deleted')]
    private bool $deleted;

    /**
     * @param array{
     *   type: 'contact',
     *   id: string,
     *   deleted: bool,
     *   externalId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->id = $values['id'];
        $this->externalId = $values['externalId'] ?? null;
        $this->deleted = $values['deleted'];
    }

    /**
     * @return 'contact'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'contact' $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $value
     */
    public function setId(string $value): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    /**
     * @param ?string $value
     */
    public function setExternalId(?string $value = null): self
    {
        $this->externalId = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getDeleted(): bool
    {
        return $this->deleted;
    }

    /**
     * @param bool $value
     */
    public function setDeleted(bool $value): self
    {
        $this->deleted = $value;
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
