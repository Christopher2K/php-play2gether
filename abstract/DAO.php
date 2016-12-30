<?php

abstract class DAO {

    protected $customQueries = [];
    protected $entity_name;
    protected $db;

    public function __construct(PDO $db) {
        $this->db = $db;
        $this->initCustomQueries();
    }

    /**
     * Init all the custom queries
     */
    protected function initCustomQueries() {}

    /**
     * General method for SELECT Queries
     *
     * @param $data
     * @return array|bool
     */
    public function select($data) {
        $request = 'SELECT * FROM ' . $this->entity_name;

        if (!empty($data)) {
            $request_parameters = [];
            foreach ($data as $key => $value) {
               array_push($request_parameters, $key . '="' . $value . '"');
            }
            $request = $request . ' WHERE ' . implode(' AND ', $request_parameters);
        }

        $result = $this->db->query($request);

        if ($result) {
            return $this->renderData($result->fetchAll(PDO::FETCH_ASSOC));
        }

        return false;
    }

    /**
     * From PDO Statement Array to Array of Objects
     *
     * @param array $statement
     * @return array
     */
    protected function renderData($statement) {
        $rendered_data = [];
        foreach ($statement as $value) {
            array_push($rendered_data, new $this->entity_name($value));
        }

        return $rendered_data;
    }
}