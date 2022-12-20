<?php

namespace Intercom;

use Http\Client\Exception;
use stdClass;

class IntercomCompanies extends IntercomResource
{
    /**
     * Creates a Company.
     *
     * @see    https://developers.intercom.io/reference#create-or-update-company
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function create($options)
    {
        return $this->client->post("companies", $options);
    }

    /**
     * Updates a Company.
     *
     * @see    https://developers.intercom.io/reference#create-or-update-company
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function update($options)
    {
        return $this->create($options);
    }

    /**
     * Attaches a Contact to a Company.
     *
     * @see    https://developers.intercom.io/reference#attach-contact-to-company
     * @param  string $contactId
     * @param  string $companyId
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function attachContact(string $contactId, string $companyId, array $options = [])
    {
        $path = $this->companyAttachPath($contactId);
        $options = array_merge($options, ["id" => $companyId]);
        return $this->client->post($path, $options);
    }

    /**
     * Detaches a Contact from a Company.
     *
     * @see    https://developers.intercom.io/reference#detach-contact-from-company
     * @param  string $contactId
     * @param  string $companyId
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function detachContact(string $contactId, string $companyId, array $options = [])
    {
        $path = $this->companyDetachPath($contactId, $companyId);
        return $this->client->delete($path, $options);
    }

    /**
     * Returns list of Companies.
     *
     * @see    https://developers.intercom.io/reference#list-companies
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function getCompanies($options)
    {
        return $this->client->get("companies", $options);
    }

    /**
     * Gets a single Company based on the Intercom ID.
     *
     * @see    https://developers.intercom.com/reference#view-a-company
     * @param  string $id
     * @param  array  $options
     * @return stdClass
     * @throws Exception
     */
    public function getCompany($id, $options = [])
    {
        $path = $this->companyPath($id);
        return $this->client->get($path, $options);
    }


    /**
     * Returns a list of Users belonging to a single Company based on the Intercom ID.
     *
     * @see    https://developers.intercom.com/reference#list-company-users
     * @param  string $id
     * @param  array  $options
     * @return stdClass
     * @throws Exception
     */
    public function getCompanyUsers($id, $options = [])
    {
        $path = $this->companyUsersPath($id);
        return $this->client->get($path, $options);
    }

    /**
     * @param string $id
     * @return string
     */
    public function companyPath($id)
    {
        return 'companies/' . $id;
    }

    /**
     * @param string $id
     * @return string
     */
    public function companyUsersPath($id)
    {
        return 'companies/' . $id . '/users';
    }

    /**
     * @param string $contactId
     * @return string
     */
    public function companyAttachPath(string $contactId)
    {
        return 'contacts/' . $contactId . '/companies';
    }
    
    /**
     * @param string $contactId
     * @param string $companyId
     * @return string
     */
    public function companyDetachPath(string $contactId, string $companyId)
    {
        return 'contacts/' . $contactId . '/companies/' . $companyId;
    }
}
