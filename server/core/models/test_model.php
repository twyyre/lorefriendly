<?php

    require_once getcwd() . '/core/models/db_model.php';
    class testModel extends dbModel{

        public function __construct(){
            parent::__construct();

            echo "<p>Test Model loaded.</p>";
        }

        public function getAll(){

            echo "<p>getAll() method called.</p>";


            $sql = "SELECT * FROM profiles";
            $this->query($sql);

            $result = $this->execute();

            return $result;
        }

    }

?>