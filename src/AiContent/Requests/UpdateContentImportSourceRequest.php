<?php

namespace Intercom\AiContent\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\AiContent\Types\UpdateContentImportSourceRequestSyncBehavior;
use Intercom\Core\Json\JsonProperty;
use Intercom\AiContent\Types\UpdateContentImportSourceRequestStatus;

class UpdateContentImportSourceRequest extends JsonSerializableType
{
    /**
     * @var string $sourceId The unique identifier for the content import source which is given by Intercom.
     */
    private string $sourceId;

    /**
     * @var value-of<UpdateContentImportSourceRequestSyncBehavior> $syncBehavior If you intend to create or update External Pages via the API, this should be set to `api`. You can not change the value to or from api.
     */
    #[JsonProperty('sync_behavior')]
    private string $syncBehavior;

    /**
     * @var ?value-of<UpdateContentImportSourceRequestStatus> $status The status of the content import source.
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * @var string $url The URL of the content import source. This may only be different from the existing value if the sync behavior is API.
     */
    #[JsonProperty('url')]
    private string $url;

    /**
     * @param array{
     *   sourceId: string,
     *   syncBehavior: value-of<UpdateContentImportSourceRequestSyncBehavior>,
     *   url: string,
     *   status?: ?value-of<UpdateContentImportSourceRequestStatus>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->sourceId = $values['sourceId'];
        $this->syncBehavior = $values['syncBehavior'];
        $this->status = $values['status'] ?? null;
        $this->url = $values['url'];
    }

    /**
     * @return string
     */
    public function getSourceId(): string
    {
        return $this->sourceId;
    }

    /**
     * @param string $value
     */
    public function setSourceId(string $value): self
    {
        $this->sourceId = $value;
        return $this;
    }

    /**
     * @return value-of<UpdateContentImportSourceRequestSyncBehavior>
     */
    public function getSyncBehavior(): string
    {
        return $this->syncBehavior;
    }

    /**
     * @param value-of<UpdateContentImportSourceRequestSyncBehavior> $value
     */
    public function setSyncBehavior(string $value): self
    {
        $this->syncBehavior = $value;
        return $this;
    }

    /**
     * @return ?value-of<UpdateContentImportSourceRequestStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<UpdateContentImportSourceRequestStatus> $value
     */
    public function setStatus(?string $value = null): self
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
}
