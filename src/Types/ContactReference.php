<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * reference to contact object
 */
class ContactReference extends JsonSerializableType
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
     * @param array{
     *   type: 'contact',
     *   id: string,
     *   externalId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->id = $values['id'];
        $this->externalId = $values['externalId'] ?? null;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
