<?php 

    namespace Models;
    
    class Persons{

        protected static $conn;
        protected static $calumnsTbl = ['id_person','first_name_person','lastname_person','birthdate_person','id_city'];
        private $id_person;
        private $first_name_person;
        private $lastname_person;
        private $birthdate_person;
        private $id_city;


        public function __construct($arg = []){
            
            $this->id_person = $args['id_person'] ?? '';
            $this->first_name_person = $args['first_name_person'] ?? '';
            $this->lastname_person = $args['lastname_person'] ?? '';
            $this->birthdate_person = $args['birthdate_person'] ?? '';
            $this->id_city = $args['id_city'] ?? '';

        }

        public function saveData($data){

            $delimiter = ":";
            //Preguntar
            $dataBd = $this->sanitizarAttributos();
            $valCols = $delimiter . join(',:',array_keys($data));
            $cols = join(',',array_keys($data));
            $sql = "INSERT INTO persons ($cols) VALUES ($valCols)";
            $stmt = self::$conn->prepare($sql);
            $stmt->execute($data);

        }

        public function loadAllData(){

            $sql = "SELECT id_person,first_name_person,lastname_person,birthdate_person,id_city FROM persons";
            $stmt = self::$conn->prepare($sql);

            $stmt->execute();
            $cliente = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $clientes;

        }
        
        public static function setConn($connBd){

            self::$conn = $connBd;

        }

        public function atributos(){

            $atributos = [];
            foreach (self::$columnsTbl as $columna){

                if($columna === 'id_person') continue;
                $atributos [$columna]=$this->columna;

            }
            return $atributos;
        }

        public function sanitizarAttributos(){

            $atributos = $this->atributos();
            $sanitizado = [];

            foreach($atributos as $key=> $value){

                $sanitizado[$key] = self::$conn->quote($value);

            }

            return $sanitizado;

        }

    }

?>