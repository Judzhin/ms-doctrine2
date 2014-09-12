<?php

namespace Mapper;

class Post extends AbstractMapper{ 

    protected $mapping = array(
        'id' => 'id',
        'title' => 'title',
        'content' => 'content',
    );

}
