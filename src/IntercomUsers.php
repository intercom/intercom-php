<?php

namespace Intercom;

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
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
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
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
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
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
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
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
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
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function scrollUsers($options = [])
    {
        return $this->client->get('users/scroll', $options);
    }

    /**
     * Deletes a single User based on the Intercom ID.
     *
     * @see    https://developers.intercom.com/reference#delete-a-user
     * @param  string $id
     * @param  array  $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteUser($id, $options = [])
    {
        $path = $this->userPath($id);
        return $this->client->delete($path, $options);
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
