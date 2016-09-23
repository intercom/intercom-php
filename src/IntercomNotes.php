<?php

namespace Intercom;

class IntercomNotes extends IntercomRequest
{
    public function create(array $options)
    {
        return $this->client->post("notes", $options);
    }

    public function getNotes(array $options)
    {
        return $this->client->get("notes", $options);
    }

    public function getNote($id)
    {
        return $this->client->get("notes/" . $id, []);
    }
}
