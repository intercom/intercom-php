<?php

namespace Intercom\AiContent\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class UpdateExternalPageRequest extends JsonSerializableType
{
    /**
     * @var string $pageId The unique identifier for the external page which is given by Intercom.
     */
    private string $pageId;

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
     * @var string $url The URL of the external page. This will be used by Fin to link end users to the page it based its answer on.
     */
    #[JsonProperty('url')]
    private string $url;

    /**
     * @var ?bool $finAvailability Whether the external page should be used to answer questions by Fin.
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
     * @var ?string $externalId The identifier for the external page which was given by the source. Must be unique for the source.
     */
    #[JsonProperty('external_id')]
    private ?string $externalId;

    /**
     * @param array{
     *   pageId: string,
     *   title: string,
     *   html: string,
     *   url: string,
     *   locale: 'en',
     *   sourceId: int,
     *   finAvailability?: ?bool,
     *   externalId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->pageId = $values['pageId'];
        $this->title = $values['title'];
        $this->html = $values['html'];
        $this->url = $values['url'];
        $this->finAvailability = $values['finAvailability'] ?? null;
        $this->locale = $values['locale'];
        $this->sourceId = $values['sourceId'];
        $this->externalId = $values['externalId'] ?? null;
    }

    /**
     * @return string
     */
    public function getPageId(): string
    {
        return $this->pageId;
    }

    /**
     * @param string $value
     */
    public function setPageId(string $value): self
    {
        $this->pageId = $value;
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
     * @return ?string
     */
    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    /**
     * @param ?string $value
     */
    public function setExternalId(?string $value = null): self
    {
        $this->externalId = $value;
        return $this;
    }
}
