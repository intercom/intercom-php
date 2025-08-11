<?php

namespace Intercom\Unstable\AiContent\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class CreateExternalPageRequest extends JsonSerializableType
{
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
     * @var ?string $url The URL of the external page. This will be used by Fin to link end users to the page it based its answer on. When a URL is not present, Fin will not reference the source.
     */
    #[JsonProperty('url')]
    private ?string $url;

    /**
     * @var ?bool $aiAgentAvailability Whether the external page should be used to answer questions by AI Agent. Will not default when updating an existing external page.
     */
    #[JsonProperty('ai_agent_availability')]
    private ?bool $aiAgentAvailability;

    /**
     * @var ?bool $aiCopilotAvailability Whether the external page should be used to answer questions by AI Copilot. Will not default when updating an existing external page.
     */
    #[JsonProperty('ai_copilot_availability')]
    private ?bool $aiCopilotAvailability;

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
     * @param array{
     *   title: string,
     *   html: string,
     *   locale: 'en',
     *   sourceId: int,
     *   externalId: string,
     *   url?: ?string,
     *   aiAgentAvailability?: ?bool,
     *   aiCopilotAvailability?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->title = $values['title'];
        $this->html = $values['html'];
        $this->url = $values['url'] ?? null;
        $this->aiAgentAvailability = $values['aiAgentAvailability'] ?? null;
        $this->aiCopilotAvailability = $values['aiCopilotAvailability'] ?? null;
        $this->locale = $values['locale'];
        $this->sourceId = $values['sourceId'];
        $this->externalId = $values['externalId'];
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
     * @return ?bool
     */
    public function getAiAgentAvailability(): ?bool
    {
        return $this->aiAgentAvailability;
    }

    /**
     * @param ?bool $value
     */
    public function setAiAgentAvailability(?bool $value = null): self
    {
        $this->aiAgentAvailability = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getAiCopilotAvailability(): ?bool
    {
        return $this->aiCopilotAvailability;
    }

    /**
     * @param ?bool $value
     */
    public function setAiCopilotAvailability(?bool $value = null): self
    {
        $this->aiCopilotAvailability = $value;
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
}
