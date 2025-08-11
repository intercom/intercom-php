<?php

namespace Intercom\Unstable\Conversations\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Unstable\Conversations\Types\AttachContactToConversationRequestCustomerIntercomUserId;
use Intercom\Unstable\Conversations\Types\AttachContactToConversationRequestCustomerUserId;
use Intercom\Unstable\Conversations\Types\AttachContactToConversationRequestCustomerCustomer;
use Intercom\Core\Types\Union;

class AttachContactToConversationRequest extends JsonSerializableType
{
    /**
     * @var string $id The identifier for the conversation as given by Intercom.
     */
    private string $id;

    /**
     * @var ?string $adminId The `id` of the admin who is adding the new participant.
     */
    #[JsonProperty('admin_id')]
    private ?string $adminId;

    /**
     * @var (
     *    AttachContactToConversationRequestCustomerIntercomUserId
     *   |AttachContactToConversationRequestCustomerUserId
     *   |AttachContactToConversationRequestCustomerCustomer
     * )|null $customer
     */
    #[JsonProperty('customer'), Union(AttachContactToConversationRequestCustomerIntercomUserId::class, AttachContactToConversationRequestCustomerUserId::class, AttachContactToConversationRequestCustomerCustomer::class, 'null')]
    private AttachContactToConversationRequestCustomerIntercomUserId|AttachContactToConversationRequestCustomerUserId|AttachContactToConversationRequestCustomerCustomer|null $customer;

    /**
     * @param array{
     *   id: string,
     *   adminId?: ?string,
     *   customer?: (
     *    AttachContactToConversationRequestCustomerIntercomUserId
     *   |AttachContactToConversationRequestCustomerUserId
     *   |AttachContactToConversationRequestCustomerCustomer
     * )|null,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->adminId = $values['adminId'] ?? null;
        $this->customer = $values['customer'] ?? null;
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
     * @return ?string
     */
    public function getAdminId(): ?string
    {
        return $this->adminId;
    }

    /**
     * @param ?string $value
     */
    public function setAdminId(?string $value = null): self
    {
        $this->adminId = $value;
        return $this;
    }

    /**
     * @return (
     *    AttachContactToConversationRequestCustomerIntercomUserId
     *   |AttachContactToConversationRequestCustomerUserId
     *   |AttachContactToConversationRequestCustomerCustomer
     * )|null
     */
    public function getCustomer(): AttachContactToConversationRequestCustomerIntercomUserId|AttachContactToConversationRequestCustomerUserId|AttachContactToConversationRequestCustomerCustomer|null
    {
        return $this->customer;
    }

    /**
     * @param (
     *    AttachContactToConversationRequestCustomerIntercomUserId
     *   |AttachContactToConversationRequestCustomerUserId
     *   |AttachContactToConversationRequestCustomerCustomer
     * )|null $value
     */
    public function setCustomer(AttachContactToConversationRequestCustomerIntercomUserId|AttachContactToConversationRequestCustomerUserId|AttachContactToConversationRequestCustomerCustomer|null $value = null): self
    {
        $this->customer = $value;
        return $this;
    }
}
