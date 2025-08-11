<?php

namespace Intercom\Unstable\Jobs\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Jobs are tasks that are processed asynchronously by the Intercom system after being enqueued via the API. This allows for efficient handling of operations that may take time to complete, such as data imports or exports. You can check the status of your jobs to monitor their progress and ensure they are completed successfully.
 */
class Jobs extends JsonSerializableType
{
    /**
     * @var ?'job' $type The type of the object
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var string $id The id of the job that's currently being processed or has completed.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var ?string $url API endpoint URL to check the job status.
     */
    #[JsonProperty('url')]
    private ?string $url;

    /**
     * @var ?value-of<JobsStatus> $status The status of the job execution.
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * @var ?string $resourceType The type of resource created during job execution.
     */
    #[JsonProperty('resource_type')]
    private ?string $resourceType;

    /**
     * @var ?string $resourceId The id of the resource created during job execution (e.g. ticket id)
     */
    #[JsonProperty('resource_id')]
    private ?string $resourceId;

    /**
     * @var ?string $resourceUrl The url of the resource created during job exeuction. Use this url to fetch the resource.
     */
    #[JsonProperty('resource_url')]
    private ?string $resourceUrl;

    /**
     * @param array{
     *   id: string,
     *   type?: ?'job',
     *   url?: ?string,
     *   status?: ?value-of<JobsStatus>,
     *   resourceType?: ?string,
     *   resourceId?: ?string,
     *   resourceUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'];
        $this->url = $values['url'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->resourceType = $values['resourceType'] ?? null;
        $this->resourceId = $values['resourceId'] ?? null;
        $this->resourceUrl = $values['resourceUrl'] ?? null;
    }

    /**
     * @return ?'job'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'job' $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
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
     * @return ?value-of<JobsStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<JobsStatus> $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getResourceType(): ?string
    {
        return $this->resourceType;
    }

    /**
     * @param ?string $value
     */
    public function setResourceType(?string $value = null): self
    {
        $this->resourceType = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getResourceId(): ?string
    {
        return $this->resourceId;
    }

    /**
     * @param ?string $value
     */
    public function setResourceId(?string $value = null): self
    {
        $this->resourceId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getResourceUrl(): ?string
    {
        return $this->resourceUrl;
    }

    /**
     * @param ?string $value
     */
    public function setResourceUrl(?string $value = null): self
    {
        $this->resourceUrl = $value;
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
