<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * You can tag a list of users.
 */
class TagMultipleUsersRequest extends JsonSerializableType
{
    /**
     * @var string $name The name of the tag, which will be created if not found.
     */
    #[JsonProperty('name')]
    private string $name;

    /**
     * @var array<TagMultipleUsersRequestUsersItem> $users
     */
    #[JsonProperty('users'), ArrayType([TagMultipleUsersRequestUsersItem::class])]
    private array $users;

    /**
     * @param array{
     *   name: string,
     *   users: array<TagMultipleUsersRequestUsersItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->users = $values['users'];
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
     * @return array<TagMultipleUsersRequestUsersItem>
     */
    public function getUsers(): array
    {
        return $this->users;
    }

    /**
     * @param array<TagMultipleUsersRequestUsersItem> $value
     */
    public function setUsers(array $value): self
    {
        $this->users = $value;
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
