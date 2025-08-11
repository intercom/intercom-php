<?php

namespace Intercom\Unstable\Companies\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class AttachContactToACompanyRequest extends JsonSerializableType
{
    /**
     * @var string $id The unique identifier for the contact which is given by Intercom
     */
    private string $id;

    /**
     * @var string $companyId The unique identifier for the company which is given by Intercom
     */
    #[JsonProperty('company_id')]
    private string $companyId;

    /**
     * @param array{
     *   id: string,
     *   companyId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->companyId = $values['companyId'];
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
