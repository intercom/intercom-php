<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * The Conversation Rating object which contains information on the rating and/or remark added by a Contact and the Admin assigned to the conversation.
 */
class ConversationRating extends JsonSerializableType
{
    /**
     * @var int $rating The rating, between 1 and 5, for the conversation.
     */
    #[JsonProperty('rating')]
    private int $rating;

    /**
     * @var string $remark An optional field to add a remark to correspond to the number rating
     */
    #[JsonProperty('remark')]
    private string $remark;

    /**
     * @var int $createdAt The time the rating was requested in the conversation being rated.
     */
    #[JsonProperty('created_at')]
    private int $createdAt;

    /**
     * @var ContactReference $contact
     */
    #[JsonProperty('contact')]
    private ContactReference $contact;

    /**
     * @var Reference $teammate
     */
    #[JsonProperty('teammate')]
    private Reference $teammate;

    /**
     * @param array{
     *   rating: int,
     *   remark: string,
     *   createdAt: int,
     *   contact: ContactReference,
     *   teammate: Reference,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->rating = $values['rating'];
        $this->remark = $values['remark'];
        $this->createdAt = $values['createdAt'];
        $this->contact = $values['contact'];
        $this->teammate = $values['teammate'];
    }

    /**
     * @return int
     */
    public function getRating(): int
    {
        return $this->rating;
    }

    /**
     * @param int $value
     */
    public function setRating(int $value): self
    {
        $this->rating = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getRemark(): string
    {
        return $this->remark;
    }

    /**
     * @param string $value
     */
    public function setRemark(string $value): self
    {
        $this->remark = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    /**
     * @param int $value
     */
    public function setCreatedAt(int $value): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ContactReference
     */
    public function getContact(): ContactReference
    {
        return $this->contact;
    }

    /**
     * @param ContactReference $value
     */
    public function setContact(ContactReference $value): self
    {
        $this->contact = $value;
        return $this;
    }

    /**
     * @return Reference
     */
    public function getTeammate(): Reference
    {
        return $this->teammate;
    }

    /**
     * @param Reference $value
     */
    public function setTeammate(Reference $value): self
    {
        $this->teammate = $value;
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
