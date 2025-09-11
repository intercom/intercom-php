<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * An object containing Subscription Types meta data about the SubscriptionTypes that a contact has.
 */
class ContactSubscriptionTypes extends JsonSerializableType
{
    /**
     * @var ?array<AddressableList> $data This object represents the subscriptions attached to a contact.
     */
    #[JsonProperty('data'), ArrayType([AddressableList::class])]
    private ?array $data;

    /**
     * @var ?string $url Url to get more subscription type resources for this contact
     */
    #[JsonProperty('url')]
    private ?string $url;

    /**
     * @var ?int $totalCount Int representing the total number of subscription types attached to this contact
     */
    #[JsonProperty('total_count')]
    private ?int $totalCount;

    /**
     * @var ?bool $hasMore Whether there's more Addressable Objects to be viewed. If true, use the url to view all
     */
    #[JsonProperty('has_more')]
    private ?bool $hasMore;

    /**
     * @param array{
     *   data?: ?array<AddressableList>,
     *   url?: ?string,
     *   totalCount?: ?int,
     *   hasMore?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->data = $values['data'] ?? null;
        $this->url = $values['url'] ?? null;
        $this->totalCount = $values['totalCount'] ?? null;
        $this->hasMore = $values['hasMore'] ?? null;
    }

    /**
     * @return ?array<AddressableList>
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param ?array<AddressableList> $value
     */
    public function setData(?array $value = null): self
    {
        $this->data = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param ?string $value
     */
    public function setUrl(?string $value = null): self
    {
        $this->url = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getTotalCount(): ?int
    {
        return $this->totalCount;
    }

    /**
     * @param ?int $value
     */
    public function setTotalCount(?int $value = null): self
    {
        $this->totalCount = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getHasMore(): ?bool
    {
        return $this->hasMore;
    }

    /**
     * @param ?bool $value
     */
    public function setHasMore(?bool $value = null): self
    {
        $this->hasMore = $value;
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
