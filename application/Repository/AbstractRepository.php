<?php

namespace Repository;

abstract class AbstractRepository {

    private $_entityManager;

    public function __construct($em) {
        $this->_entityManager = $em;
    }

    public function getEntityManager() {
        return $this->_entityManager;
    }

}
