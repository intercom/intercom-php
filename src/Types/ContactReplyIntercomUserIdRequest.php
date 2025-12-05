<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Traits\ContactReplyBaseRequest;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * Payload of the request to reply on behalf of a contact using their `intercom_user_id`
 */
class ContactReplyIntercomUserIdRequest extends JsonSerializableType
{
    use ContactReplyBaseRequest;

    /**
     * @var string $intercomUserId The identifier for the contact as given by Intercom.
     */
    #[JsonProperty('intercom_user_id')]
    private string $intercomUserId;

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
     *   intercomUserId: string,
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
        $this->intercomUserId = $values['intercomUserId'];
        $this->attachmentFiles = $values['attachmentFiles'] ?? null;
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
