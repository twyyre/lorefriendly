<?php


    class dbModel{

        private $dbHost='localhost';
        private $dbUser='root';
        private $dbPassword='';
        private $dbName='isterlabAcademyLocal';
        protected $stmt;
        protected $db;


        protected function __construct(){

            $conn = "mysql:host=$this->dbHost; dbname=$this->dbName";

            $options = [
                PDO::ATTR_PERSISTENT=>TRUE,
                PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
            ];

            try{
                $this->db = new PDO($conn, $this->dbUser, $this->dbPassword, $options);
                // echo "<br>Connected.";
            } catch(PDOException $e){
                $this->error = $e->getMessage();
                echo "<br>".$this->error;
            }

            // echo "<h2>DatabaseModel loaded.</h1>";
        }
        protected function pdoGetType($param, $type=null){
            
            switch(is_null($type)){

                case is_int($param):
                    $type = PDO::PARAM_INT;
                    break;

                case is_bool($param):
                    $type = PDO::PARAM_BOOL;
                    break;

                case is_null($param):
                    $type = PDO::PARAM_NULL;
                    break;
                    
                default:
                    $type = PDO::PARAM_STR;
            }

            return $type;
        }

        protected function query($sql){
            $this->stmt = $this->db->prepare($sql);
            $this->execute();
            
            try{
                
                $result =  $this->stmt->fetchAll(PDO::FETCH_ASSOC);

            }

            catch(PDOException $e){
                echo $e;
            }
            
        }

        protected function bind($paramName, $param){
                    
            // if(is_iterable($param)){

            //     foreach($param as $param){

            //         $type = $this->pdoGetType($param);
                    
            //         $this->stmt->bindValue($param, $param, $type);

            //     }

            // } else 
            {

                $type = $this->pdoGetType($param);

                $this->stmt->bindValue($paramName, $param, $type);
            }
        }

        protected function execute(){
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        protected function single(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        }

        protected function rowcount(){
            return $this->stmt->rowCount();
        }

        protected function get_result(){
            //
        }
    }
    
?>