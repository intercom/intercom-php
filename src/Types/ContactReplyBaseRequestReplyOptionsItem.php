<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class ContactReplyBaseRequestReplyOptionsItem extends JsonSerializableType
{
    /**
     * @var string $text The text of the chosen reply option.
     */
    #[JsonProperty('text')]
    private string $text;

    /**
     * @var string $uuid The unique identifier for the quick reply option selected.
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
