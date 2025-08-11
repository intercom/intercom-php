<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * The statistics of an article.
 */
class ArticleStatistics extends JsonSerializableType
{
    /**
     * @var ?'article_statistics' $type The type of object - `article_statistics`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?int $views The number of total views the article has received.
     */
    #[JsonProperty('views')]
    private ?int $views;

    /**
     * @var ?int $conversions The number of conversations started from the article.
     */
    #[JsonProperty('conversions')]
    private ?int $conversions;

    /**
     * @var ?int $reactions The number of total reactions the article has received.
     */
    #[JsonProperty('reactions')]
    private ?int $reactions;

    /**
     * @var ?float $happyReactionPercentage The percentage of happy reactions the article has received against other types of reaction.
     */
    #[JsonProperty('happy_reaction_percentage')]
    private ?float $happyReactionPercentage;

    /**
     * @var ?float $neutralReactionPercentage The percentage of neutral reactions the article has received against other types of reaction.
     */
    #[JsonProperty('neutral_reaction_percentage')]
    private ?float $neutralReactionPercentage;

    /**
     * @var ?float $sadReactionPercentage The percentage of sad reactions the article has received against other types of reaction.
     */
    #[JsonProperty('sad_reaction_percentage')]
    private ?float $sadReactionPercentage;

    /**
     * @param array{
     *   type?: ?'article_statistics',
     *   views?: ?int,
     *   conversions?: ?int,
     *   reactions?: ?int,
     *   happyReactionPercentage?: ?float,
     *   neutralReactionPercentage?: ?float,
     *   sadReactionPercentage?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->views = $values['views'] ?? null;
        $this->conversions = $values['conversions'] ?? null;
        $this->reactions = $values['reactions'] ?? null;
        $this->happyReactionPercentage = $values['happyReactionPercentage'] ?? null;
        $this->neutralReactionPercentage = $values['neutralReactionPercentage'] ?? null;
        $this->sadReactionPercentage = $values['sadReactionPercentage'] ?? null;
    }

    /**
     * @return ?'article_statistics'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'article_statistics' $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getViews(): ?int
    {
        return $this->views;
    }

    /**
     * @param ?int $value
     */
    public function setViews(?int $value = null): self
    {
        $this->views = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getConversions(): ?int
    {
        return $this->conversions;
    }

    /**
     * @param ?int $value
     */
    public function setConversions(?int $value = null): self
    {
        $this->conversions = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getReactions(): ?int
    {
        return $this->reactions;
    }

    /**
     * @param ?int $value
     */
    public function setReactions(?int $value = null): self
    {
        $this->reactions = $value;
        return $this;
    }

    /**
     * @return ?float
     */
    public function getHappyReactionPercentage(): ?float
    {
        return $this->happyReactionPercentage;
    }

    /**
     * @param ?float $value
     */
    public function setHappyReactionPercentage(?float $value = null): self
    {
        $this->happyReactionPercentage = $value;
        return $this;
    }

    /**
     * @return ?float
     */
    public function getNeutralReactionPercentage(): ?float
    {
        return $this->neutralReactionPercentage;
    }

    /**
     * @param ?float $value
     */
    public function setNeutralReactionPercentage(?float $value = null): self
    {
        $this->neutralReactionPercentage = $value;
        return $this;
    }

    /**
     * @return ?float
     */
    public function getSadReactionPercentage(): ?float
    {
        return $this->sadReactionPercentage;
    }

    /**
     * @param ?float $value
     */
    public function setSadReactionPercentage(?float $value = null): self
    {
        $this->sadReactionPercentage = $value;
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
