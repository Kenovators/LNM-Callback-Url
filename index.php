<?php
    //Enter your database server authentication information and name of the db you want to use
    $db_server = "localhost";
    $db_username = "username";
    $db_password = "password";
    $db_database = "dbName";

    $con=mysqli_connect($db_server,$db_username,$db_password,$db_database); 

    $data = json_decode(file_get_contents('php://input'));
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    // Coloumns in the table, you can chage these but they have to match up exactly with the table
    $columns = ["amount","receipt","transday","phonenumber"];
    $values = array();
    foreach ($data->Body->stkCallback->CallbackMetadata->Item as $item) {

        if ($item->Name !== "Balance") {
            $values[]=$item->Value;
        }
    }
    $col="";
    $val="";

    for ($i=0; $i <count($columns) ; $i++) { 
        $col.=$columns[$i];
        $val.="'".$values[$i]."'";

        if ($i !==(count($columns)-1)) {
            $col.=",";
            $val.=",";

        }
    }

    $transact="INSERT INTO transactions(".$col.")VALUES(".$val.")";

        $exec = mysqli_query($con,$transact);

        if($exec){
            echo "Data inserted";
        }else{
            echo "There was an error " . mysqli_error($con);
        }

        mysqli_close($con);	
?>
