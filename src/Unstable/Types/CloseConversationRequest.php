<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Payload of the request to close a conversation
 */
class CloseConversationRequest extends JsonSerializableType
{
    /**
     * @var 'admin' $type
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $adminId The id of the admin who is performing the action.
     */
    #[JsonProperty('admin_id')]
    private string $adminId;

    /**
     * @var ?string $body Optionally you can leave a message in the conversation to provide additional context to the user and other teammates.
     */
    #[JsonProperty('body')]
    private ?string $body;

    /**
     * @param array{
     *   type: 'admin',
     *   adminId: string,
     *   body?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->adminId = $values['adminId'];
        $this->body = $values['body'] ?? null;
    }

    /**
     * @return 'admin'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'admin' $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAdminId(): string
    {
        return $this->adminId;
    }

    /**
     * @param string $value
     */
    public function setAdminId(string $value): self
    {
        $this->adminId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getBody(): ?string
    {
        return $this->body;
    }

    /**
     * @param ?string $value
     */
    public function setBody(?string $value = null): self
    {
        $this->body = $value;
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
