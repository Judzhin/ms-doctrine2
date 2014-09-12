<?php

namespace Mapper;

class User extends AbstractMapper {

    protected $mapping = array(
        'id' => 'id',
        'firstName' => 'first_name',
        'lastName' => 'last_name',
        'gender' => 'gender',
        'namePrefix' => 'name_prefix'
    );

}
