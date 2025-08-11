<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Unstable\Companies\Types\Company;
use Intercom\Core\Types\ArrayType;

class VisitorCompanies extends JsonSerializableType
{
    /**
     * @var ?'company.list' $type The type of the object
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<Company> $companies
     */
    #[JsonProperty('companies'), ArrayType([Company::class])]
    private ?array $companies;

    /**
     * @param array{
     *   type?: ?'company.list',
     *   companies?: ?array<Company>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->companies = $values['companies'] ?? null;
    }

    /**
     * @return ?'company.list'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'company.list' $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?array<Company>
     */
    public function getCompanies(): ?array
    {
        return $this->companies;
    }

    /**
     * @param ?array<Company> $value
     */
    public function setCompanies(?array $value = null): self
    {
        $this->companies = $value;
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
