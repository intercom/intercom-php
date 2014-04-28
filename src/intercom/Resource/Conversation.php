<?php
namespace Intercom\Resource;

class Conversation
{
    /**
     * @var null|array
     */
    private $assigned_to;

    /**
     * @var null|int
     */
    private $created_at;

    /**
     * @var null|int;
     */
    private $id;

    /**
     * @var null|array
     */
    private $latest_user_visible_comment;

    /**
     * @var null|array
     */
    private $owner;

    /**
     * @var null|int
     */
    private $updated_at;

    /**
     * @var null|int
     */
    private $user;

    /**
     * @var null|int
     */
    private $user_created;

    /**
     * Creates a new conversation
     * @param array $conversation Optional. An array of data for the conversation
     */
    public function __construct($conversation = [])
    {
        if (!empty($conversation)) {
            $this->setConversationFromData($conversation);
        }
    }

    /**
     * Sets conversation data from an array
     *
     * @param array $conversation Conversation data
     */
    private function setConversationFromData($conversation) {
        foreach($conversation as $attribute => $value) {
            if (property_exists($this, $attribute)) {
                $setter_method = sprintf('set%s', str_replace('_', '', $attribute));
                if (method_exists($this, $setter_method)) {
                    $this->$setter_method($value);
                }
            }
        }
    }

    /**
     * @param mixed $user_created
     */
    public function setUserCreated($user_created)
    {
        $this->user_created = $user_created;
    }

    /**
     * @return mixed
     */
    public function getUserCreated()
    {
        return $this->user_created;
    }

    /**
     * @param mixed $assigned_to
     */
    public function setAssignedTo($assigned_to)
    {
        $this->assigned_to = $assigned_to;
    }

    /**
     * @return mixed
     */
    public function getAssignedTo()
    {
        return $this->assigned_to;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $latest_user_visible_comment
     */
    public function setLatestUserVisibleComment($latest_user_visible_comment)
    {
        $this->latest_user_visible_comment = $latest_user_visible_comment;
    }

    /**
     * @return mixed
     */
    public function getLatestUserVisibleComment()
    {
        return $this->latest_user_visible_comment;
    }

    /**
     * @param mixed $owner
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    /**
     * @return mixed
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param mixed $updated_at
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }
}