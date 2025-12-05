<?php

namespace Intercom\Conversations\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use DateTime;
use Intercom\Types\CustomObjectInstanceList;
use Intercom\Core\Types\ArrayType;
use Intercom\Core\Types\Union;

class UpdateConversationRequest extends JsonSerializableType
{
    /**
     * @var string $conversationId The id of the conversation to target
     */
    private string $conversationId;

    /**
     * @var ?string $displayAs Set to plaintext to retrieve conversation messages in plain text.
     */
    private ?string $displayAs;

    /**
     * @var ?bool $read Mark a conversation as read within Intercom.
     */
    #[JsonProperty('read')]
    private ?bool $read;

    /**
     * @var ?string $title The title given to the conversation
     */
    #[JsonProperty('title')]
    private ?string $title;

    /**
     * @var ?array<string, (
     *    string
     *   |int
     *   |DateTime
     *   |CustomObjectInstanceList
     * )> $customAttributes
     */
    #[JsonProperty('custom_attributes'), ArrayType(['string' => new Union('string', 'integer', 'datetime', CustomObjectInstanceList::class)])]
    private ?array $customAttributes;

    /**
     * @var ?string $companyId The ID of the company that the conversation is associated with. The unique identifier for the company which is given by Intercom. Set to nil to remove company.
     */
    #[JsonProperty('company_id')]
    private ?string $companyId;

    /**
     * @param array{
     *   conversationId: string,
     *   displayAs?: ?string,
     *   read?: ?bool,
     *   title?: ?string,
     *   customAttributes?: ?array<string, (
     *    string
     *   |int
     *   |DateTime
     *   |CustomObjectInstanceList
     * )>,
     *   companyId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->conversationId = $values['conversationId'];
        $this->displayAs = $values['displayAs'] ?? null;
        $this->read = $values['read'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->customAttributes = $values['customAttributes'] ?? null;
        $this->companyId = $values['companyId'] ?? null;
    }

    /**
     * @return string
     */
    public function getConversationId(): string
    {
        return $this->conversationId;
    }

    /**
     * @param string $value
     */
    public function setConversationId(string $value): self
    {
        $this->conversationId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDisplayAs(): ?string
    {
        return $this->displayAs;
    }

    /**
     * @param ?string $value
     */
    public function setDisplayAs(?string $value = null): self
    {
        $this->displayAs = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getRead(): ?bool
    {
        return $this->read;
    }

    /**
     * @param ?bool $value
     */
    public function setRead(?bool $value = null): self
    {
        $this->read = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param ?string $value
     */
    public function setTitle(?string $value = null): self
    {
        $this->title = $value;
        return $this;
    }

    /**
     * @return ?array<string, (
     *    string
     *   |int
     *   |DateTime
     *   |CustomObjectInstanceList
     * )>
     */
    public function getCustomAttributes(): ?array
    {
        return $this->customAttributes;
    }

    /**
     * @param ?array<string, (
     *    string
     *   |int
     *   |DateTime
     *   |CustomObjectInstanceList
     * )> $value
     */
    public function setCustomAttributes(?array $value = null): self
    {
        $this->customAttributes = $value;
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
}
