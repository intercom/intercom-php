<?php

namespace Intercom;

class IntercomLeads extends IntercomRequest
{
    public function create(array $options)
    {
        return $this->client->post("contacts", $options);
    }

    public function getLeads(array $options)
    {
        return $this->client->get("contacts", $options);
    }

    public function getLead($id, array $options = [])
    {
        $path = $this->leadPath($id);

        return $this->client->get($path, $options);
    }

    public function deleteLead($id, array $options = [])
    {
        $path = $this->leadPath($id);

        return $this->client->delete($path, $options);
    }

    public function convertLead(array $options)
    {
        return $this->client->post("contacts/convert", $options);
    }

    public function leadPath($id)
    {
        return "contacts/" . $id;
    }
}
