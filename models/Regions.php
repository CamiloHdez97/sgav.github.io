<?php 

    namespace Models;
    
    class Regions{

        protected static $conn;
        protected static $calumnsTbl = ['id_region','name_region','id_country'];
        private $id_region;
        private $name_region;
        private $id_country;

        public function __construct($arg = []){
            
            $this->id_region = $args['id_region'] ?? '';
            $this->name_region = $args['name_region'] ?? '';
            $this->id_country = $args['id_country'] ?? '';

        }

        public function saveData($data){

            $delimiter = ":";
            //Preguntar
            $dataBd = $this->sanitizarAttributos();
            $valCols = $delimiter . join(',:',array_keys($data));
            $cols = join(',',array_keys($data));
            $sql = "INSERT INTO regions ($cols) VALUES ($valCols)";
            $stmt = self::$conn->prepare($sql);
            $stmt->execute($data);

        }

        public function loadAllData(){

            $sql = "SELECT id_region,name_region,id_country FROM regions";
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

                if($columna === 'id_region') continue;
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