<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Traits\ContactReplyBaseRequest;
use Intercom\Core\Json\JsonProperty;

/**
 * Payload of the request to reply on behalf of a contact using their `email`
 */
class ContactReplyTicketEmailRequest extends JsonSerializableType
{
    use ContactReplyBaseRequest;

    /**
     * @var string $email The email you have defined for the user.
     */
    #[JsonProperty('email')]
    private string $email;

    /**
     * @param array{
     *   messageType: 'comment',
     *   type: 'user',
     *   body: string,
     *   email: string,
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
        $this->email = $values['email'];
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $value
     */
    public function setEmail(string $value): self
    {
        $this->email = $value;
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
