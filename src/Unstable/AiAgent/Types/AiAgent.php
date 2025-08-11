<?php

namespace Intercom\Unstable\AiAgent\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Unstable\Types\ContentSourcesList;

/**
 * Data related to AI Agent involvement in the conversation.
 */
class AiAgent extends JsonSerializableType
{
    /**
     * @var ?value-of<AiAgentSourceType> $sourceType The type of the source that triggered AI Agent involvement in the conversation.
     */
    #[JsonProperty('source_type')]
    private ?string $sourceType;

    /**
     * @var ?string $sourceTitle The title of the source that triggered AI Agent involvement in the conversation. If this is `essentials_plan_setup` then it will return `null`.
     */
    #[JsonProperty('source_title')]
    private ?string $sourceTitle;

    /**
     * @var ?string $lastAnswerType The type of the last answer delivered by AI Agent. If no answer was delivered then this will return `null`
     */
    #[JsonProperty('last_answer_type')]
    private ?string $lastAnswerType;

    /**
     * @var ?string $resolutionState The resolution state of AI Agent. If no AI or custom answer has been delivered then this will return `null`.
     */
    #[JsonProperty('resolution_state')]
    private ?string $resolutionState;

    /**
     * @var ?int $rating The customer satisfaction rating given to AI Agent, from 1-5.
     */
    #[JsonProperty('rating')]
    private ?int $rating;

    /**
     * @var ?string $ratingRemark The customer satisfaction rating remark given to AI Agent.
     */
    #[JsonProperty('rating_remark')]
    private ?string $ratingRemark;

    /**
     * @var ?ContentSourcesList $contentSources
     */
    #[JsonProperty('content_sources')]
    private ?ContentSourcesList $contentSources;

    /**
     * @param array{
     *   sourceType?: ?value-of<AiAgentSourceType>,
     *   sourceTitle?: ?string,
     *   lastAnswerType?: ?string,
     *   resolutionState?: ?string,
     *   rating?: ?int,
     *   ratingRemark?: ?string,
     *   contentSources?: ?ContentSourcesList,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->sourceType = $values['sourceType'] ?? null;
        $this->sourceTitle = $values['sourceTitle'] ?? null;
        $this->lastAnswerType = $values['lastAnswerType'] ?? null;
        $this->resolutionState = $values['resolutionState'] ?? null;
        $this->rating = $values['rating'] ?? null;
        $this->ratingRemark = $values['ratingRemark'] ?? null;
        $this->contentSources = $values['contentSources'] ?? null;
    }

    /**
     * @return ?value-of<AiAgentSourceType>
     */
    public function getSourceType(): ?string
    {
        return $this->sourceType;
    }

    /**
     * @param ?value-of<AiAgentSourceType> $value
     */
    public function setSourceType(?string $value = null): self
    {
        $this->sourceType = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSourceTitle(): ?string
    {
        return $this->sourceTitle;
    }

    /**
     * @param ?string $value
     */
    public function setSourceTitle(?string $value = null): self
    {
        $this->sourceTitle = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLastAnswerType(): ?string
    {
        return $this->lastAnswerType;
    }

    /**
     * @param ?string $value
     */
    public function setLastAnswerType(?string $value = null): self
    {
        $this->lastAnswerType = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getResolutionState(): ?string
    {
        return $this->resolutionState;
    }

    /**
     * @param ?string $value
     */
    public function setResolutionState(?string $value = null): self
    {
        $this->resolutionState = $value;
        return $this;
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
    public function getRatingRemark(): ?string
    {
        return $this->ratingRemark;
    }

    /**
     * @param ?string $value
     */
    public function setRatingRemark(?string $value = null): self
    {
        $this->ratingRemark = $value;
        return $this;
    }

    /**
     * @return ?ContentSourcesList
     */
    public function getContentSources(): ?ContentSourcesList
    {
        return $this->contentSources;
    }

    /**
     * @param ?ContentSourcesList $value
     */
    public function setContentSources(?ContentSourcesList $value = null): self
    {
        $this->contentSources = $value;
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
