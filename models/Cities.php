<?php 

    namespace Models;

    class Cities{

        protected static $conn;
        protected static $calumnsTbl = ['id_city','nombre_city','id_region'];
        private $id_city;
        private $nombre_city;
        private $id_region;


        public function __construct($arg = []){
            
            $this->id_city = $args['id_city'] ?? '';
            $this->nombre_city = $args['name_city'] ?? '';
            $this->id_region = $args['id_region'] ?? '';

        }

        public function saveData($data){

            $delimiter = ":";
            //Preguntar
            $dataBd = $this->sanitizarAttributos();
            $valCols = $delimiter . join(',:',array_keys($data));
            $cols = join(',',array_keys($data));
            $sql = "INSERT INTO cities ($cols) VALUES ($valCols)";
            $stmt = self::$conn->prepare($sql);
            $stmt->execute($data);

        }

        public function loadAllData(){

            $sql = "SELECT id_city,name_city,id_region FROM pais";
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

                if($columna === 'id_city') continue;
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