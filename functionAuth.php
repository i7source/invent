<?php


// $conn = mysqli_connect("localhost","i51439_invent_us", "8reihsre4hg2bdc0rt", "i51439_auth");
function connectAuth(){
    //$conn = mysqli_connect("localhost", "root", "", "auth");
    $conn = mysqli_connect("localhost","lock", "yjrlfeybd", "i7source_invent");
    $conn->set_charset("utf8");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

//куки +
function cookie() {
    setcookie('auth', 'true', time() + 7200, '/');
    setcookie('user', $_POST["authName"], time() + 7200, '/');
    //echo 'ok';
}

//Авторизация пользователя путем добавления куки
function auth () {
    
    $conn = connectAuth();

    $authName = $_POST["authName"];
    $authPass = $_POST["authPass"];
   
    $sqlAuth = "SELECT * FROM `authtable` WHERE name = '$authName' and password = '$authPass'";


    $result = $conn->query($sqlAuth);
    $row_cnt = $result->num_rows;


    if( $row_cnt > 0 ) {
        
        cookie();
        echo 'ok';

        //connectLog();
        //logi();
        $today = date("F j, Y, H:i:s");
        $sql10 = "INSERT INTO logi_table (name, time, coment) VALUES ('$authName', '$today', 'connect')";
        $conn->query($sql10);
        mysqli_close($conn);

        return false;
    }else {
        echo "Вы ввели не верный логин или пароль!";
    }
}



//Удаление куки для выхода пользователя
function exit1() {
    setcookie('auth', 'true', time() - 7200, '/');
    setcookie('user', $_POST["authName"], time() - 7200, '/');
}


///////////
// # menu # //
//добавление нового пользователя
function reg() {
    $conn = connectAuth();
    $today = date("F j, Y, H:i:s");
    $nameCreate = $_COOKIE['user'];
    $name = $_POST['regName'];
    $password = $_POST['regPass'];
    $type = $_POST['valueRadio'];


    if($name == ""){
        echo "Введите имя";
        return false;
    }
    if($password == ""){
        echo "Введите пароль";
        return false;
    }
    if($type == "0"){
        echo "Необходимо выбрать тип пользователя";
        return false;
    }

    if(strlen($name) > 10  ) {
        echo "Длина имени пользователя не корректна!(10 сим-в)";
        return false;
    }   
    //проверка на наличие пользователя в базе
    $sqlProt1 = "SELECT name FROM `authtable` WHERE name = '$name'";

        $result1 = $conn->query($sqlProt1);
        //узнаем сколько строк нашел запрос
        $row_cnt1 = $result1->num_rows;
        //$row_cnt2 = $result2->num_rows;

        if( $row_cnt1 > 0 ) {
            echo "Такой пользователь уже существует!";
            return false;
        }

    $sql = "INSERT INTO authtable (`name`, `password`, `type`, `date`, `nameCreate`) 
        VALUES ('{$name}','$password','$type','$today','$nameCreate')";


    $result = $conn->query($sql);

    //Записываем пользователя в тбл для макросов
    $sql_makro = "INSERT INTO makros (`name`, 
    `makr1name`, `makr1status`, `makr1position`, `makr1type`,
    `makr2name`, `makr2status`, `makr2position`, `makr2type`,
    `makr3name`, `makr3status`, `makr3position`, `makr3type`,
    `makr4name`, `makr4status`, `makr4position`, `makr4type`) 
    VALUES ('$name', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '')";
    $result3 = $conn->query($sql_makro);

    
    mysqli_close($conn);

    echo 'Пользователь создан!';
}


//  #  //
//Удаление
function del() {
    $conn = connectAuth();
    $delName = $_POST['delName'];
    $nameCreate = $_COOKIE['user'];
    $today = date("F j, Y, H:i:s");

    if($delName == ""){
        echo "Введите логин для удаления";
        return false;
    }

    $sqlProt2 = "SELECT name FROM `authtable` WHERE name = '$delName'";

    $result1 = $conn->query($sqlProt2);
        //узнаем сколько строк нашел запрос
        $row_cnt1 = $result1->num_rows;

        //удаляем пользователя если кол-во найденых строк больше 0
        if( $row_cnt1 > 0 ) {
            
            $sql = "DELETE FROM `authtable` WHERE `name`='$delName'";
            $result = $conn->query($sql);

            //пишем лог кто и кого удалил
            $sql_del_log = "INSERT INTO log_del (`name`, `nameDel`, `date`) VALUES ('$nameCreate', '$delName', '$today')";
            $result2 = $conn->query($sql_del_log);

            


            echo "Пользователь удален!";
        }else {
            echo 'Пользователь не найден!';

        }

        mysqli_close($conn);
}

//изменяем type (модификатор доступа)
function edit() {
    $conn = connectAuth();

    $editName = $_POST['editName'];
    $nameCreate = $_COOKIE['user'];
    $today = date("F j, Y, H:i:s");
    $editType = $_POST['editType'];

    $sql1 = "UPDATE authtable SET type='$editType' WHERE name = '$editName'";
    $result = $conn->query($sql1);

    echo 'ok';
    mysqli_close($conn);
}

function userTable() {
    $conn = connectAuth();

    $sql = "SELECT * FROM authtable";

    $out = array();
    $result = $conn->query($sql);
    while($row = mysqli_fetch_array($result)){
        $out[]  =  $row;
    }
    echo json_encode($out);
    mysqli_close($conn);
    
}

function makrSearch() {
    $conn = connectAuth();
    $nameCreate4 = $_COOKIE['user'];

    $sql4 = "SELECT * FROM `makros` WHERE name = '$nameCreate4'";

    $out4 = array();
        $result4 = $conn->query($sql4);
        while($row4 = mysqli_fetch_array($result4)){
            $out4[]  =  $row4;
        }
        echo json_encode($out4);
        mysqli_close($conn);
}


function makrUpdate() {
    $conn = connectAuth();
    $name = $_COOKIE['user'];

    $makr1name = $_POST['makr1name'];
    $makr1status = $_POST['makr1status'];
    $makr1position = $_POST['makr1position'];
    $makr1type = $_POST['makr1type'];

    $makr2name = $_POST['makr2name'];
    $makr2status = $_POST['makr2status'];
    $makr2position = $_POST['makr2position'];
    $makr2type = $_POST['makr2type'];

    $makr3name = $_POST['makr3name'];
    $makr3status = $_POST['makr3status'];
    $makr3position = $_POST['makr3position'];
    $makr3type = $_POST['makr3type'];

    $makr4name = $_POST['makr4name'];
    $makr4status = $_POST['makr4status'];
    $makr4position = $_POST['makr4position'];
    $makr4type = $_POST['makr4type'];


    $sql ="UPDATE makros SET makr1name='$makr1name', makr1status='$makr1status', makr1position='$makr1position', makr1type='$makr1type',
    makr2name='$makr2name', makr2status='$makr2status', makr2position='$makr2position',makr2type='$makr2type',
    makr3name='$makr3name', makr3status='$makr3status', makr3position='$makr3position',makr3type='$makr3type',
    makr4name='$makr4name', makr4status='$makr4status', makr4position='$makr4position',makr4type='$makr4type' 
    WHERE name = '$name'";

        $result = $conn->query($sql);
       
        echo 'Макросы изменены успешно!';
        mysqli_close($conn);
}