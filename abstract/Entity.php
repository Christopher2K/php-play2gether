<?php

abstract class Entity {

    public function __construct($data) {
        $this->hydrate($data);
    }

    public function hydrate($data) {
        foreach ($data as $key => $value) {
            $method = 'set' . $this->transformDatabaseColumnName($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function transformDatabaseColumnName($column_name) {
        $column_words = explode('_', $column_name);
        foreach ($column_words as $key => $word) {
            $column_words[$key] = ucfirst($word);
        }

        return implode($column_words);
    }
}