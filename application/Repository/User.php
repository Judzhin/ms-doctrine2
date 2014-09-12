<?php

namespace Repository;

use Mapper\User as UserMapper;
use Entity\User as UserEntity;

class User extends AbstractRepository {

    private $mapper;

    public function __construct($em) {
        parent::__construct($em);
        $this->mapper = new UserMapper;
    }

    public function findOneById($id) {
        $em = $this->getEntityManager();
        $data = $em->query('SELECT * FROM users WHERE id = ' . $id)->fetch();

        $user = new UserEntity();
        $user->setPostRepository($em->getPostRepository());

        return $em->registerUserEntity($id, $this->mapper->populate($data, $user));
    }

}
