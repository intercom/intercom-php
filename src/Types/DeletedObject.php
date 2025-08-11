<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Response returned when an object is deleted
 */
class DeletedObject extends JsonSerializableType
{
    /**
     * @var string $id The unique identifier for the news item which you provided in the URL.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var 'news-item' $object The type of object which was deleted - news-item.
     */
    #[JsonProperty('object')]
    private string $object;

    /**
     * @var bool $deleted Whether the news item was deleted successfully or not.
     */
    #[JsonProperty('deleted')]
    private bool $deleted;

    /**
     * @param array{
     *   id: string,
     *   object: 'news-item',
     *   deleted: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->object = $values['object'];
        $this->deleted = $values['deleted'];
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $value
     */
    public function setId(string $value): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return 'news-item'
     */
    public function getObject(): string
    {
        return $this->object;
    }

    /**
     * @param 'news-item' $value
     */
    public function setObject(string $value): self
    {
        $this->object = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getDeleted(): bool
    {
        return $this->deleted;
    }

    /**
     * @param bool $value
     */
    public function setDeleted(bool $value): self
    {
        $this->deleted = $value;
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
