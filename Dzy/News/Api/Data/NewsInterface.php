<?php

namespace Dzy\News\Api\Data;

interface NewsInterface
{
    const ID_NEWS = 'id_news';
    const TITLE = 'title';
    const DESCRIPTION = 'description';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const AUTHOR = 'author';

    public function getIdNews();

    public function setIdNews($id_news);

    public function getTitle();

    public function setTitle($title);

    public function getDescription();

    public function setDescription($description);

    public function getCreatedAt();

    public function setCreatedAt($created_at);

    public function getUpdatedAt();

    public function setUpdatedAt($updated_at);

    public function getAuthor();

    public function setAuthor($author);

}