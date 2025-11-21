<?php

namespace Intercom\AiContent\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * An external source for External Pages that you add to your Fin Content Library.
 */
class ContentImportSource extends JsonSerializableType
{
    /**
     * @var 'content_import_source' $type Always external_page
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var int $id The unique identifier for the content import source which is given by Intercom.
     */
    #[JsonProperty('id')]
    private int $id;

    /**
     * @var int $lastSyncedAt The time when the content import source was last synced.
     */
    #[JsonProperty('last_synced_at')]
    private int $lastSyncedAt;

    /**
     * @var value-of<ContentImportSourceSyncBehavior> $syncBehavior If you intend to create or update External Pages via the API, this should be set to `api`.
     */
    #[JsonProperty('sync_behavior')]
    private string $syncBehavior;

    /**
     * @var value-of<ContentImportSourceStatus> $status The status of the content import source.
     */
    #[JsonProperty('status')]
    private string $status;

    /**
     * @var string $url The URL of the root of the external source.
     */
    #[JsonProperty('url')]
    private string $url;

    /**
     * @var int $createdAt The time when the content import source was created.
     */
    #[JsonProperty('created_at')]
    private int $createdAt;

    /**
     * @var int $updatedAt The time when the content import source was last updated.
     */
    #[JsonProperty('updated_at')]
    private int $updatedAt;

    /**
     * @param array{
     *   type: 'content_import_source',
     *   id: int,
     *   lastSyncedAt: int,
     *   syncBehavior: value-of<ContentImportSourceSyncBehavior>,
     *   status: value-of<ContentImportSourceStatus>,
     *   url: string,
     *   createdAt: int,
     *   updatedAt: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->id = $values['id'];
        $this->lastSyncedAt = $values['lastSyncedAt'];
        $this->syncBehavior = $values['syncBehavior'];
        $this->status = $values['status'];
        $this->url = $values['url'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return 'content_import_source'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'content_import_source' $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $value
     */
    public function setId(int $value): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getLastSyncedAt(): int
    {
        return $this->lastSyncedAt;
    }

    /**
     * @param int $value
     */
    public function setLastSyncedAt(int $value): self
    {
        $this->lastSyncedAt = $value;
        return $this;
    }

    /**
     * @return value-of<ContentImportSourceSyncBehavior>
     */
    public function getSyncBehavior(): string
    {
        return $this->syncBehavior;
    }

    /**
     * @param value-of<ContentImportSourceSyncBehavior> $value
     */
    public function setSyncBehavior(string $value): self
    {
        $this->syncBehavior = $value;
        return $this;
    }

    /**
     * @return value-of<ContentImportSourceStatus>
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param value-of<ContentImportSourceStatus> $value
     */
    public function setStatus(string $value): self
    {
        $this->status = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $value
     */
    public function setUrl(string $value): self
    {
        $this->url = $value;
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
     * @return int
     */
    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    /**
     * @param int $value
     */
    public function setUpdatedAt(int $value): self
    {
        $this->updatedAt = $value;
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
