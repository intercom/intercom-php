<?php

namespace Intercom\Unstable\AiContent\Requests;

use Intercom\Core\Json\JsonSerializableType;

class DeleteContentImportSourceRequest extends JsonSerializableType
{
    /**
     * @var string $id The unique identifier for the content import source which is given by Intercom.
     */
    private string $id;

    /**
     * @param array{
     *   id: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
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
}
