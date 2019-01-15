<?php

namespace Intercom;

use Http\Client\Exception;

class IntercomUsers
{

    /**
     * @var IntercomClient
     */
    private $client;

    /**
     * IntercomUsers constructor.
     *
     * @param IntercomClient $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * Creates a User.
     *
     * @see    https://developers.intercom.io/reference#create-or-update-user
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function create($options)
    {
        return $this->client->post("users", $options);
    }

    /**
     * Creates a User.
     *
     * @see    https://developers.intercom.io/reference#create-or-update-user
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function update($options)
    {
        return $this->create($options);
    }

    /**
     * Lists Users.
     *
     * @see    https://developers.intercom.io/reference#list-users
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function getUsers($options)
    {
        return $this->client->get('users', $options);
    }

    /**
     * Gets a single User based on the Intercom ID.
     *
     * @see    https://developers.intercom.com/reference#view-a-user
     * @param  string $id
     * @param  array  $options
     * @return stdClass
     * @throws Exception
     */
    public function getUser($id, $options = [])
    {
        $path = $this->userPath($id);
        return $this->client->get($path, $options);
    }

    /**
     * Gets a list of Users through the user scroll API.
     *
     * @see    https://developers.intercom.com/reference#iterating-over-all-users
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function scrollUsers($options = [])
    {
        return $this->client->get('users/scroll', $options);
    }

    /**
     * Deletes a single User based on the Intercom ID.
     *
     * @see    https://developers.intercom.com/reference#archive-a-user
     * @param  string $id
     * @param  array  $options
     * @return stdClass
     * @throws Exception
     */
    public function archiveUser($id, $options = [])
    {
        $path = $this->userPath($id);
        return $this->client->delete($path, $options);
    }

    /**
     * Deletes a single User based on the Intercom ID.
     *
     * @see    https://developers.intercom.com/reference#archive-a-user
     * @param  string $id
     * @param  array  $options
     * @return stdClass
     * @throws Exception
     */
    public function deleteUser($id, $options = [])
    {
        return $this->archiveUser($id, $options);
    }

    /**
     * Permanently deletes a single User based on the Intercom ID.
     *
     * @see   https://developers.intercom.com/reference#delete-users
     * @param string $id
     * @return stdClass
     * @throws Exception
     */
    public function permanentlyDeleteUser($id)
    {
        return $this->client->post('user_delete_requests', [
            'intercom_user_id' => $id
        ]);
    }

    /**
     * @param string $id
     * @return string
     */
    public function userPath($id)
    {
        return 'users/' . $id;
    }
}
