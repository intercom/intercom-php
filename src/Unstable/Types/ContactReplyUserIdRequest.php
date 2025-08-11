<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Unstable\Traits\ContactReplyBaseRequest;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * Payload of the request to reply on behalf of a contact using their `user_id`
 */
class ContactReplyUserIdRequest extends JsonSerializableType
{
    use ContactReplyBaseRequest;

    /**
     * @var string $userId The external_id you have defined for the contact.
     */
    #[JsonProperty('user_id')]
    private string $userId;

    /**
     * @var ?array<ConversationAttachmentFiles> $attachmentFiles A list of files that will be added as attachments. You can include up to 10 files.
     */
    #[JsonProperty('attachment_files'), ArrayType([ConversationAttachmentFiles::class])]
    private ?array $attachmentFiles;

    /**
     * @param array{
     *   messageType: 'comment',
     *   type: 'user',
     *   body: string,
     *   userId: string,
     *   createdAt?: ?int,
     *   attachmentUrls?: ?array<string>,
     *   replyOptions?: ?array<ContactReplyBaseRequestReplyOptionsItem>,
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
        $this->replyOptions = $values['replyOptions'] ?? null;
        $this->userId = $values['userId'];
        $this->attachmentFiles = $values['attachmentFiles'] ?? null;
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
