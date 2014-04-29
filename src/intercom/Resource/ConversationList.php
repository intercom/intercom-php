<?php
namespace Intercom\Resource;

use InvalidArgumentException as ArgumentException;
use Guzzle\Service\Command\ResponseClassInterface;
use Guzzle\Service\Command\OperationCommand;
use Intercom\Util\ObjectList;

class ConversationList extends ObjectList implements ResponseClassInterface
{
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
            $this->objects[$conversation_obj->getId()] = $conversation_obj;
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