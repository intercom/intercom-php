<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * App is a workspace on Intercom
 */
class App extends JsonSerializableType
{
    /**
     * @var string $type
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $idCode The id of the app.
     */
    #[JsonProperty('id_code')]
    private string $idCode;

    /**
     * @var string $name The name of the app.
     */
    #[JsonProperty('name')]
    private string $name;

    /**
     * @var string $region The Intercom region the app is located in.
     */
    #[JsonProperty('region')]
    private string $region;

    /**
     * @var string $timezone The timezone of the region where the app is located.
     */
    #[JsonProperty('timezone')]
    private string $timezone;

    /**
     * @var int $createdAt When the app was created.
     */
    #[JsonProperty('created_at')]
    private int $createdAt;

    /**
     * @var bool $identityVerification Whether or not the app uses identity verification.
     */
    #[JsonProperty('identity_verification')]
    private bool $identityVerification;

    /**
     * @param array{
     *   type: string,
     *   idCode: string,
     *   name: string,
     *   region: string,
     *   timezone: string,
     *   createdAt: int,
     *   identityVerification: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->idCode = $values['idCode'];
        $this->name = $values['name'];
        $this->region = $values['region'];
        $this->timezone = $values['timezone'];
        $this->createdAt = $values['createdAt'];
        $this->identityVerification = $values['identityVerification'];
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
     * @return string
     */
    public function getIdCode(): string
    {
        return $this->idCode;
    }

    /**
     * @param string $value
     */
    public function setIdCode(string $value): self
    {
        $this->idCode = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $value
     */
    public function setName(string $value): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * @param string $value
     */
    public function setRegion(string $value): self
    {
        $this->region = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimezone(): string
    {
        return $this->timezone;
    }

    /**
     * @param string $value
     */
    public function setTimezone(string $value): self
    {
        $this->timezone = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    /**
     * @param int $value
     */
    public function setCreatedAt(int $value): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIdentityVerification(): bool
    {
        return $this->identityVerification;
    }

    /**
     * @param bool $value
     */
    public function setIdentityVerification(bool $value): self
    {
        $this->identityVerification = $value;
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
