<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Admins\Types\Admin;

class ConfigureRequestZero extends JsonSerializableType
{
    /**
     * @var string $workspaceId The workspace ID of the teammate. Attribute is app_id for V1.2 and below.
     */
    #[JsonProperty('workspace_id')]
    private string $workspaceId;

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
     * @param array{
     *   workspaceId: string,
     *   admin: Admin,
     *   context: Context,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->workspaceId = $values['workspaceId'];
        $this->admin = $values['admin'];
        $this->context = $values['context'];
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
