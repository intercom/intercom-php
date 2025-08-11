<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * A sheet action opens the link you give within the Messenger as an embedded iframe.
 *
 * [More on how Sheets work is in our Canvas Kit documentation.](https://developers.intercom.com/docs/canvas-kit#sheets-optional)
 */
class SheetActionComponent extends JsonSerializableType
{
    /**
     * @var string $url The link which hosts your sheet.
     */
    #[JsonProperty('url')]
    private string $url;

    /**
     * @param array{
     *   url: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->url = $values['url'];
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
