<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * The results object should be sent when you want to end configuration of the app and trigger the [Initialize request](https://developers.intercom.com/docs/canvas-kit/#initialize) to be sent. You provide the key-value pairs of data you want access to and we will send these in the Initialize request within a [card_creation_options object](https://developers.intercom.com/docs/references/canvas-kit/requestobjects/card-creation-options/#card-creation-options).
 */
class ResultsResponse extends JsonSerializableType
{
    /**
     * @var array<string, mixed> $results Key-value pairs of data you want access to in the Initialize request
     */
    #[JsonProperty('results'), ArrayType(['string' => 'mixed'])]
    private array $results;

    /**
     * @param array{
     *   results: array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->results = $values['results'];
    }

    /**
     * @return array<string, mixed>
     */
    public function getResults(): array
    {
        return $this->results;
    }

    /**
     * @param array<string, mixed> $value
     */
    public function setResults(array $value): self
    {
        $this->results = $value;
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
