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
     * Updates an existing Contact
     *
     * @see    https://developers.intercom.com/intercom-api-reference/reference#update-contact
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */

    public function update(string $id, array $options)
    {
        $path = $this->contactPath($id);

        return $this->client->put($path, $options);
    }

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

    public function getContact(string $id, array $options = [])
    {
        $path = $this->contactPath($id);
        return $this->client->get($path, $options);
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
     * Applys a tag to a Contact based on the provided Tag ID
     *
     * @see    https://developers.intercom.com/intercom-api-reference/reference#tag-contact
     * @param  string $id
     * @param  string  $tagId
     * @return stdClass
     * @throws Exception
     */
    public function addTag(string $id, string $tagId)
    {
        $path = $this->contactTagsPath($id);

        return $this->client->post($path, ['id' => $tagId]);
    }

    /**
     * Removes a tag from a Contact based on the provided Tag ID
     *
     * @see    https://developers.intercom.com/intercom-api-reference/reference#untag-contact
     * @param  string $id
     * @param  string  $tagId
     * @return stdClass
     * @throws Exception
     */
    public function removeTag(string $id, string $tagId)
    {
        $path = $this->contactTagsPath($id);

        return $this->client->delete($path, ['id' => $tagId]);
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
     * Gets all data attributes for the Contact model
     *
     * @see    https://developers.intercom.com/intercom-api-reference/reference#list-data-attributes
     * @param  array  $options
     * @return stdClass
     * @throws Exception
     */
    public function getAttributes($options = [])
    {
        $options = array_merge($options, ["model" => "contact"]);

        return $this->client->get('data_attributes', $options);
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

    /**
     * Returns the path for adding/removing a tag for a given contact
     *
     * @param string $id Contact ID
     * @return string
     */
    public function contactTagsPath(string $id)
    {
        return 'contacts/' . $id . '/tags';
    }
}
