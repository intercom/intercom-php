<?php

namespace Intercom\Events\Requests;

use Intercom\Core\Json\JsonSerializableType;

class ListEventsRequest extends JsonSerializableType
{
    /**
     * @var ?string $userId user_id query parameter
     */
    private ?string $userId;

    /**
     * @var ?string $intercomUserId intercom_user_id query parameter
     */
    private ?string $intercomUserId;

    /**
     * @var ?string $email email query parameter
     */
    private ?string $email;

    /**
     * @var string $type The value must be user
     */
    private string $type;

    /**
     * @var ?bool $summary summary flag
     */
    private ?bool $summary;

    /**
     * @var ?int $perPage How many results to display per page. Defaults to 15
     */
    private ?int $perPage;

    /**
     * @param array{
     *   type: string,
     *   userId?: ?string,
     *   intercomUserId?: ?string,
     *   email?: ?string,
     *   summary?: ?bool,
     *   perPage?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->userId = $values['userId'] ?? null;
        $this->intercomUserId = $values['intercomUserId'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->type = $values['type'];
        $this->summary = $values['summary'] ?? null;
        $this->perPage = $values['perPage'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }

    /**
     * @param ?string $value
     */
    public function setUserId(?string $value = null): self
    {
        $this->userId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getIntercomUserId(): ?string
    {
        return $this->intercomUserId;
    }

    /**
     * @param ?string $value
     */
    public function setIntercomUserId(?string $value = null): self
    {
        $this->intercomUserId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param ?string $value
     */
    public function setEmail(?string $value = null): self
    {
        $this->email = $value;
        return $this;
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
     * @return ?bool
     */
    public function getSummary(): ?bool
    {
        return $this->summary;
    }

    /**
     * @param ?bool $value
     */
    public function setSummary(?bool $value = null): self
    {
        $this->summary = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getPerPage(): ?int
    {
        return $this->perPage;
    }

    /**
     * @param ?int $value
     */
    public function setPerPage(?int $value = null): self
    {
        $this->perPage = $value;
        return $this;
    }
}
