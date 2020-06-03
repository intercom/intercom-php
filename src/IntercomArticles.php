<?php

namespace Intercom;

use Http\Client\Exception;
use stdClass;

class IntercomArticles extends IntercomResource
{
    /**
     * Creates an Article.
     *
     * @see    https://developers.intercom.com/intercom-api-reference/v0/reference#create-an-article
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function create(array $options)
    {
        return $this->client->post("articles", $options);
    }
    
    /**
     * Gets a single Article based on the Article ID.
     *
     * @see    https://developers.intercom.com/intercom-api-reference/v0/reference#retrieve-an-article
     * @param  string $id
     * @param  array  $options
     * @return stdClass
     * @throws Exception
     */
    public function getArticle($id, $options = [])
    {
        $path = $this->articlePath($id);
        return $this->client->get($path, $options);
    }

    /**
     * Updates an existing Article
     *
     * @see    https://developers.intercom.com/intercom-api-reference/v0/reference#update-an-article
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function update($id, $options = [])
    {
        $path = $this->articlePath($id);
        return $this->client->put($path, $options);
    }
    
     /**
     * Deletes a single article based on the Article ID.
     *
     * @see    https://developers.intercom.com/intercom-api-reference/v0/reference#delete-an-article
     * @param  string $id
     * @param  array  $options
     * @return stdClass
     * @throws Exception
     */
    public function deleteArticle(string $id, array $options = [])
    {
        $path = $this->articlePath($id);
        return $this->client->delete($path, $options);
    }

    /**
     * Lists Articles.
     *
     * @see    https://developers.intercom.com/intercom-api-reference/v0/reference#list-all-articles
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function getArticles(array $options)
    {
        return $this->client->get('articles', $options);
    }

    /**
     * @param string $id
     * @return string
     */
    public function articlePath(string $id)
    {
        return 'articles/' . $id;
    }
}
