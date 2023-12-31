<?php
class producto
{
    public  $Marca;
    public  $Descripcion;
    public  $Codigo;

    public static function BuscarTodas()
    {
        $con  = Database::getInstance();
        $sql = "select * from producto";
        $queryClaseAReemplazar = $con->db->prepare($sql);
        $queryClaseAReemplazar->execute();
        $queryClaseAReemplazar->setFetchMode(PDO::FETCH_CLASS, 'producto');

        $claseAReemplazarADevolver = array();

        foreach ($queryClaseAReemplazar as $m) {
            $claseAReemplazarADevolver[] = $m;
        }

        return $claseAReemplazarADevolver;
    }

    public static function Buscar($id)
    {
        $con  = Database::getInstance();
        $sql = "select * from [tablaAReemplazar] where Id = :p1";
        $queryClaseAReemplazar = $con->db->prepare($sql);
        $params = array("p1" => $id);
        $queryClaseAReemplazar->execute($params);
        $queryClaseAReemplazar->setFetchMode(PDO::FETCH_CLASS, '[ClaseAReemplazar]');
        foreach ($queryClaseAReemplazar as $m) {
            return $m;
        }
    }

    public function Agregar()
    {
        $con  = Database::getInstance();
        $sql = "insert into producto (Marca,Descripcion,Codigo) values (:p1,:p2,:p3)";
        $claseAReemplazar = $con->db->prepare($sql);
        $params = array("p1" => $this->Marca, "p2" => $this->Descripcion, "p3"=> $this->Codigo);
        $claseAReemplazar->execute($params);
    }

    public function Modificar()
    {
        $con = Database::getInstance();
        $sql = "UPDATE [tablaAReemplazar]
                    SET
                    [propiedad1] = :p1,
                    [propiedad2] = :p2
                    WHERE Id = :p3";
        $claseAReemplazar = $con->db->prepare($sql);
        $params = array("p1" => $this->propiedad1, "p2" => $this->propiedad2, "p3" => $this->Id);
        $claseAReemplazar->execute($params);
    }

    public function Eliminar()
    {
        $con = Database::getInstance();
        $sql = "DELETE FROM [tablaAReemplazar] WHERE Id = :p1";
        $claseAReemplazar = $con->db->prepare($sql);
        $params = array("p1" => $this->Id);
        $claseAReemplazar->execute($params);
    }
}
