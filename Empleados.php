<?php


class Empleados{

    //Coneexion 

    private $conn;
    private $tablename = "empleados";

    public $identidad;
    public $nombres;
    public $apellidos;
    public $fechanac;
    public $sexo;
    public $estadocivil;
    public $pais;


    // Construuctor de Clase
    
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Crear empleado
        public function createEmpleado(){
            $sqlQuery = "INSERT INTO
                        ". $this->tablename ."
                    SET
                    identidad = :identidad, 
                    nombres = :nombres, 
                    apellidos = :apellidos, 
                    fechanac = :fechanac,
                    sexo = :sexo,
                    estadocivil = :estadocivil,
                    pais = :pais"; 
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->identidad=htmlspecialchars(strip_tags($this->identidad));
            $this->nombres=htmlspecialchars(strip_tags($this->nombres));
            $this->apellidos=htmlspecialchars(strip_tags($this->apellidos));
            $this->fechanac=htmlspecialchars(strip_tags($this->fechanac));
            $this->sexo=htmlspecialchars(strip_tags($this->sexo));
            $this->estadocivil=htmlspecialchars(strip_tags($this->estadocivil));
            $this->pais=htmlspecialchars(strip_tags($this->pais));
          
        
            // bind data
            $stmt->bindParam(":identidad", $this->identidad);
            $stmt->bindParam(":nombres", $this->nombres);
            $stmt->bindParam(":apellidos", $this->apellidos);
            $stmt->bindParam(":fechanac", $this->fechanac);
            $stmt->bindParam(":sexo", $this->sexo);
            $stmt->bindParam(":estadocivil", $this->estadocivil);
            $stmt->bindParam(":pais", $this->pais);
           
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
}

?> 