<?php

namespace Intercom;

class IntercomUsers extends IntercomRequest
{
    public function create(array $options)
    {
        return $this->client->post("users", $options);
    }

    public function getUsers(array $options)
    {
        return $this->client->get("users", $options);
    }

    public function deleteUser($id, array $options = [])
    {
        $path = $this->userPath($id);

        return $this->client->delete($path, $options);
    }

    public function userPath($id)
    {
        return "users/" . $id;
    }
}
