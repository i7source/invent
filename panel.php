<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    
    <link rel="stylesheet" href="css/style-menu.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Admin Panel</title>
</head>
<body>

<?php 
      //$arrayAuth = ['2', '3', 'admin'];
      
      //функционал проверки прав на изменения полей
      $checkUser = false;
      $nameCookie = $_COOKIE['user'];
        
      //коннект
      function connect_auth(){
        //$conn = mysqli_connect("localhost", "root", "", "auth");
        $conn = mysqli_connect("localhost","lock", "yjrlfeybd", "i7source_invent");
        $conn->set_charset("utf8");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $conn;
    }
    //выбрать все
    $sql = "SELECT * FROM authtable WHERE name = '$nameCookie'";
    $conn = connect_auth();
    $out = array();
    $result = $conn->query($sql);
   
    //формируем массив
    while($row = mysqli_fetch_array($result)){
        $out[]  =  $row;
    }
    
    //дать доступ к изменению, тем пользователям у которого type = 3
    for($i = 0; $i < count($out); $i++){
      if($out[$i][type] == 3){
        $checkUser = true;
        break;
      }
    }
    mysqli_close($conn);


    if($checkUser == true):?>
    <div><button type="submit" id="btn_panel_exit" class="btn btn-danger"><- </button></div>
<div id="wrapper">
    <div class="overlay"></div>
 
 <!-- Sidebar -->
 <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
    <ul class="nav sidebar-nav">
        <li class="sidebar-brand"><a href="#">Admin Panel</a></li>
        <li><a href="#" id='registration'>Registration</a></li>
        <li><a href="#" id='log'>Delete and edit</a></li>
        <li><a href="#" id="makros">Makros</a></li>
        <li><a href="#">#</a></li>
        <li><a href="#">#</a></li>
        <li><a href="#">#</a></li>
        <li><a href="#">#</a></li>
        <li><a href="#">#</a></li>
    </ul>
 </nav>
 <!-- /#sidebar-wrapper -->

 <!-- Page Content -->
    <div id="page-content-wrapper">
        <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
        </button>
        <div class="menu1 container">
            <p class="zag">Регистрация нового пользователя</p>
                <div class="form-group row">
                    <label for="regName1" class="col-sm-2 col-form-label">Логин: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="regName1" placeholder="Введите логин">
                    </div>
                </div>
            <div class="form-group row">
                <label for="regPass1" class="col-sm-2 col-form-label">Пароль: </label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="regPass1" placeholder="Введите пароль">
                </div>
            </div>
                <div class="row">
                    <legend id="labelType" class="col-form-label col-sm-2 pt-0">Тип: </legend>
                    <div class="col-sm-10 p-11">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="typeRadio" id="radio1" value="1">
                            <label class="form-check-label" for="radio1">
                                  <p>I</p> 
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="typeRadio" id="radio2" value="2">
                            <label class="form-check-label" for="radio2">
                                 <p>II</p>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="typeRadio" id="radio3" value="3">
                            <label class="form-check-label" for="radio3">
                                <p>III</p>
                            </label>
                        </div>
                    </div>
                </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button id="btnReg" type="submit" class="btn btn-success">  +  </button>
                </div>
            </div>
            <hr>
        </div>
        <div class="menu2 container">
        <p class="zag">Пользователи</p>
        <table id="userTable" class="table table-hover">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">type</th>
                <th scope="col">data</th>
                <th scope="col">nameCreate</th>
                </tr>
            </thead>
            <tbody>
                <!-- Загружается циклом -->
            </tbody>
            </table>
            <div class="form-group row">
                <label for="delName" class="col-sm-2 col-form-label">Логин: </label>
                <div class="col-sm-10">
                <input type="email" class="form-control" id="delName" placeholder="Введите логин для удаления">
             </div>
             <div class="form-group row">
                <div class="col-sm-10">
                    <button id="btnDel" type="submit" class="btn btn-danger">   -   </button>
                </div>
            </div>
        </div>
    </div>
        <div class="menu3 container">
        <p class="zag">Макросы: </p>

            <button id="btnMakrSerach" class=" btn btn-primary">Загрузить</button>
            <button id="btnMakrUpdate" class=" btn btn-success">Записать</button>
            <hr>
            <div class="makro1">
                <div class="col-sm-6">
                        <p>Key Shift + 1</p>
                    <label for="makr1-name">Наименование</label><input id="makr1-name" class="form-control" type="text">
                    <label for="makr1-status">Статус</label><input class="form-control" id="makr1-status" type="text">
                    <label for="makr1-position">Подразделение</label><input class="form-control" id="makr1-position" type="text">
                    <label for="makr1-type">Тип</label><input class="form-control" id="makr1-type" type="text">
                </div>
            </div>
            
            <div class="makro2">
                <div class="col-sm-6">
                        <p>Key Shift + 2</p>
                    <label for="makr2-name">Наименование</label><input id="makr2-name" class="form-control" type="text">
                    <label for="makr2-status">Статус</label><input class="form-control" id="makr2-status" type="text">
                    <label for="makr2-position">Подразделение</label><input class="form-control" id="makr2-position" type="text">
                    <label for="makr2-type">Тип</label><input class="form-control" id="makr2-type" type="text">
                </div>
            </div>
            
            <div class="makro3">
                <div class="col-sm-6">
                    <hr><hr>
                        <p>Key Shift + 3</p>
                    <label for="makr3-name">Наименование</label><input id="makr3-name" class="form-control" type="text">
                    <label for="makr3-status">Статус</label><input class="form-control" id="makr3-status" type="text">
                    <label for="makr3-position">Подразделение</label><input class="form-control" id="makr3-position" type="text">
                    <label for="makr3-type">Тип</label><input class="form-control" id="makr3-type" type="text">
                </div>
            </div>

            <div class="makro4">
                <div class="col-sm-6">
                <hr><hr>
                        <p>Key Shift + 4</p>
                    <label for="makr4-name">Наименование</label><input id="makr4-name" class="form-control" type="text">
                    <label for="makr4-status">Статус</label><input class="form-control" id="makr4-status" type="text">
                    <label for="makr4-position">Подразделение</label><input class="form-control" id="makr4-position" type="text">
                    <label for="makr4-type">Тип</label><input class="form-control" id="makr4-type" type="text">
                </div>
            </div>

        </div>
</div>

<?php else: ?>

<h1>Error.</h1>

<?php endif; ?>  

<script src="js/menu.js"></script>
<script src="js/makros.js"></script>

</body>
</html>