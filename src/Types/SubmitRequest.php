<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Admins\Types\Admin;
use Intercom\Conversations\Types\Conversation;
use Intercom\Contacts\Types\Contact;
use Intercom\Core\Types\ArrayType;

/**
 * The Submit request is triggered when a component with a submit action is interacted with in Messenger Inbox.
 */
class SubmitRequest extends JsonSerializableType
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
     * @var string $componentId The id of the component clicked by the teammate to trigger the request.
     */
    #[JsonProperty('component_id')]
    private string $componentId;

    /**
     * @var Context $context The context of where the app is added, where the user last visited, and information on the Messenger settings.
     */
    #[JsonProperty('context')]
    private Context $context;

    /**
     * @var Conversation $conversation The conversation where your app is being shown.
     */
    #[JsonProperty('conversation')]
    private Conversation $conversation;

    /**
     * @var CurrentCanvas $currentCanvas The current canvas the teammate can see.
     */
    #[JsonProperty('current_canvas')]
    private CurrentCanvas $currentCanvas;

    /**
     * @var Contact $contact The contact which is currently being viewed by the teammate in the conversation details panel.
     */
    #[JsonProperty('contact')]
    private Contact $contact;

    /**
     * @var array<string, mixed> $inputValues A list of key/value pairs of data, inputted by the teammate on the current canvas.
     */
    #[JsonProperty('input_values'), ArrayType(['string' => 'mixed'])]
    private array $inputValues;

    /**
     * @var Contact $user The user who took the action.
     */
    #[JsonProperty('user')]
    private Contact $user;

    /**
     * @param array{
     *   workspaceId: string,
     *   workspaceRegion: string,
     *   admin: Admin,
     *   componentId: string,
     *   context: Context,
     *   conversation: Conversation,
     *   currentCanvas: CurrentCanvas,
     *   contact: Contact,
     *   inputValues: array<string, mixed>,
     *   user: Contact,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->workspaceId = $values['workspaceId'];
        $this->workspaceRegion = $values['workspaceRegion'];
        $this->admin = $values['admin'];
        $this->componentId = $values['componentId'];
        $this->context = $values['context'];
        $this->conversation = $values['conversation'];
        $this->currentCanvas = $values['currentCanvas'];
        $this->contact = $values['contact'];
        $this->inputValues = $values['inputValues'];
        $this->user = $values['user'];
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
     * @return string
     */
    public function getComponentId(): string
    {
        return $this->componentId;
    }

    /**
     * @param string $value
     */
    public function setComponentId(string $value): self
    {
        $this->componentId = $value;
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
     * @return CurrentCanvas
     */
    public function getCurrentCanvas(): CurrentCanvas
    {
        return $this->currentCanvas;
    }

    /**
     * @param CurrentCanvas $value
     */
    public function setCurrentCanvas(CurrentCanvas $value): self
    {
        $this->currentCanvas = $value;
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
     * @return array<string, mixed>
     */
    public function getInputValues(): array
    {
        return $this->inputValues;
    }

    /**
     * @param array<string, mixed> $value
     */
    public function setInputValues(array $value): self
    {
        $this->inputValues = $value;
        return $this;
    }

    /**
     * @return Contact
     */
    public function getUser(): Contact
    {
        return $this->user;
    }

    /**
     * @param Contact $value
     */
    public function setUser(Contact $value): self
    {
        $this->user = $value;
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
