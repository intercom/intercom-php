<?php
namespace Intercom;

use Http\Client\Exception;
use stdClass;

class IntercomContacts extends IntercomResource
{
    /**
     * Creates a Contact.
     *
     * @see    https://developers.intercom.com/intercom-api-reference/reference#create-contact
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function create(array $options)
    {
        return $this->client->post("contacts", $options);
    }

    /**
     * Updates a Contact.
     *
     * @see    https://developers.intercom.com/intercom-api-reference/reference#update-contact
     * @param  string $id
     * Updates an existing Contact
     *
     * @see    https://developers.intercom.com/intercom-api-reference/reference#update-contact
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
<<<<<<< HEAD

    public function update(string $id, array $options)
    {
        $path = $this->contactPath($id);
        return $this->client->put($path, $options);
=======
    public function update($id, $options = [])
    {
        $path = $this->contactPath($id);
        return $this->client->put($path, $options);
    }
>>>>>>> fixed contact update method

    /**
     * Lists Contacts.
     *
     * @see    https://developers.intercom.com/intercom-api-reference/reference#list-contacts
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */

    public function getContacts(array $options = [])
    {
        return $this->client->get('contacts', $options);
    }

    /**
     * Gets a single Contact based on the Intercom ID.
     *
     * @see    https://developers.intercom.com/intercom-api-reference/reference#get-contact
     * @param  string $id
     * @param  array  $options
     * @return stdClass
     * @throws Exception
     */

    public function getContact($id, $options = [])
    {
        $path = $this->contactPath($id);
        return $this->client->get($path, $options);
    }
    
    /**
     * Gets all data attributes for contacts
     *
     * @see    https://developers.intercom.com/intercom-api-reference/reference#get-contact
     * @param  array  $options
     * @return stdClass
     * @throws Exception
     */
    public function getContactAttributes($options = [])
    {
        $options = array_merge($options, ["model" => "contact"]);
        
        return $this->client->get('data_attributes', $options);
    }
    
    /**
     * Searches for contacts
     *
     * @see    https://developers.intercom.com/intercom-api-reference/reference#search-for-contact
     * @param  array  $options
     * @return stdClass
     * @throws Exception
     */
    public function searchContacts($options = [])
    {
        return $this->client->post('contacts/search', $options);
    }

    /**
     * Permenently Deletes a single Contact based on the Intercom ID.
     *
     * @see    https://developers.intercom.com/intercom-api-reference/reference#delete-contact
     * @param  string $id
     * @param  array  $options
     * @return stdClass
     * @throws Exception
     */
    public function deleteContact(string $id, array $options = [])
    {
        $path = $this->contactPath($id);
        return $this->client->delete($path, $options);
    }

    /**
     * Returns list of Contacts that match search query.
     *
     * @see     https://developers.intercom.com/reference#search-for-contacts
     * @param   array $options
     * @return  stdClass
     * @throws  Exception
     */
    public function search(array $options)
    {
        $path = 'contacts/search';
        return $this->client->post($path, $options);
    }

    /**
     * Returns next page of Contacts that match search query.
     *
     * @see     https://developers.intercom.com/intercom-api-reference/reference#pagination-search
     * @param   array $query
     * @param   stdClass $pages
     * @return  stdClass
     * @throws  Exception
     */
    public function nextSearch(array $query, $pages)
    {
        $path = 'contacts/search';
        return $this->client->nextSearchPage($path, $query, $pages);
    }

    /**
     * Returns next page of a Contacts list.
     *
     * @see     https://developers.intercom.com/intercom-api-reference/reference#pagination
     * @param   stdClass $pages
     * @return  stdClass
     * @throws  Exception
     */
    public function nextCursor($pages)
    {
        $path = 'contacts';
        $starting_after = $pages->next->starting_after;
        return $this->client->nextCursorPage($path, $starting_after);
    }

    /**
     * @param string $id
     * @return string
     */
    public function contactPath(string $id)
    {
        return 'contacts/' . $id;
    }
}
