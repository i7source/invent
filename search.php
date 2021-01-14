<input type="text" id="idChange">
<br>

<div  class="container masOut" id="conId">
    <div class="row">
        <div class="row">
            <button class="btn btn-outline-secondary" id="searchBtnNew" type="button">Найти</button>
            <div id="out">
            <table id="myTable" class="table table-hover table-borderless table-sm">
  <thead >
    <tr>
      <th scope="col">#</th>
      <th scope="col">
                     <p>name</p> 
                </th>
      <th scope="col">
                    <p>type</p> 
      </th>
      <th scope="col">
                    <p>inventNumber</p>       
      </th>
      <th scope="col">
                    <p>serialNumber</p>       
      </th>
      <th scope="col">
                    <p>status</p>       
      </th>
      <th scope="col">
                    <p>room</p>       
      </th>
      <th scope="col">
                    <p>position</p>       
      </th>
      <th scope="col">
                    <p>mol</p>       
      </th>
      
      
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">#</th>
      <td>  
          
          <div class="input-group sm-3">
            <div class="input-group-prepend">
            <input type="text" id="queryName"  class="myInp form-control" aria-label="Text input with dropdown button">
          </div>

        
      </td>
      <td>
        <div class="input-group sm-3">
            <div class="input-group-prepend">
              <button class="myBtn btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
              <div class="dropdown-menu">
                    <a class="dropdown-item query-type-item" href="#"></a>
                    <a class="dropdown-item query-type-item" href="#">Монитор</a>
                    <a class="dropdown-item query-type-item" href="#">Сканер</a>
                    <a class="dropdown-item query-type-item" href="#">Принтер</a>
                    <a class="dropdown-item query-type-item" href="#">МФУ</a>
                    <a class="dropdown-item query-type-item" href="#">Компьютер</a>
                    <a class="dropdown-item query-type-item" href="#">IP телефон</a>
                    <a class="dropdown-item query-type-item" href="#">Бытовая техника</a>
                    <a class="dropdown-item query-type-item" href="#">Коммутатор</a>
                    <a class="dropdown-item query-type-item" href="#">Телевизор</a>
                    <a class="dropdown-item query-type-item" href="#">Лабораторное оборудование</a>
                    <a class="dropdown-item query-type-item" href="#">Ноутбук</a>
                    <a class="dropdown-item query-type-item" href="#">UPS</a>
                    <a class="dropdown-item query-type-item" href="#">Кассета для бумаги</a>
                    <a class="dropdown-item query-type-item" href="#">WEB Камера</a>
                    <a class="dropdown-item query-type-item" href="#">Сотовый телефон</a>
                    <a class="dropdown-item query-type-item" href="#">DVD привод</a>
              </div>
            </div>
            <input type="text" id="queryType" class="form-control myInp" aria-label="Text input with dropdown button">
          </div>
    </td>
      <td><div class="input-group sm-3">
            <div class="input-group-prepend">
            <input type="text" id="queryInventNumber"  class="myInp form-control" aria-label="Text input with dropdown button">
          </div></td>
      <td><div class="input-group sm-3">
            <div class="input-group-prepend">
            <input type="text" id="querySerialNumber"  class="myInp form-control" aria-label="Text input with dropdown button">
          </div></td>
      <td>
      <div class="input-group sm-3">
            <div class="input-group-prepend">
              <button class="myBtn btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
              <div class="dropdown-menu">
                <a class="dropdown-item query-status-item" href="#"></a>
                <a class="dropdown-item query-status-item" href="#">Эксплуатация</a>
                <a class="dropdown-item query-status-item" href="#">Запас</a>
                <a class="dropdown-item query-status-item" href="#">Списано</a>
                <a class="dropdown-item query-status-item" href="#">Дефект</a>
              </div>
            </div>
            <input type="text" id="queryStatus"  class=" myInp form-control" aria-label="Text input with dropdown button">
          </div>
    </td>
      <td><div class="input-group sm-3">
            <div class="input-group-prepend">
            <input type="text" id="queryRoom"  class="myInp form-control" aria-label="Text input with dropdown button">
          </div></td>
      <td>
        
      <div class="input-group sm-3">

          <div class="input-group-prepend">
              <button class="myBtn btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
              <div class="dropdown-menu">
                        <a class="dropdown-item query-position-item" href="#"></a>
                        <a class="dropdown-item query-position-item" href="#">ОП Герцена</a>
                        <a class="dropdown-item query-position-item" href="#">ОП Одесская</a>
                        <a class="dropdown-item query-position-item" href="#">ОП Кубанская Набережная</a>
                        <a class="dropdown-item query-position-item" href="#">ОП Сочи</a>
                        <a class="dropdown-item query-position-item" href="#">ОП Кондратенко</a>
              </div>
            </div>
            <input type="text" id="queryPosition" class="form-control myInp" aria-label="Text input with dropdown button">
          </div>
    </td>
      <td>
          <div class="input-group sm-3">
            <div class="input-group-prepend">
              <button class="myBtn btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
              <div class="dropdown-menu">
                <a class="dropdown-item query-mol-item" href="#"></a>
                <a class="dropdown-item query-mol-item" href="#">Капирулин Сергей Михайлович</a>
                <a class="dropdown-item query-mol-item" href="#">Кузнецова Наталья Александровна</a>
                <a class="dropdown-item query-mol-item" href="#">Гайдай Владимир Васильевич</a>
                <a class="dropdown-item query-mol-item" href="#">Мирошина Елена Алексеевна</a>
              </div>
            </div>
            <input type="text" id="queryMol"  class=" myInp form-control" aria-label="Text input with dropdown button">
          </div>
      </td>
    </tr>


  </tbody>
    </table> 
            </div>
        </div>
    </div>