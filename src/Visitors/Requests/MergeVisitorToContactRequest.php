<?php

namespace Intercom\Visitors\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Visitors\Types\UserWithId;
use Intercom\Visitors\Types\UserWithUserId;
use Intercom\Core\Types\Union;
use Intercom\Visitors\Types\VisitorWithId;
use Intercom\Visitors\Types\VisitorWithUserId;
use Intercom\Visitors\Types\VisitorWithEmail;

class MergeVisitorToContactRequest extends JsonSerializableType
{
    /**
     * @var string $type Represents the role of the Contact model. Accepts `lead` or `user`.
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var (
     *    UserWithId
     *   |UserWithUserId
     * ) $user The unique identifiers retained after converting or merging.
     */
    #[JsonProperty('user'), Union(UserWithId::class, UserWithUserId::class)]
    private UserWithId|UserWithUserId $user;

    /**
     * @var (
     *    VisitorWithId
     *   |VisitorWithUserId
     *   |VisitorWithEmail
     * ) $visitor The unique identifiers to convert a single Visitor.
     */
    #[JsonProperty('visitor'), Union(VisitorWithId::class, VisitorWithUserId::class, VisitorWithEmail::class)]
    private VisitorWithId|VisitorWithUserId|VisitorWithEmail $visitor;

    /**
     * @param array{
     *   type: string,
     *   user: (
     *    UserWithId
     *   |UserWithUserId
     * ),
     *   visitor: (
     *    VisitorWithId
     *   |VisitorWithUserId
     *   |VisitorWithEmail
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
        return $this;
    }

    /**
     * @return (
     *    UserWithId
     *   |UserWithUserId
     * )
     */
    public function getUser(): UserWithId|UserWithUserId
    {
        return $this->user;
    }

    /**
     * @param (
     *    UserWithId
     *   |UserWithUserId
     * ) $value
     */
    public function setUser(UserWithId|UserWithUserId $value): self
    {
        $this->user = $value;
        return $this;
    }

    /**
     * @return (
     *    VisitorWithId
     *   |VisitorWithUserId
     *   |VisitorWithEmail
     * )
     */
    public function getVisitor(): VisitorWithId|VisitorWithUserId|VisitorWithEmail
    {
        return $this->visitor;
    }

    /**
     * @param (
     *    VisitorWithId
     *   |VisitorWithUserId
     *   |VisitorWithEmail
     * ) $value
     */
    public function setVisitor(VisitorWithId|VisitorWithUserId|VisitorWithEmail $value): self
    {
        $this->visitor = $value;
        return $this;
    }
}
