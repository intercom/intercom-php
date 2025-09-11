<?php

namespace Intercom\Companies\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class AttachContactToCompanyRequest extends JsonSerializableType
{
    /**
     * @var int $contactId The unique identifier for the contact which is given by Intercom
     */
    private int $contactId;

    /**
     * @var string $companyId The unique identifier for the company which is given by Intercom
     */
    #[JsonProperty('id')]
    private string $companyId;

    /**
     * @param array{
     *   contactId: int,
     *   companyId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->contactId = $values['contactId'];
        $this->companyId = $values['companyId'];
    }

    /**
     * @return int
     */
    public function getContactId(): int
    {
        return $this->contactId;
    }

    /**
     * @param int $value
     */
    public function setContactId(int $value): self
    {
        $this->contactId = $value;
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
