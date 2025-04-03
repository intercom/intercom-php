<?php

namespace Intercom\Test;

use Intercom\IntercomArticles;

class IntercomArticlesTest extends TestCase
{
    public function testCreateArticle()
    {
        $this->client->method('post')->willReturn('foo');

        $articles = new IntercomArticles($this->client);
        $this->assertSame('foo', $articles->create([
            'title' => 'Test Article',
            'description' => 'Test Description',
            'body' => '<p>Test Body</p>',
            'author_id' => '123'
        ]));
    }

    public function testGetArticle()
    {
        $this->client->method('get')->willReturn('foo');

        $articles = new IntercomArticles($this->client);
        $this->assertSame('foo', $articles->getArticle('123'));
    }

    public function testUpdateArticle()
    {
        $this->client->method('put')->willReturn('foo');

        $articles = new IntercomArticles($this->client);
        $this->assertSame('foo', $articles->update('123', [
            'title' => 'Updated Title'
        ]));
    }

    public function testDeleteArticle()
    {
        $this->client->method('delete')->willReturn('foo');

        $articles = new IntercomArticles($this->client);
        $this->assertSame('foo', $articles->deleteArticle('123'));
    }

    public function testListArticles()
    {
        $this->client->method('get')->willReturn('foo');

        $articles = new IntercomArticles($this->client);
        $this->assertSame('foo', $articles->getArticles());
    }
} 