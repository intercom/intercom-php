<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Traits\ContactReplyBaseRequest;
use Intercom\Core\Json\JsonProperty;

/**
 * Payload of the request to reply on behalf of a contact using their `user_id`
 */
class ContactReplyTicketUserIdRequest extends JsonSerializableType
{
    use ContactReplyBaseRequest;

    /**
     * @var string $userId The external_id you have defined for the contact.
     */
    #[JsonProperty('user_id')]
    private string $userId;

    /**
     * @param array{
     *   messageType: 'comment',
     *   type: 'user',
     *   body: string,
     *   userId: string,
     *   createdAt?: ?int,
     *   attachmentUrls?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->messageType = $values['messageType'];
        $this->type = $values['type'];
        $this->body = $values['body'];
        $this->createdAt = $values['createdAt'] ?? null;
        $this->attachmentUrls = $values['attachmentUrls'] ?? null;
        $this->userId = $values['userId'];
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $value
     */
    public function setUserId(string $value): self
    {
        $this->userId = $value;
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
