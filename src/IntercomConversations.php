<?php

namespace Intercom;

class IntercomConversations {

  /** @var IntercomClient  */
  private $client;

  /**
   * IntercomConversations constructor.
   * @param IntercomClient $client
   */
  public function __construct($client)
  {
    $this->client = $client;
  }

  /**
   * Returns list of Conversations.
   * @see https://developers.intercom.io/reference#list-conversations
   * @param array $options
   * @return mixed
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function getConversations($options)
  {
    return $this->client->get("conversations", $options);
  }

  /**
   * Returns single Conversation.
   * @see https://developers.intercom.io/reference#get-a-single-conversation
   * @param string $id
   * @return mixed
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function getConversation($id) {
    $path = $this->conversationPath($id);
    return $this->client->get($path, []);
  }

  /**
   * Creates Conversation Reply to Conversation with given ID.
   * @see https://developers.intercom.io/reference#replying-to-a-conversation
   * @param string $id
   * @param array $options
   * @return mixed
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function replyToConversation($id, $options) {
    $path = $this->conversationReplyPath($id);
    return $this->client->post($path, $options);
  }

  /**
   * Returns endpoint path to Conversation with given ID.
   * @param string $id
   * @return string
   */
  public function conversationPath($id)
  {
    return "conversations/" . $id;
  }

  /**
   * Returns endpoint path to Conversation Reply for Conversation with given ID.
   * @param string $id
   * @return string
   */
  public function conversationReplyPath($id)
  {
    return "conversations/" . $id . "/reply";
  }
}
