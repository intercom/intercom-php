<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * The Conversation Rating object which contains information on the rating and/or remark added by a Contact and the Admin assigned to the conversation.
 */
class ConversationRating extends JsonSerializableType
{
    /**
     * @var ?int $rating The rating, between 1 and 5, for the conversation.
     */
    #[JsonProperty('rating')]
    private ?int $rating;

    /**
     * @var ?string $remark An optional field to add a remark to correspond to the number rating
     */
    #[JsonProperty('remark')]
    private ?string $remark;

    /**
     * @var ?int $createdAt The time the rating was requested in the conversation being rated.
     */
    #[JsonProperty('created_at')]
    private ?int $createdAt;

    /**
     * @var ?int $updatedAt The time the rating was last updated.
     */
    #[JsonProperty('updated_at')]
    private ?int $updatedAt;

    /**
     * @var ?ContactReference $contact
     */
    #[JsonProperty('contact')]
    private ?ContactReference $contact;

    /**
     * @var ?Reference $teammate
     */
    #[JsonProperty('teammate')]
    private ?Reference $teammate;

    /**
     * @param array{
     *   rating?: ?int,
     *   remark?: ?string,
     *   createdAt?: ?int,
     *   updatedAt?: ?int,
     *   contact?: ?ContactReference,
     *   teammate?: ?Reference,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->rating = $values['rating'] ?? null;
        $this->remark = $values['remark'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->contact = $values['contact'] ?? null;
        $this->teammate = $values['teammate'] ?? null;
    }

    /**
     * @return ?int
     */
    public function getRating(): ?int
    {
        return $this->rating;
    }

    /**
     * @param ?int $value
     */
    public function setRating(?int $value = null): self
    {
        $this->rating = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getRemark(): ?string
    {
        return $this->remark;
    }

    /**
     * @param ?string $value
     */
    public function setRemark(?string $value = null): self
    {
        $this->remark = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getCreatedAt(): ?int
    {
        return $this->createdAt;
    }

    /**
     * @param ?int $value
     */
    public function setCreatedAt(?int $value = null): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getUpdatedAt(): ?int
    {
        return $this->updatedAt;
    }

    /**
     * @param ?int $value
     */
    public function setUpdatedAt(?int $value = null): self
    {
        $this->updatedAt = $value;
        return $this;
    }

    /**
     * @return ?ContactReference
     */
    public function getContact(): ?ContactReference
    {
        return $this->contact;
    }

    /**
     * @param ?ContactReference $value
     */
    public function setContact(?ContactReference $value = null): self
    {
        $this->contact = $value;
        return $this;
    }

    /**
     * @return ?Reference
     */
    public function getTeammate(): ?Reference
    {
        return $this->teammate;
    }

    /**
     * @param ?Reference $value
     */
    public function setTeammate(?Reference $value = null): self
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
