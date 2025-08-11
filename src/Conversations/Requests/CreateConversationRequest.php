<?php

namespace Intercom\Conversations\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Conversations\Types\CreateConversationRequestFrom;
use Intercom\Core\Json\JsonProperty;

class CreateConversationRequest extends JsonSerializableType
{
    /**
     * @var CreateConversationRequestFrom $from
     */
    #[JsonProperty('from')]
    private CreateConversationRequestFrom $from;

    /**
     * @var string $body The content of the message. HTML is not supported.
     */
    #[JsonProperty('body')]
    private string $body;

    /**
     * @var ?int $createdAt The time the conversation was created as a UTC Unix timestamp. If not provided, the current time will be used. This field is only recommneded for migrating past conversations from another source into Intercom.
     */
    #[JsonProperty('created_at')]
    private ?int $createdAt;

    /**
     * @param array{
     *   from: CreateConversationRequestFrom,
     *   body: string,
     *   createdAt?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->from = $values['from'];
        $this->body = $values['body'];
        $this->createdAt = $values['createdAt'] ?? null;
    }

    /**
     * @return CreateConversationRequestFrom
     */
    public function getFrom(): CreateConversationRequestFrom
    {
        return $this->from;
    }

    /**
     * @param CreateConversationRequestFrom $value
     */
    public function setFrom(CreateConversationRequestFrom $value): self
    {
        $this->from = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $value
     */
    public function setBody(string $value): self
    {
        $this->body = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getCreatedAt(): ?int
    {
        return $this->createdAt;
    }

    /**
     * @param ?int $value
     */
    public function setCreatedAt(?int $value = null): self
    {
        $this->createdAt = $value;
        return $this;
    }
}
