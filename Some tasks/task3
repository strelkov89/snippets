<?php

/**
 * Class Base, расширяемый класс для реализации каких-либо общих методов
 */
class Base
{
    /**
     * @var string
     */
    public $tableName;

    /**
     * @var int
     */
    public $objectId;

    /**
     * Ф-я для получения информации о каком-либо объекте.
     * Возвращает конкретный экземпляр объекта.
     *
     * @param string $tableName
     * @param int $objectId
     * @return object
     */
    public function getInfo(string $tableName, int $objectId)
    {
        /** Some code here ... */
        return $object;
    }
}

/**
 * Class User, реализующий сущность "Пользователь"
 */
class User extends Base
{
    /**
     * @var string
     */
    public $tableName = "user";

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $lastName;

    /**
     * Ф-я для создания новой статьи. На вход получает параметры: Id пользователя, название, описание, текст статьи.
     * Возвращает Id созданной статьи.
     *
     * @param int $userId
     * @param string $title
     * @param string $description
     * @param string $text
     * @return int
     */
    public function createArticle(int $userId, string $title, string $description, string $text)
    {
        /** Some code here ... */
        return $articleId;
    }


    /**
     * Ф-я для получения всех статей конкретного пользователя. На вход получает Id пользователя.
     * Возвращает массив с Id всех статей или пустой массив.
     *
     * @param int $userId
     * @return array
     */
    public function getAllArticles(int $userId)
    {
        /** Some code here ... */
        return $articleIds;
    }
}

/**
 * Class Article, реализующий сущность "Статья"
 */
class Article extends Base
{
    /**
     * @var string
     */
    public $tableName = "article";

    /**
     * Название статьи.
     * @var string
     */
    public $title;

    /**
     * Описание статьи.
     * @var string
     */
    public $description;

    /**
     * Id автора.
     * @var int
     */
    public $userId;

    /**
     * Ф-я для получения автора статьи. На вход получает Id статьи.
     * Возвращает Id автора.
     *
     * @param int $articleId
     * @return int
     */
    public function getAuthor(int $articleId)
    {
        /** Some code here ... */
        return $userId;
    }

    /**
     * Ф-я для смены автора статьи. На вход получает параметры:
     * Id статьи, для которой нужно менять автора и Id нового автора статьи.
     * Возвращает true или false.
     *
     * @param int $articleId
     * @param int $newAuthorId
     * @return bool
     */
    public function changeAuthor(int $articleId, int $newAuthorId)
    {
        /** Some code here ... */
        return $bool;
    }
}
