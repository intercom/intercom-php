<?php

namespace Intercom\Unstable\AiContent\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Unstable\AiContent\Types\CreateContentImportSourceRequestStatus;

class CreateContentImportSourceRequest extends JsonSerializableType
{
    /**
     * @var 'api' $syncBehavior If you intend to create or update External Pages via the API, this should be set to `api`.
     */
    #[JsonProperty('sync_behavior')]
    private string $syncBehavior;

    /**
     * @var ?value-of<CreateContentImportSourceRequestStatus> $status The status of the content import source.
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * @var string $url The URL of the content import source.
     */
    #[JsonProperty('url')]
    private string $url;

    /**
     * @param array{
     *   syncBehavior: 'api',
     *   url: string,
     *   status?: ?value-of<CreateContentImportSourceRequestStatus>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->syncBehavior = $values['syncBehavior'];
        $this->status = $values['status'] ?? null;
        $this->url = $values['url'];
    }

    /**
     * @return 'api'
     */
    public function getSyncBehavior(): string
    {
        return $this->syncBehavior;
    }

    /**
     * @param 'api' $value
     */
    public function setSyncBehavior(string $value): self
    {
        $this->syncBehavior = $value;
        return $this;
    }

    /**
     * @return ?value-of<CreateContentImportSourceRequestStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<CreateContentImportSourceRequestStatus> $value
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
