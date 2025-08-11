<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Traits\ContactReplyBaseRequest;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * Payload of the request to reply on behalf of a contact using their `email`
 */
class ContactReplyEmailRequest extends JsonSerializableType
{
    use ContactReplyBaseRequest;

    /**
     * @var string $email The email you have defined for the user.
     */
    #[JsonProperty('email')]
    private string $email;

    /**
     * @var ?array<ConversationAttachmentFiles> $attachmentFiles A list of files that will be added as attachments.
     */
    #[JsonProperty('attachment_files'), ArrayType([ConversationAttachmentFiles::class])]
    private ?array $attachmentFiles;

    /**
     * @param array{
     *   messageType: 'comment',
     *   type: 'user',
     *   body: string,
     *   email: string,
     *   createdAt?: ?int,
     *   attachmentUrls?: ?array<string>,
     *   attachmentFiles?: ?array<ConversationAttachmentFiles>,
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
        $this->attachmentFiles = $values['attachmentFiles'] ?? null;
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
     * @return ?array<ConversationAttachmentFiles>
     */
    public function getAttachmentFiles(): ?array
    {
        return $this->attachmentFiles;
    }

    /**
     * @param ?array<ConversationAttachmentFiles> $value
     */
    public function setAttachmentFiles(?array $value = null): self
    {
        $this->attachmentFiles = $value;
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
