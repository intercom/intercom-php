<?php
namespace Intercom\Resource;

use Iterator;
use InvalidArgumentException as ArgumentException;
use Guzzle\Service\Command\ResponseClassInterface;
use Guzzle\Service\Command\OperationCommand;

class ConversationList implements ResponseClassInterface, Iterator
{
    /**
     * @var array Holds the Conversation objects in the list
     */
    private $conversations = [];

    /**
     * Gets the number of conversations in this conversation list
     *
     * @return int
     */
    public function getConversationCount()
    {
        return count($this->conversations);
    }

    /**
     * Rewinds the conversation list pointer to the start
     */
    public function rewind()
    {
        reset($this->conversations);
    }

    /**
     * Gets the current conversation at the list pointer
     *
     * @return Conversation
     */
    public function current()
    {
        return current($this->conversations);
    }

    /**
     * Gets the key for the conversation at the list pointer
     * @return mixed
     */
    public function key()
    {
        return key($this->conversations);
    }

    /**
     * Moves the conversation list pointer forward
     *
     * @return mixed|void
     */
    public function next()
    {
        return next($this->conversations);
    }

    /**
     * Verifies the current conversation list pointer
     * @return bool
     */
    public function valid()
    {
        $key = key($this->conversations);
        return ($key !== null && key($this->conversations) !== false);
    }

    /**
     * Creates the conversation objects and adds them to the list
     *
     * @param array $conversations The conversations
     * @throws ArgumentException If the API response doesn't have the correct type
     */
    private function setConversationsFromAPI(array $conversations)
    {
        // Validate the response type
        if (!isset($conversations['type']) || $conversations['type'] !== 'conversation.list') {
            // @todo: Decide if this is an exception or a silent failure
            throw new ArgumentException('API response not valid, type of response is incorrect');
        }

        foreach ($conversations['conversations'] as $conversation) {
            $conversation_obj = new Conversation($conversation);
            $this->conversations[$conversation_obj->getId()] = $conversation_obj;
        }
    }

    /**
     * Takes the response from a successful API call and creates the
     * conversation list based on that
     *
     * @param OperationCommand $command The command
     * @return ResponseClassInterface|ConversationList
     */
    public static function fromCommand(OperationCommand $command)
    {
        $response = $command->getResponse();
        $conversation_list = new self();

        if ($response->getBody()) {
            $conversation_list->setConversationsFromAPI($response->json());
        }

        return $conversation_list;
    }
}