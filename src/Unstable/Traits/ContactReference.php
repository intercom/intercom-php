<?php

namespace Intercom\Unstable\Traits;

use Intercom\Core\Json\JsonProperty;

/**
 * reference to contact object
 *
 * @property ?'contact' $type
 * @property ?string $id
 * @property ?string $externalId
 */
trait ContactReference
{
    /**
     * @var ?'contact' $type always contact
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The unique identifier for the contact which is given by Intercom.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $externalId The unique identifier for the contact which is provided by the Client.
     */
    #[JsonProperty('external_id')]
    private ?string $externalId;

    /**
     * @return ?'contact'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'contact' $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
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
}
