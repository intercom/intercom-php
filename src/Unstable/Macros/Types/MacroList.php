<?php

namespace Intercom\Unstable\Macros\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;
use Intercom\Core\Types\Union;

/**
 * A paginated list of macros (saved replies) in the workspace.
 */
class MacroList extends JsonSerializableType
{
    /**
     * @var ?'list' $type Always list
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<?Macro> $data The list of macro objects
     */
    #[JsonProperty('data'), ArrayType([new Union(Macro::class, 'null')])]
    private ?array $data;

    /**
     * @var ?MacroListPages $pages Pagination information
     */
    #[JsonProperty('pages')]
    private ?MacroListPages $pages;

    /**
     * @param array{
     *   type?: ?'list',
     *   data?: ?array<?Macro>,
     *   pages?: ?MacroListPages,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->data = $values['data'] ?? null;
        $this->pages = $values['pages'] ?? null;
    }

    /**
     * @return ?'list'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'list' $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?array<?Macro>
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param ?array<?Macro> $value
     */
    public function setData(?array $value = null): self
    {
        $this->data = $value;
        return $this;
    }

    /**
     * @return ?MacroListPages
     */
    public function getPages(): ?MacroListPages
    {
        return $this->pages;
    }

    /**
     * @param ?MacroListPages $value
     */
    public function setPages(?MacroListPages $value = null): self
    {
        $this->pages = $value;
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
