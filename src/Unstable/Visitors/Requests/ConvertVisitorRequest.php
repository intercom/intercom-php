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
     * @var mixed $user
     */
    #[JsonProperty('user')]
    private mixed $user;

    /**
     * @var mixed $visitor
     */
    #[JsonProperty('visitor')]
    private mixed $visitor;

    /**
     * @param array{
     *   type: string,
     *   user: mixed,
     *   visitor: mixed,
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
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUser(): mixed
    {
        return $this->user;
    }

    /**
     * @param mixed $value
     */
    public function setUser(mixed $value): self
    {
        $this->user = $value;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVisitor(): mixed
    {
        return $this->visitor;
    }

    /**
     * @param mixed $value
     */
    public function setVisitor(mixed $value): self
    {
        $this->visitor = $value;
        return $this;
    }
}
