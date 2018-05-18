<?php 


    class Conectar {

        public static function conectarBD()
        {
            $con=@mysqli_connect('localhost', 'root', '', 'erpstudioprincess');

            if(!$con)
            {
                die("imposible conectarse: ".mysqli_error($con));
                
            }
            if (@mysqli_connect_errno())
            {
                die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
            } 

            return $con;
        }

        


    }

?>