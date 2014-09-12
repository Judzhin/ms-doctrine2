<?php

namespace Mapper;

abstract class AbstractMapper {

    public function getIdColumn() {
        return 'id';
    }

    public function extract($entity) {

        $data = array();

        foreach ($this->mapping as $keyObject => $keyColumn) {

            if ($keyColumn != $this->getIdColumn()) {

                $data[$keyColumn] = call_user_func(
                        array($entity, 'get' . ucfirst($keyObject))
                );
            }
        }

        return $data;
    }

    public function populate($data, $entity) {

        $mappingsFlipped = array_flip($this->mapping);

        foreach ($data as $key => $value) {

            if (isset($mappingsFlipped[$key])) {

                call_user_func_array(
                        array($entity, 'set' . ucfirst($mappingsFlipped[$key])), array($value)
                );
            }
        }

        return $entity;
    }

}
