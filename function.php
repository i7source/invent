<?php
$servername = "localhost";
$username = "lock";
$password = "yjrlfeybd";
$dbname = "invent";
$table = "table_invent";


function connect(){
    $conn = mysqli_connect("localhost", "lock", "yjrlfeybd", "i7source_invent");
    $conn->set_charset("utf8");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}


function set() {
        $conn = connect();
       
        $name = $_POST["name"];
        $type = $_POST["type"];
        $serialNumber = $_POST["serialNumber"];
        $inventNumber = $_POST["inventNumber"];
        $status = $_POST["status"];
        $room = $_POST["room"];
        $position = $_POST["position"];
        $mol =  $_POST["mol"];

        $sqlProt1 = "SELECT inventNumber FROM `table_invent` WHERE inventNumber = '$inventNumber'";
        //$sqlProt2 = "SELECT serialNumber FROM `table_invent` WHERE serialNumber = '$serialNumber'";

        $result1 = $conn->query($sqlProt1);
        //$result2 = $conn->query($sqlProt2);
        //узнаем сколько строк нашел запрос
        $row_cnt1 = $result1->num_rows;
        //$row_cnt2 = $result2->num_rows;


        if($name == ""){
            echo "Введите наименование";
            return false;
        }
        if($inventNumber == ""){
            echo "Введите инвентарный номер";
            return false;
        }
        if(strlen($inventNumber) < 10 || strlen($inventNumber) > 10  ) {
            echo "Длина инвентарного номера не корректна!(10 сим-в)";
            return false;
        }   
        if( $row_cnt1 > 0 ) {
            echo " Такой инвентарный номер уже используется";
            return false;
        }else {
            //echo "Записываем в базу";
            if($name != "" && $inventNumber != "") {
                $sql = "INSERT INTO table_invent (`name`, `type`,`serialNumber`,`inventNumber`, `status`, `room`, `position`, `mol`) VALUES ('{$name}','$type','$serialNumber','$inventNumber','$status','$room','$position','$mol')";
                $result = mysqli_query($conn, $sql);
                echo "Успешно";
            }else {
                    echo "Поля: -> Наименование и Серийный номер -> не корректны";
                }
            mysqli_close($conn);
        }
}
    




//функция поиска в бд 
function search() {

    $sql = "SELECT * FROM table_invent WHERE testtest = 'testtest'";

    $search_2 = array(


        "id" => $_POST['queryId'],
        "name" => $_POST['queryName'],
        "type" => $_POST['queryType'],
        "serialNumber" => $_POST['querySerialNumber'],
        "inventNumber" => $_POST['queryInventNumber'],
        "status" => $_POST['queryStatus'],
        "room" => $_POST['queryRoom'],
        "position" => $_POST['queryPosition'],
        "mol" => $_POST['queryMol']
    );

    //формируем запрос в sql 
    foreach ($search_2 as $key => $value) {
        if($value != ""){
            $sql .= " and ". $key . " = " . "'". $value . "'" ;
        }
    }


    //echo $sql;
    //mysqli_close($conn);
    
    $conn = connect();
    $out = array();
    $result = $conn->query($sql);
    while($row = mysqli_fetch_array($result)){
        $out[]  =  $row;
    }
    echo json_encode($out);
    mysqli_close($conn);
}

function get() {
    $sId = $_POST['sId'];

    $sql = "SELECT * FROM table_invent WHERE id = '$sId'";

    $conn = connect();
    $out = array();
    $result = $conn->query($sql);
    while($row = mysqli_fetch_array($result)){
        $out[]  =  $row;
    }
    
    echo json_encode($out);
    mysqli_close($conn);
}

function change() {

        $conn = connect();


        $name = $_POST["name"];
        $type = $_POST["type"];
        $serialNumber = $_POST["serialNumber"];
        $inventNumber = $_POST["inventNumber"];
        $status = $_POST["status"];
        $room = $_POST["room"];
        $position = $_POST["position"];
        $mol =  $_POST["mol"];
        $idChange = $_POST['idChange'];

        //$sqlProt1 = "SELECT inventNumber FROM `table_invent` WHERE inventNumber = '$inventNumber'";

        $result1 = $conn->query($sqlProt1);
        $row_cnt1 = $result1->num_rows;


        if($idChange == ""){
            echo "Выберите элемент таблицы для редактирования!";
            return false;
        }

        if(strlen($inventNumber) < 10 || strlen($inventNumber) > 10  ) {
            echo "Длина инвентарного номера не корректна!(10 сим-в)";
            return false;
        }   

        if($inventNumber == ""){
            echo "Введите инвентарный номер";
            return false;
        }
        if($name == ""){
            echo "Введите наименование";
            return false;
        }
        
/*
        if( $row_cnt1 > 0 ) {
            echo " Такой инвентарный номер уже используется";
            return false;
        }else 
        */

        $query ="UPDATE table_invent SET name='$name', type='$type', inventNumber ='$inventNumber', serialNumber='$serialNumber', status = '$status', room = '$room', position= '$position',mol= '$mol' WHERE id='$idChange'";

        $result = mysqli_query($conn, $query);
        
        echo "Успешное редактирование!";
         
        mysqli_close($conn);

}





