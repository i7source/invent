<form>
<div id="addBase" class="container">
    <div class="row">

  <div class="col-lg-6">
    <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Наименование</span>
        </div>
        <input id="name" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
    </div> 
  </div>

  <div class="col-lg-6">
  <div class="input-group input-group-sm mb-3">
      <div class="input-group-prepend">
        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Тип</button>
        <div class="dropdown-menu">
          <a class="dropdown-item type-item" href="#"></a>
          <a class="dropdown-item type-item" href="#">Монитор</a>
          <a class="dropdown-item type-item" href="#">Сканер</a>
          <a class="dropdown-item type-item" href="#">Принтер</a>
          <a class="dropdown-item type-item" href="#">МФУ</a>
          <a class="dropdown-item type-item" href="#">Компьютер</a>
          <a class="dropdown-item type-item" href="#">IP телефон</a>
          <a class="dropdown-item type-item" href="#">Бытовая техника</a>
          <a class="dropdown-item type-item" href="#">Коммутатор</a>
          <a class="dropdown-item type-item" href="#">Телевизор</a>
          <a class="dropdown-item type-item" href="#">Лабораторное оборудование</a>
          <a class="dropdown-item type-item" href="#">Ноутбук</a>
          <a class="dropdown-item type-item" href="#">UPS</a>
          <a class="dropdown-item type-item" href="#">Кассета для бумаги</a>
          <a class="dropdown-item type-item" href="#">Web камера</a>
          <a class="dropdown-item type-item" href="#">Сотовой телефон</a>
          <a class="dropdown-item type-item" href="#">DVD привод</a>
          
        </div>
      </div>
      <input id="type" type="text" class="form-control" aria-label="Text input with dropdown button">
    </div>
  </div>

      <div class="col-lg-6">
          <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Инвентарный номер</span>
              </div>
              <input id="inventNumber" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
          </div> 
      </div>
      
  <div class="col-lg-6">
      <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm">Серийный номер</span>
          </div>
          <input id="serialNumber" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
      </div> 
  </div>
      

      
  

  <div class="col-lg-6">
    <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Статус</button>
              <div class="dropdown-menu">
                <a class="dropdown-item status-item" href="#"></a>
                <a class="dropdown-item status-item" href="#">Эксплуатация</a>
                <a class="dropdown-item status-item" href="#">Запас</a>
                <a class="dropdown-item status-item" href="#">Списано</a>
                <a class="dropdown-item status-item" href="#">Дефект</a>
              </div>
            </div>
            <input id="status" type="text" class="form-control" aria-label="Text input with dropdown button">
          </div>
    </div>

            

  <div class="col-lg-6">
    <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Кабинет</span>
        </div>
        <input id="room" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
    </div> 
  </div>
                

  <div class="col-lg-6">
    <div class="input-group input-group-sm mb-3">
      <div class="input-group-prepend">
        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Подразделение</button>
        <div class="dropdown-menu">
          <a class="dropdown-item position-item" href="#">ОП Герцена</a>
          <a class="dropdown-item position-item" href="#">ОП Кондратенко</a>
          <a class="dropdown-item position-item" href="#">ОП Одесская</a>
          <a class="dropdown-item position-item" href="#">ОП Кубанская Набережная</a>
          <a class="dropdown-item position-item" href="#">ОП им. Героя Яцкова И.В.</a>
          <a class="dropdown-item position-item" href="#">ОП Кожевенная</a>
          <a class="dropdown-item position-item" href="#">Бухгалтерия</a>
          <a class="dropdown-item position-item" href="#">Гаражная</a>
          <a class="dropdown-item position-item" href="#">МРТ Гаражная</a>
          <a class="dropdown-item position-item" href="#">Сормовская</a>
          <a class="dropdown-item position-item" href="#">ОП Сочи</a>
          
          
        </div>
      </div>
      <input id="position" type="text" class="form-control" aria-label="Text input with dropdown button">
    </div>
  </div>
          

  <div class="col-lg-6">  
    <div class="input-group input-group-sm mb-3">
      <div class="input-group-prepend">
        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">М.О.Л</button>
        <div class="dropdown-menu">
          <a class="dropdown-item mol-item" href="#">Капирулин Сергей Михайлович</a>
          <a class="dropdown-item mol-item" href="#">Кузнецова Наталья Александровна</a>
          <a class="dropdown-item mol-item" href="#">Гайдай Владимир Васильевич</a>
          <a class="dropdown-item mol-item" href="#">Мирошина Елена Алексеевна</a>
        </div>
      </div>
      <input id="mol" type="text" class="form-control" aria-label="Text input with dropdown button">
    </div>
  </div> 
                        
  <div class="col-lg-6"><button id="send" type="button" class="btn btn-success">Создать</button></div>
  <div class="col-lg-6"><button id="changebtn" type="button" class="btn btn-warning">Изменить</button></div>
  <div class="col-lg-6"><button id="none" type="button" class="btn btn-warning">Изменить</button></div>
   <?php
      //$arrayAuth = ['2', '3', 'admin'];
      
      //функционал проверки прав на изменения полей
      $checkUser = false;
      $nameCookie = $_COOKIE['user'];

      //коннект
      function connect_auth(){
        //$conn = mysqli_connect("localhost", "root", "", "auth");
         $conn = mysqli_connect("localhost","i7source_invent", "8reihsre4hg2bdc0rt_", "i7source_invent");
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
                        
  <div class="switch_box box_1">
    <input  type="checkbox" class="switch_1 col-lg-6" id="check">
  </div>
    <?php endif; ?>
                   

    </form>
    </div>
</div> 