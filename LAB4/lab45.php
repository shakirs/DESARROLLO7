<!DOCTYPE html>
<html lang="">
    <head>
        <title>Laboratorio 4.5</title></head>
    
    <body>
    <FORM ACTION="lab45.php" METHOD="POST">
        <br>Ingrese el tamaño de la matriz : 
        <input type="text" name="num"><br>
        <input type="submit" name= "enviar" value="Ingresar">
</FORM>
        <?php
            $i=1;
            if(array_key_exists('enviar', $_POST)){
                
                if($_REQUEST['num']!=""){
                    $m_size = $_REQUEST['num'];
                    if($m_size>1){
                        $unit =1;
                        echo "<table border=1>";
                        
                        for ($n1=1; $n1<=$m_size; $n1++)
                        {
                            echo "<tr>";
                        
                        for($n2=1;$n2<=$m_size;$n2++)
                        {   
                            if($unit==$n2){
                                echo"<td bgcolor=#bdc3d6>",1,"</td>";
                            }
                            else{
                                echo "<td>",0,"</td>";
                            }
                        }  
                        $unit = $unit +1;
                        echo "</tr>";
                        }
                        echo "</table>";
                    }
                    else{
                        echo "Ingrese un Numero mayor a 1!";
                    }
                }
            }
            ?>
  
    </body>

</html>