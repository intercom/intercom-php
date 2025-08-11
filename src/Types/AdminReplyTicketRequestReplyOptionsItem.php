<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class AdminReplyTicketRequestReplyOptionsItem extends JsonSerializableType
{
    /**
     * @var string $text The text to display in this quick reply option.
     */
    #[JsonProperty('text')]
    private string $text;

    /**
     * @var string $uuid A unique identifier for this quick reply option. This value will be available within the metadata of the comment ticket part that is created when a user clicks on this reply option.
     */
    #[JsonProperty('uuid')]
    private string $uuid;

    /**
     * @param array{
     *   text: string,
     *   uuid: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->text = $values['text'];
        $this->uuid = $values['uuid'];
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $value
     */
    public function setText(string $value): self
    {
        $this->text = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @param string $value
     */
    public function setUuid(string $value): self
    {
        $this->uuid = $value;
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
