<?php 

    namespace Models;

    class Countries{

        protected static $conn;
        protected static $calumnsTbl = ['id_country','name_country'];
        private $id_country;
        private $name_country;

        public function __construct($arg = []){
            
            $this->id_country = $args['id_country'] ?? '';
            $this->name_country = $args['name_country'] ?? '';

        }

        public function saveData($data){

            $delimiter = ":";
            //Preguntar
            $dataBd = $this->sanitizarAttributos();
            $valCols = $delimiter . join(',:',array_keys($data));
            $cols = join(',',array_keys($data));
            $sql = "INSERT INTO countries ($cols) VALUES ($valCols)";
            $stmt = self::$conn->prepare($sql);
            $stmt->execute($data);

        }

        public function loadAllData(){

            $sql = "SELECT id_country,name_country FROM countries";
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

                if($columna === 'id_country') continue;
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