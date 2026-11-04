<?php

namespace Intercom\Unstable\Visitors\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class ConvertVisitorRequest extends JsonSerializableType
{
    /**
     * @var string $type Represents the role of the Contact model. Accepts `lead` or `user`.
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var (
     *    mixed
     * ) $user The unique identifiers retained after converting or merging.
     */
    #[JsonProperty('user')]
    private mixed $user;

    /**
     * @var (
     *    mixed
     * ) $visitor The unique identifiers to convert a single Visitor.
     */
    #[JsonProperty('visitor')]
    private mixed $visitor;

    /**
     * @param array{
     *   type: string,
     *   user: (
     *    mixed
     * ),
     *   visitor: (
     *    mixed
     * ),
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->user = $values['user'];
        $this->visitor = $values['visitor'];
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        $this->_setField('type');
        return $this;
    }

    /**
     * @return (
     *    mixed
     * )
     */
    public function getUser(): mixed
    {
        return $this->user;
    }

    /**
     * @param (
     *    mixed
     * ) $value
     */
    public function setUser(mixed $value): self
    {
        $this->user = $value;
        $this->_setField('user');
        return $this;
    }

    /**
     * @return (
     *    mixed
     * )
     */
    public function getVisitor(): mixed
    {
        return $this->visitor;
    }

    /**
     * @param (
     *    mixed
     * ) $value
     */
    public function setVisitor(mixed $value): self
    {
        $this->visitor = $value;
        $this->_setField('visitor');
        return $this;
    }
}
