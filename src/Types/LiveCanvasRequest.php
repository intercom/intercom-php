<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Contacts\Types\Contact;

/**
 * Canvases are static by default and require a new request to come through in order to update them. Live canvases however will make requests every time the card is viewed without any interaction needed, meaning the canvas can be kept up-to-date with no action from the user.
 *
 * This works for every Messenger request that you can respond with a canvas object to. Instead of returning the content object within the canvas object, you should provide a `content_url` attribute instead with the value being the URL you want us to send a POST request to when someone views the app.
 */
class LiveCanvasRequest extends JsonSerializableType
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
     * @var CanvasObject $canvas The current_canvas the teammate can see.
     */
    #[JsonProperty('canvas')]
    private CanvasObject $canvas;

    /**
     * @var Context $context The context of where the app is added, where the user last visited, and information on the Messenger settings.
     */
    #[JsonProperty('context')]
    private Context $context;

    /**
     * @var Contact $contact The contact who viewed the card.
     */
    #[JsonProperty('contact')]
    private Contact $contact;

    /**
     * @param array{
     *   workspaceId: string,
     *   workspaceRegion: string,
     *   canvas: CanvasObject,
     *   context: Context,
     *   contact: Contact,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->workspaceId = $values['workspaceId'];
        $this->workspaceRegion = $values['workspaceRegion'];
        $this->canvas = $values['canvas'];
        $this->context = $values['context'];
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
     * @return CanvasObject
     */
    public function getCanvas(): CanvasObject
    {
        return $this->canvas;
    }

    /**
     * @param CanvasObject $value
     */
    public function setCanvas(CanvasObject $value): self
    {
        $this->canvas = $value;
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
