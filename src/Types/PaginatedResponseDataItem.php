<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\News\Types\NewsItem;
use Intercom\News\Types\Newsfeed;
use Exception;
use Intercom\Core\Json\JsonDecoder;

class PaginatedResponseDataItem extends JsonSerializableType
{
    /**
     * @var (
     *    'news-item'
     *   |'newsfeed'
     *   |'_unknown'
     * ) $type
     */
    private readonly string $type;

    /**
     * @var (
     *    NewsItem
     *   |Newsfeed
     *   |mixed
     * ) $value
     */
    private readonly mixed $value;

    /**
     * @param array{
     *   type: (
     *    'news-item'
     *   |'newsfeed'
     *   |'_unknown'
     * ),
     *   value: (
     *    NewsItem
     *   |Newsfeed
     *   |mixed
     * ),
     * } $values
     */
    private function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->value = $values['value'];
    }

    /**
     * @return (
     *    'news-item'
     *   |'newsfeed'
     *   |'_unknown'
     * )
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return (
     *    NewsItem
     *   |Newsfeed
     *   |mixed
     * )
     */
    public function getValue(): mixed
    {
        return $this->value;
    }

    /**
     * @param NewsItem $newsItem
     * @return PaginatedResponseDataItem
     */
    public static function newsItem(NewsItem $newsItem): PaginatedResponseDataItem
    {
        return new PaginatedResponseDataItem([
            'type' => 'news-item',
            'value' => $newsItem,
        ]);
    }

    /**
     * @param Newsfeed $newsfeed
     * @return PaginatedResponseDataItem
     */
    public static function newsfeed(Newsfeed $newsfeed): PaginatedResponseDataItem
    {
        return new PaginatedResponseDataItem([
            'type' => 'newsfeed',
            'value' => $newsfeed,
        ]);
    }

    /**
     * @return bool
     */
    public function isNewsItem(): bool
    {
        return $this->value instanceof NewsItem && $this->type === 'news-item';
    }

    /**
     * @return NewsItem
     */
    public function asNewsItem(): NewsItem
    {
        if (!($this->value instanceof NewsItem && $this->type === 'news-item')) {
            throw new Exception(
                "Expected news-item; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isNewsfeed(): bool
    {
        return $this->value instanceof Newsfeed && $this->type === 'newsfeed';
    }

    /**
     * @return Newsfeed
     */
    public function asNewsfeed(): Newsfeed
    {
        if (!($this->value instanceof Newsfeed && $this->type === 'newsfeed')) {
            throw new Exception(
                "Expected newsfeed; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }

    /**
     * @return array<mixed>
     */
    public function jsonSerialize(): array
    {
        $result = [];
        $result['type'] = $this->type;

        $base = parent::jsonSerialize();
        $result = array_merge($base, $result);

        switch ($this->type) {
            case 'news-item':
                $value = $this->asNewsItem()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'newsfeed':
                $value = $this->asNewsfeed()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case '_unknown':
            default:
                if (is_null($this->value)) {
                    break;
                }
                if ($this->value instanceof JsonSerializableType) {
                    $value = $this->value->jsonSerialize();
                    $result = array_merge($value, $result);
                } elseif (is_array($this->value)) {
                    $result = array_merge($this->value, $result);
                }
        }

        return $result;
    }

    /**
     * @param string $json
     */
    public static function fromJson(string $json): static
    {
        $decodedJson = JsonDecoder::decode($json);
        if (!is_array($decodedJson)) {
            throw new Exception("Unexpected non-array decoded type: " . gettype($decodedJson));
        }
        return self::jsonDeserialize($decodedJson);
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function jsonDeserialize(array $data): static
    {
        $args = [];
        if (!array_key_exists('type', $data)) {
            throw new Exception(
                "JSON data is missing property 'type'",
            );
        }
        $type = $data['type'];
        if (!(is_string($type))) {
            throw new Exception(
                "Expected property 'type' in JSON data to be string, instead received " . get_debug_type($data['type']),
            );
        }

        $args['type'] = $type;
        switch ($type) {
            case 'news-item':
                $args['value'] = NewsItem::jsonDeserialize($data);
                break;
            case 'newsfeed':
                $args['value'] = Newsfeed::jsonDeserialize($data);
                break;
            case '_unknown':
            default:
                $args['type'] = '_unknown';
                $args['value'] = $data;
        }

        // @phpstan-ignore-next-line
        return new static($args);
    }
}
