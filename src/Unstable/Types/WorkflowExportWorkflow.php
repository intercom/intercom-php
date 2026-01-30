<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;
use DateTime;
use Intercom\Core\Types\Date;

/**
 * The workflow configuration.
 */
class WorkflowExportWorkflow extends JsonSerializableType
{
    /**
     * @var ?string $id The unique identifier for the workflow.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $title The title of the workflow.
     */
    #[JsonProperty('title')]
    private ?string $title;

    /**
     * @var ?string $description The description of the workflow.
     */
    #[JsonProperty('description')]
    private ?string $description;

    /**
     * @var ?string $triggerType The type of trigger that starts this workflow.
     */
    #[JsonProperty('trigger_type')]
    private ?string $triggerType;

    /**
     * @var ?value-of<WorkflowExportWorkflowState> $state The current state of the workflow.
     */
    #[JsonProperty('state')]
    private ?string $state;

    /**
     * @var ?array<string> $targetChannels The channels this workflow targets.
     */
    #[JsonProperty('target_channels'), ArrayType(['string'])]
    private ?array $targetChannels;

    /**
     * @var ?array<string> $preferredDevices The preferred devices for this workflow.
     */
    #[JsonProperty('preferred_devices'), ArrayType(['string'])]
    private ?array $preferredDevices;

    /**
     * @var ?DateTime $createdAt When the workflow was created.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    private ?DateTime $createdAt;

    /**
     * @var ?DateTime $updatedAt When the workflow was last updated.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    private ?DateTime $updatedAt;

    /**
     * @var ?array<string, mixed> $targeting The targeting rules for this workflow.
     */
    #[JsonProperty('targeting'), ArrayType(['string' => 'mixed'])]
    private ?array $targeting;

    /**
     * @var ?array<string, mixed> $snapshot The current snapshot of workflow steps and configuration.
     */
    #[JsonProperty('snapshot'), ArrayType(['string' => 'mixed'])]
    private ?array $snapshot;

    /**
     * @var ?array<array<string, mixed>> $attributes Custom attributes defined for this workflow.
     */
    #[JsonProperty('attributes'), ArrayType([['string' => 'mixed']])]
    private ?array $attributes;

    /**
     * @var ?array<array<string, mixed>> $embeddedRules Rules embedded within the workflow steps.
     */
    #[JsonProperty('embedded_rules'), ArrayType([['string' => 'mixed']])]
    private ?array $embeddedRules;

    /**
     * @param array{
     *   id?: ?string,
     *   title?: ?string,
     *   description?: ?string,
     *   triggerType?: ?string,
     *   state?: ?value-of<WorkflowExportWorkflowState>,
     *   targetChannels?: ?array<string>,
     *   preferredDevices?: ?array<string>,
     *   createdAt?: ?DateTime,
     *   updatedAt?: ?DateTime,
     *   targeting?: ?array<string, mixed>,
     *   snapshot?: ?array<string, mixed>,
     *   attributes?: ?array<array<string, mixed>>,
     *   embeddedRules?: ?array<array<string, mixed>>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->triggerType = $values['triggerType'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->targetChannels = $values['targetChannels'] ?? null;
        $this->preferredDevices = $values['preferredDevices'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->targeting = $values['targeting'] ?? null;
        $this->snapshot = $values['snapshot'] ?? null;
        $this->attributes = $values['attributes'] ?? null;
        $this->embeddedRules = $values['embeddedRules'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param ?string $value
     */
    public function setTitle(?string $value = null): self
    {
        $this->title = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param ?string $value
     */
    public function setDescription(?string $value = null): self
    {
        $this->description = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTriggerType(): ?string
    {
        return $this->triggerType;
    }

    /**
     * @param ?string $value
     */
    public function setTriggerType(?string $value = null): self
    {
        $this->triggerType = $value;
        return $this;
    }

    /**
     * @return ?value-of<WorkflowExportWorkflowState>
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param ?value-of<WorkflowExportWorkflowState> $value
     */
    public function setState(?string $value = null): self
    {
        $this->state = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getTargetChannels(): ?array
    {
        return $this->targetChannels;
    }

    /**
     * @param ?array<string> $value
     */
    public function setTargetChannels(?array $value = null): self
    {
        $this->targetChannels = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getPreferredDevices(): ?array
    {
        return $this->preferredDevices;
    }

    /**
     * @param ?array<string> $value
     */
    public function setPreferredDevices(?array $value = null): self
    {
        $this->preferredDevices = $value;
        return $this;
    }

    /**
     * @return ?DateTime
     */
    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param ?DateTime $value
     */
    public function setCreatedAt(?DateTime $value = null): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ?DateTime
     */
    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param ?DateTime $value
     */
    public function setUpdatedAt(?DateTime $value = null): self
    {
        $this->updatedAt = $value;
        return $this;
    }

    /**
     * @return ?array<string, mixed>
     */
    public function getTargeting(): ?array
    {
        return $this->targeting;
    }

    /**
     * @param ?array<string, mixed> $value
     */
    public function setTargeting(?array $value = null): self
    {
        $this->targeting = $value;
        return $this;
    }

    /**
     * @return ?array<string, mixed>
     */
    public function getSnapshot(): ?array
    {
        return $this->snapshot;
    }

    /**
     * @param ?array<string, mixed> $value
     */
    public function setSnapshot(?array $value = null): self
    {
        $this->snapshot = $value;
        return $this;
    }

    /**
     * @return ?array<array<string, mixed>>
     */
    public function getAttributes(): ?array
    {
        return $this->attributes;
    }

    /**
     * @param ?array<array<string, mixed>> $value
     */
    public function setAttributes(?array $value = null): self
    {
        $this->attributes = $value;
        return $this;
    }

    /**
     * @return ?array<array<string, mixed>>
     */
    public function getEmbeddedRules(): ?array
    {
        return $this->embeddedRules;
    }

    /**
     * @param ?array<array<string, mixed>> $value
     */
    public function setEmbeddedRules(?array $value = null): self
    {
        $this->embeddedRules = $value;
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
