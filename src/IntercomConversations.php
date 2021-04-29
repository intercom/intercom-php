<?php

namespace Intercom;

use Http\Client\Exception;
use stdClass;

class IntercomConversations extends IntercomResource
{
    /**
     * Creates a Conversation.
     *
     * @see    https://developers.intercom.com/intercom-api-reference/reference#create-a-conversation
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function create(array $options)
    {
        return $this->client->post('conversations', $options);
    }

    /**
     * Returns list of Conversations.
     *
     * @see    https://developers.intercom.io/reference#list-conversations
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function getConversations($options)
    {
        return $this->client->get('conversations', $options);
    }

    /**
     * Returns single Conversation.
     *
     * @see    https://developers.intercom.io/reference#get-a-single-conversation
     * @param  string $id
     * @param  array  $options
     * @return stdClass
     * @throws Exception
     */
    public function getConversation($id, $options = [])
    {
        $path = $this->conversationPath($id);
        return $this->client->get($path, $options);
    }

    /**
     * Returns list of Conversations that match search query.
     *
     * @see    https://developers.intercom.com/intercom-api-reference/reference#search-for-conversations
     * @param  array  $options
     * @return stdClass
     * @throws Exception
     */
    public function search(array $options)
    {
        $path = 'conversations/search';
        return $this->client->post($path, $options);
    }

    /**
     * Returns next page of Conversations that match search query.
     *
     * @see    https://developers.intercom.com/intercom-api-reference/reference#pagination-search
     * @param  array $query
     * @param  stdClass $pages
     * @return stdClass
     * @throws Exception
     */
    public function nextSearch(array $query, $pages)
    {
        $path = 'conversations/search';
        return $this->client->nextSearchPage($path, $query, $pages);
    }

    /**
     * Creates Conversation Reply to Conversation with given ID.
     *
     * @see    https://developers.intercom.io/reference#replying-to-a-conversation
     * @param  string $id
     * @param  array  $options
     * @return stdClass
     * @throws Exception
     */
    public function replyToConversation($id, $options)
    {
        $path = $this->conversationReplyPath($id);
        return $this->client->post($path, $options);
    }

    /**
     * Creates Conversation Reply to last conversation. (no need to specify Conversation ID.)
     *
     * @see    https://developers.intercom.io/reference#replying-to-users-last-conversation
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function replyToLastConversation($options)
    {
        $path = 'conversations/last/reply';
        return $this->client->post($path, $options);
    }

    /**
     * Marks a Conversation as read based on the given Conversation ID.
     *
     * @see    https://developers.intercom.io/reference#marking-a-conversation-as-read
     * @param  string $id
     * @return stdClass
     * @throws Exception
     */
    public function markConversationAsRead($id)
    {
        $path = $this->conversationPath($id);
        $data = ['read' => true];
        return $this->client->put($path, $data);
    }

    /**
     * Returns endpoint path to Conversation with given ID.
     *
     * @param  string $id
     * @return string
     */
    public function conversationPath($id)
    {
        return 'conversations/' . $id;
    }

    /**
     * Returns endpoint path to Conversation Reply for Conversation with given ID.
     *
     * @param  string $id
     * @return string
     */
    public function conversationReplyPath($id)
    {
        return 'conversations/' . $id . '/reply';
    }
}
