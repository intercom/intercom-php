<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Admins\Types\Admin;
use Intercom\Core\Types\ArrayType;
use Intercom\Conversations\Types\Conversation;
use Intercom\Contacts\Types\Contact;

/**
 * The request payload will have all the data needed for you to understand who is using your app, where they are using it, and how you should respond. There are different request payloads for Messenger capabilities and Inbox capabilities.
 */
class InitializeRequest extends JsonSerializableType
{
    /**
     * @var string $workspaceId The workspace ID of the teammate. Attribute is `app_id` for V1.2 and below.
     */
    #[JsonProperty('workspace_id')]
    private string $workspaceId;

    /**
     * @var string $workspaceRegion The Intercom hosted region that this app is located in.
     */
    #[JsonProperty('workspace_region')]
    private string $workspaceRegion;

    /**
     * @var Admin $admin The Intercom teammate viewing the conversation.
     */
    #[JsonProperty('admin')]
    private Admin $admin;

    /**
     * @var array<string, mixed> $cardCreationOptions Key-value pairs which were given as results in response to the Configure request.
     */
    #[JsonProperty('card_creation_options'), ArrayType(['string' => 'mixed'])]
    private array $cardCreationOptions;

    /**
     * @var Context $context The context of where the app is added, where the user last visited, and information on the Messenger settings.
     */
    #[JsonProperty('context')]
    private Context $context;

    /**
     * @var Conversation $conversation The conversation your app is being shown for.
     */
    #[JsonProperty('conversation')]
    private Conversation $conversation;

    /**
     * @var Contact $contact The contact which is currently being viewed by the teammate in the conversation details panel. We send an individual initialize request for each customer when it's a group conversation.
     */
    #[JsonProperty('contact')]
    private Contact $contact;

    /**
     * @param array{
     *   workspaceId: string,
     *   workspaceRegion: string,
     *   admin: Admin,
     *   cardCreationOptions: array<string, mixed>,
     *   context: Context,
     *   conversation: Conversation,
     *   contact: Contact,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->workspaceId = $values['workspaceId'];
        $this->workspaceRegion = $values['workspaceRegion'];
        $this->admin = $values['admin'];
        $this->cardCreationOptions = $values['cardCreationOptions'];
        $this->context = $values['context'];
        $this->conversation = $values['conversation'];
        $this->contact = $values['contact'];
    }

    /**
     * @return string
     */
    public function getWorkspaceId(): string
    {
        return $this->workspaceId;
    }

    /**
     * @param string $value
     */
    public function setWorkspaceId(string $value): self
    {
        $this->workspaceId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getWorkspaceRegion(): string
    {
        return $this->workspaceRegion;
    }

    /**
     * @param string $value
     */
    public function setWorkspaceRegion(string $value): self
    {
        $this->workspaceRegion = $value;
        return $this;
    }

    /**
     * @return Admin
     */
    public function getAdmin(): Admin
    {
        return $this->admin;
    }

    /**
     * @param Admin $value
     */
    public function setAdmin(Admin $value): self
    {
        $this->admin = $value;
        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function getCardCreationOptions(): array
    {
        return $this->cardCreationOptions;
    }

    /**
     * @param array<string, mixed> $value
     */
    public function setCardCreationOptions(array $value): self
    {
        $this->cardCreationOptions = $value;
        return $this;
    }

    /**
     * @return Context
     */
    public function getContext(): Context
    {
        return $this->context;
    }

    /**
     * @param Context $value
     */
    public function setContext(Context $value): self
    {
        $this->context = $value;
        return $this;
    }

    /**
     * @return Conversation
     */
    public function getConversation(): Conversation
    {
        return $this->conversation;
    }

    /**
     * @param Conversation $value
     */
    public function setConversation(Conversation $value): self
    {
        $this->conversation = $value;
        return $this;
    }

    /**
     * @return Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }

    /**
     * @param Contact $value
     */
    public function setContact(Contact $value): self
    {
        $this->contact = $value;
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
