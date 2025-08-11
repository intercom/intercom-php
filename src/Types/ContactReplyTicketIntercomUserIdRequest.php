<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Traits\ContactReplyBaseRequest;
use Intercom\Core\Json\JsonProperty;

/**
 * Payload of the request to reply on behalf of a contact using their `intercom_user_id`
 */
class ContactReplyTicketIntercomUserIdRequest extends JsonSerializableType
{
    use ContactReplyBaseRequest;

    /**
     * @var string $intercomUserId The identifier for the contact as given by Intercom.
     */
    #[JsonProperty('intercom_user_id')]
    private string $intercomUserId;

    /**
     * @param array{
     *   messageType: 'comment',
     *   type: 'user',
     *   body: string,
     *   intercomUserId: string,
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
        $this->intercomUserId = $values['intercomUserId'];
    }

    /**
     * @return string
     */
    public function getIntercomUserId(): string
    {
        return $this->intercomUserId;
    }

    /**
     * @param string $value
     */
    public function setIntercomUserId(string $value): self
    {
        $this->intercomUserId = $value;
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
