<?php

namespace Intercom;

class IntercomConversations extends IntercomRequest
{
    public function getConversations(array $options)
    {
        return $this->client->get("conversations", $options);
    }

    public function getConversation($id)
    {
        $path = $this->conversationPath($id);

        return $this->client->get($path, []);
    }

    public function replyToConversation($id, array $options)
    {
        $path = $this->conversationReplyPath($id);

        return $this->client->post($path, $options);
    }

    public function conversationPath($id)
    {
        return "conversations/" . $id;
    }

    public function conversationReplyPath($id)
    {
        return "conversations/" . $id . "/reply";
    }
}
