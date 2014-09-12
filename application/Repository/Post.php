<?php

namespace Repository;

use Mapper\Post as PostMapper;
use Entity\Post as PostEntity;

class Post extends AbstractRepository {

    private $mapper;

    public function __construct($em) {
        parent::__construct($em);
        $this->mapper = new PostMapper;
    }

    public function findByUser($user) {

        $postsData = $this->getEntityManager()->query('SELECT * FROM posts WHERE user_id = ' . $user->getId())->fetchAll();

        $posts = array();

        foreach ($postsData as $postData) {
            $newPost = new PostEntity();
            $posts[] = $this->mapper->populate($postData, $newPost);
        }

        return $posts;
    }

}
