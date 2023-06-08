<?php 

    namespace Models;
    
    class Living_place{

        protected static $conn;
        protected static $calumnsTbl = ['id_living','id_person','id_city','rooms_living','kitchen_living','tvroom_living','patio_living','pool_living','barbecue_living','image_living','id_typehouse'];
        private $id_living;
        private $id_person;
        private $id_city;
        private $rooms_living;
        private $bathrooms_living;
        private $kitchen_living;
        private $tvroom_living;
        private $patio_living;
        private $pool_living;
        private $barbecue_living;
        private $image_living;
        private $id_typehouse;



        public function __construct($arg = []){
            
            $this->id_living = $args['id_living'] ?? '';
            $this->id_person = $args['id_person'] ?? '';
            $this->id_city = $args['id_city'] ?? '';
            $this->rooms_living = $args['rooms_living'] ?? '';
            $this->bathrooms_living = $args['bathrooms_living'] ?? '';
            $this->kitchen_living = $args['kitchen_living'] ?? '';
            $this->tvroom_living = $args['tvroom_living'] ?? '';
            $this->patio_living = $args['patio_living'] ?? '';
            $this->pool_living = $args['pool_living'] ?? '';
            $this->barbecue_living = $args['barbecue_living'] ?? '';
            $this->image_living = $args['image_living'] ?? '';
            $this->id_typehouse = $args['id_typehouse'] ?? '';

        }

        public function saveData($data){

            $delimiter = ":";
            //Preguntar
            $dataBd = $this->sanitizarAttributos();
            $valCols = $delimiter . join(',:',array_keys($data));
            $cols = join(',',array_keys($data));
            $sql = "INSERT INTO Living_place ($cols) VALUES ($valCols)";
            $stmt = self::$conn->prepare($sql);
            $stmt->execute($data);

        }

        public function loadAllData(){

            $sql = "SELECT id_living,id_person,id_city,rooms_living,bathrooms_living,kitchen_living,tvroom_living,patio_living,pool_living,barbecue_living,image_living,id_typehouse FROM Living_place";
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

                if($columna === 'id_living') continue;
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