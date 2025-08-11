<?php

namespace Intercom\Unstable\AiContent\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * External pages that you have added to your Fin Content Library.
 */
class ExternalPage extends JsonSerializableType
{
    /**
     * @var 'external_page' $type Always external_page
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $id The unique identifier for the external page which is given by Intercom.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var string $title The title of the external page.
     */
    #[JsonProperty('title')]
    private string $title;

    /**
     * @var string $html The body of the external page in HTML.
     */
    #[JsonProperty('html')]
    private string $html;

    /**
     * @var ?string $url The URL of the external page. This will be used by Fin to link end users to the page it based its answer on.
     */
    #[JsonProperty('url')]
    private ?string $url;

    /**
     * @var bool $aiAgentAvailability Whether the external page should be used to answer questions by AI Agent.
     */
    #[JsonProperty('ai_agent_availability')]
    private bool $aiAgentAvailability;

    /**
     * @var bool $aiCopilotAvailability Whether the external page should be used to answer questions by AI Copilot.
     */
    #[JsonProperty('ai_copilot_availability')]
    private bool $aiCopilotAvailability;

    /**
     * @var ?bool $finAvailability Deprecated. Use ai_agent_availability and ai_copilot_availability instead.
     */
    #[JsonProperty('fin_availability')]
    private ?bool $finAvailability;

    /**
     * @var 'en' $locale Always en
     */
    #[JsonProperty('locale')]
    private string $locale;

    /**
     * @var int $sourceId The unique identifier for the source of the external page which was given by Intercom. Every external page must be associated with a Content Import Source which represents the place it comes from and from which it inherits a default audience (configured in the UI). For a new source, make a POST request to the Content Import Source endpoint and an ID for the source will be returned in the response.
     */
    #[JsonProperty('source_id')]
    private int $sourceId;

    /**
     * @var string $externalId The identifier for the external page which was given by the source. Must be unique for the source.
     */
    #[JsonProperty('external_id')]
    private string $externalId;

    /**
     * @var int $createdAt The time when the external page was created.
     */
    #[JsonProperty('created_at')]
    private int $createdAt;

    /**
     * @var int $updatedAt The time when the external page was last updated.
     */
    #[JsonProperty('updated_at')]
    private int $updatedAt;

    /**
     * @var int $lastIngestedAt The time when the external page was last ingested.
     */
    #[JsonProperty('last_ingested_at')]
    private int $lastIngestedAt;

    /**
     * @param array{
     *   type: 'external_page',
     *   id: string,
     *   title: string,
     *   html: string,
     *   aiAgentAvailability: bool,
     *   aiCopilotAvailability: bool,
     *   locale: 'en',
     *   sourceId: int,
     *   externalId: string,
     *   createdAt: int,
     *   updatedAt: int,
     *   lastIngestedAt: int,
     *   url?: ?string,
     *   finAvailability?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->id = $values['id'];
        $this->title = $values['title'];
        $this->html = $values['html'];
        $this->url = $values['url'] ?? null;
        $this->aiAgentAvailability = $values['aiAgentAvailability'];
        $this->aiCopilotAvailability = $values['aiCopilotAvailability'];
        $this->finAvailability = $values['finAvailability'] ?? null;
        $this->locale = $values['locale'];
        $this->sourceId = $values['sourceId'];
        $this->externalId = $values['externalId'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->lastIngestedAt = $values['lastIngestedAt'];
    }

    /**
     * @return 'external_page'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'external_page' $value
     */
    public function setType(string $value): self
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
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $value
     */
    public function setTitle(string $value): self
    {
        $this->title = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getHtml(): string
    {
        return $this->html;
    }

    /**
     * @param string $value
     */
    public function setHtml(string $value): self
    {
        $this->html = $value;
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
     * @return bool
     */
    public function getAiAgentAvailability(): bool
    {
        return $this->aiAgentAvailability;
    }

    /**
     * @param bool $value
     */
    public function setAiAgentAvailability(bool $value): self
    {
        $this->aiAgentAvailability = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getAiCopilotAvailability(): bool
    {
        return $this->aiCopilotAvailability;
    }

    /**
     * @param bool $value
     */
    public function setAiCopilotAvailability(bool $value): self
    {
        $this->aiCopilotAvailability = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getFinAvailability(): ?bool
    {
        return $this->finAvailability;
    }

    /**
     * @param ?bool $value
     */
    public function setFinAvailability(?bool $value = null): self
    {
        $this->finAvailability = $value;
        return $this;
    }

    /**
     * @return 'en'
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * @param 'en' $value
     */
    public function setLocale(string $value): self
    {
        $this->locale = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getSourceId(): int
    {
        return $this->sourceId;
    }

    /**
     * @param int $value
     */
    public function setSourceId(int $value): self
    {
        $this->sourceId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getExternalId(): string
    {
        return $this->externalId;
    }

    /**
     * @param string $value
     */
    public function setExternalId(string $value): self
    {
        $this->externalId = $value;
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
     * @return int
     */
    public function getLastIngestedAt(): int
    {
        return $this->lastIngestedAt;
    }

    /**
     * @param int $value
     */
    public function setLastIngestedAt(int $value): self
    {
        $this->lastIngestedAt = $value;
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
