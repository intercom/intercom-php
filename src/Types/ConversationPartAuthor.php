<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * The object who initiated the conversation, which can be a Contact, Admin or Team. Bots and campaigns send messages on behalf of Admins or Teams. For Twitter, this will be blank.
 */
class ConversationPartAuthor extends JsonSerializableType
{
    /**
     * @var string $type The type of the author
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $id The id of the author
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var string $name The name of the author
     */
    #[JsonProperty('name')]
    private string $name;

    /**
     * @var string $email The email of the author
     */
    #[JsonProperty('email')]
    private string $email;

    /**
     * @param array{
     *   type: string,
     *   id: string,
     *   name: string,
     *   email: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->id = $values['id'];
        $this->name = $values['name'];
        $this->email = $values['email'];
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
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $value
     */
    public function setEmail(string $value): self
    {
        $this->email = $value;
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
