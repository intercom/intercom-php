<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class TagCompanyRequestCompaniesItem extends JsonSerializableType
{
    /**
     * @var ?string $id The Intercom defined id representing the company.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $companyId The company id you have defined for the company.
     */
    #[JsonProperty('company_id')]
    private ?string $companyId;

    /**
     * @param array{
     *   id?: ?string,
     *   companyId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->companyId = $values['companyId'] ?? null;
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
    public function getCompanyId(): ?string
    {
        return $this->companyId;
    }

    /**
     * @param ?string $value
     */
    public function setCompanyId(?string $value = null): self
    {
        $this->companyId = $value;
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
