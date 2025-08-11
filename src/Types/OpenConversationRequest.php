<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Payload of the request to open a conversation
 */
class OpenConversationRequest extends JsonSerializableType
{
    /**
     * @var string $adminId The id of the admin who is performing the action.
     */
    #[JsonProperty('admin_id')]
    private string $adminId;

    /**
     * @param array{
     *   adminId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->adminId = $values['adminId'];
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
