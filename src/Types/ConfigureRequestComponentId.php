<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Admins\Types\Admin;
use Intercom\Core\Types\ArrayType;

class ConfigureRequestComponentId extends JsonSerializableType
{
    /**
     * @var string $workspaceId The workspace ID of the teammate. Attribute is app_id for V1.2 and below.
     */
    #[JsonProperty('workspace_id')]
    private string $workspaceId;

    /**
     * @var string $workspaceRegion The Intercom hosted region that this app is located in.
     */
    #[JsonProperty('workspace_region')]
    private string $workspaceRegion;

    /**
     * @var string $componentId The id of the component clicked by the teammate to trigger the request.
     */
    #[JsonProperty('component_id')]
    private string $componentId;

    /**
     * @var Admin $admin The Intercom teammate configuring the app.
     */
    #[JsonProperty('admin')]
    private Admin $admin;

    /**
     * @var Context $context The context of where the app is added, where the user last visited, and information on the Messenger settings.
     */
    #[JsonProperty('context')]
    private Context $context;

    /**
     * @var CanvasObject $currentCanvas The current canvas the teammate can see.
     */
    #[JsonProperty('current_canvas')]
    private CanvasObject $currentCanvas;

    /**
     * @var array<string, mixed> $inputValues A list of key/value pairs of data, inputted by the teammate on the current canvas.
     */
    #[JsonProperty('input_values'), ArrayType(['string' => 'mixed'])]
    private array $inputValues;

    /**
     * @param array{
     *   workspaceId: string,
     *   workspaceRegion: string,
     *   componentId: string,
     *   admin: Admin,
     *   context: Context,
     *   currentCanvas: CanvasObject,
     *   inputValues: array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->workspaceId = $values['workspaceId'];
        $this->workspaceRegion = $values['workspaceRegion'];
        $this->componentId = $values['componentId'];
        $this->admin = $values['admin'];
        $this->context = $values['context'];
        $this->currentCanvas = $values['currentCanvas'];
        $this->inputValues = $values['inputValues'];
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
     * @return CanvasObject
     */
    public function getCurrentCanvas(): CanvasObject
    {
        return $this->currentCanvas;
    }

    /**
     * @param CanvasObject $value
     */
    public function setCurrentCanvas(CanvasObject $value): self
    {
        $this->currentCanvas = $value;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
