<?php

namespace Intercom\Unstable\Conversations\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Unstable\Conversations\Types\ManageConversationRequestBody;

class ManageConversationRequest extends JsonSerializableType
{
    /**
     * @var string $id The identifier for the conversation as given by Intercom.
     */
    private string $id;

    /**
     * @var ManageConversationRequestBody $body
     */
    private ManageConversationRequestBody $body;

    /**
     * @param array{
     *   id: string,
     *   body: ManageConversationRequestBody,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->body = $values['body'];
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
     * @return ManageConversationRequestBody
     */
    public function getBody(): ManageConversationRequestBody
    {
        return $this->body;
    }

    /**
     * @param ManageConversationRequestBody $value
     */
    public function setBody(ManageConversationRequestBody $value): self
    {
        $this->body = $value;
        return $this;
    }
}
