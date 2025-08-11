<?php

namespace Intercom\Companies\Requests;

use Intercom\Core\Json\JsonSerializableType;

class UpdateCompanyRequest extends JsonSerializableType
{
    /**
     * @var string $companyId The unique identifier for the company which is given by Intercom
     */
    private string $companyId;

    /**
     * @param array{
     *   companyId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->companyId = $values['companyId'];
    }

    /**
     * @return string
     */
    public function getCompanyId(): string
    {
        return $this->companyId;
    }

    /**
     * @param string $value
     */
    public function setCompanyId(string $value): self
    {
        $this->companyId = $value;
        return $this;
    }
}
