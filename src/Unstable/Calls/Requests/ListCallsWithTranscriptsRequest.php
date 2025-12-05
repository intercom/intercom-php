<?php

namespace Intercom\Unstable\Calls\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

class ListCallsWithTranscriptsRequest extends JsonSerializableType
{
    /**
     * @var array<string> $conversationIds A list of conversation ids to fetch calls for. Maximum 20.
     */
    #[JsonProperty('conversation_ids'), ArrayType(['string'])]
    private array $conversationIds;

    /**
     * @param array{
     *   conversationIds: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->conversationIds = $values['conversationIds'];
    }

    /**
     * @return array<string>
     */
    public function getConversationIds(): array
    {
        return $this->conversationIds;
    }

    /**
     * @param array<string> $value
     */
    public function setConversationIds(array $value): self
    {
        $this->conversationIds = $value;
        return $this;
    }
}
