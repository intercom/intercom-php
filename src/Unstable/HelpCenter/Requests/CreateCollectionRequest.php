<?php

namespace Intercom\Unstable\HelpCenter\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Unstable\Types\GroupTranslatedContent;

class CreateCollectionRequest extends JsonSerializableType
{
    /**
     * @var string $name The name of the collection. For multilingual collections, this will be the name of the default language's content.
     */
    #[JsonProperty('name')]
    private string $name;

    /**
     * @var ?string $description The description of the collection. For multilingual collections, this will be the description of the default language's content.
     */
    #[JsonProperty('description')]
    private ?string $description;

    /**
     * @var ?GroupTranslatedContent $translatedContent
     */
    #[JsonProperty('translated_content')]
    private ?GroupTranslatedContent $translatedContent;

    /**
     * @var ?string $parentId The id of the parent collection. If `null` then it will be created as the first level collection.
     */
    #[JsonProperty('parent_id')]
    private ?string $parentId;

    /**
     * @var ?int $helpCenterId The id of the help center where the collection will be created. If `null` then it will be created in the default help center.
     */
    #[JsonProperty('help_center_id')]
    private ?int $helpCenterId;

    /**
     * @param array{
     *   name: string,
     *   description?: ?string,
     *   translatedContent?: ?GroupTranslatedContent,
     *   parentId?: ?string,
     *   helpCenterId?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->description = $values['description'] ?? null;
        $this->translatedContent = $values['translatedContent'] ?? null;
        $this->parentId = $values['parentId'] ?? null;
        $this->helpCenterId = $values['helpCenterId'] ?? null;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $value
     */
    public function setName(string $value): self
    {
        $this->name = $value;
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
     * @return ?GroupTranslatedContent
     */
    public function getTranslatedContent(): ?GroupTranslatedContent
    {
        return $this->translatedContent;
    }

    /**
     * @param ?GroupTranslatedContent $value
     */
    public function setTranslatedContent(?GroupTranslatedContent $value = null): self
    {
        $this->translatedContent = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getParentId(): ?string
    {
        return $this->parentId;
    }

    /**
     * @param ?string $value
     */
    public function setParentId(?string $value = null): self
    {
        $this->parentId = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getHelpCenterId(): ?int
    {
        return $this->helpCenterId;
    }

    /**
     * @param ?int $value
     */
    public function setHelpCenterId(?int $value = null): self
    {
        $this->helpCenterId = $value;
        return $this;
    }
}
