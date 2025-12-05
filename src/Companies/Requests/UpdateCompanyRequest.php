<?php

namespace Intercom\Companies\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Types\UpdateCompanyRequestBody;

class UpdateCompanyRequest extends JsonSerializableType
{
    /**
     * @var string $companyId The unique identifier for the company which is given by Intercom
     */
    private string $companyId;

    /**
     * @var ?UpdateCompanyRequestBody $body
     */
    private ?UpdateCompanyRequestBody $body;

    /**
     * @param array{
     *   companyId: string,
     *   body?: ?UpdateCompanyRequestBody,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->companyId = $values['companyId'];
        $this->body = $values['body'] ?? null;
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

    /**
     * @return ?UpdateCompanyRequestBody
     */
    public function getBody(): ?UpdateCompanyRequestBody
    {
        return $this->body;
    }

    /**
     * @param ?UpdateCompanyRequestBody $value
     */
    public function setBody(?UpdateCompanyRequestBody $value = null): self
    {
        $this->body = $value;
        return $this;
    }
}
