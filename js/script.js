let searchVal = document.getElementById("search1");

$("#changebtn").prop("disabled", true);

//queryType

let queryType = document.getElementById("queryType");

let queryTypeItem = document.getElementsByClassName("query-type-item");

for (let i=0; i<queryTypeItem.length; i++) {
    queryTypeItem[i].onclick = f01;
}

function f01(){
    queryType.value = this.innerHTML;
}

//queryPosition

let queryPosition = document.getElementById("queryPosition");

let queryPositionItem = document.getElementsByClassName("query-position-item");

for (let i=0; i<queryPositionItem.length; i++) {
    queryPositionItem[i].onclick = f02;
}

function f02(){
    queryPosition.value = this.innerHTML;
}

//queryStatus

let queryStatus = document.getElementById("queryStatus");
let queryStatusItem = document.getElementsByClassName("query-status-item");

for (let i=0; i<queryStatusItem.length; i++) {
    queryStatusItem[i].onclick = f04;
}



function f04(){
    queryStatus.value = this.innerHTML;
}

//queryMol

let queryMol = document.getElementById("queryMol");

let queryMolItem = document.getElementsByClassName("query-mol-item ");

for (let i=0; i<queryMolItem.length; i++) {
    queryMolItem[i].onclick = f03;
}

function f03(){
    queryMol.value = this.innerHTML;
}

//отправка данных для запроса в базу
let queryName = document.getElementById("queryName");
let querySerialNumber = document.getElementById("querySerialNumber");
let queryInventNumber = document.getElementById("queryInventNumber");
let queryRoom = document.getElementById("queryRoom");

let dataQueryInvent = {};

function sendDataQuery(){
    dataQueryInvent["queryName"] = queryName.value.trim();
    dataQueryInvent["queryType"] = queryType.value.trim();
    dataQueryInvent["querySerialNumber"] = querySerialNumber.value.trim();
    dataQueryInvent["queryInventNumber"] = queryInventNumber.value.trim();
    dataQueryInvent["queryStatus"] = queryStatus.value.trim();
    dataQueryInvent["queryRoom"] = queryRoom.value.trim();
    dataQueryInvent["queryPosition"] = queryPosition.value.trim();
    dataQueryInvent["queryMol"] = queryMol.value.trim();
};

let searchBtn = document.getElementById("searchBtnNew");

searchBtnNew.onclick = function() {
    searchBase();
}

function searchBase() {

   sendDataQuery();
   $.post(
    "core.php",
    {
        "action" : "search",
        "queryName" : dataQueryInvent["queryName"],
        "queryType" : dataQueryInvent["queryType"],
        "querySerialNumber" : dataQueryInvent["querySerialNumber"],
        "queryInventNumber" : dataQueryInvent["queryInventNumber"],
        "queryStatus" : dataQueryInvent["queryStatus"],
        "queryRoom" : dataQueryInvent["queryRoom"],
        "queryPosition" : dataQueryInvent["queryPosition"],
        "queryMol" : dataQueryInvent["queryMol"]
    },
        function(data) {
            //alert(data);
            data = JSON.parse(data);

            //удаляет элементы при повторном поиске
            delCount();

            for (let key in data){
            
            var tbody = document.getElementById("myTable").getElementsByTagName("TBODY")[0];
            var row = document.createElement("TR");

               //добавляем класс объекту

               row.setAttribute(`class`,`cont`);

               var th1 = document.createElement("TH");

               th1.appendChild(document.createTextNode(data[key].id));

               //добавляем класс объекту

              // th1.setAttribute(`class`,`contId`);

               //присваиваем каждой строке вывода id из бд

               row.setAttribute(`id`, data[key].id);

               row.setAttribute(`onclick`, `getId(this.id);`);

               var td1 = document.createElement("TD");

               td1.appendChild(document.createTextNode(data[key].name));

               var td2 = document.createElement("TD");

               td2.appendChild (document.createTextNode(data[key].type));

               var td3 = document.createElement("TD");

               td3.appendChild(document.createTextNode(data[key].inventNumber));

               var td4 = document.createElement("TD");

               td4.appendChild (document.createTextNode(data[key].serialNumber));

               var td5 = document.createElement("TD");

               td5.appendChild(document.createTextNode(data[key].status));

               var td6 = document.createElement("TD");

               td6.appendChild (document.createTextNode(data[key].room));

               var td7 = document.createElement("TD");

               td7.appendChild(document.createTextNode(data[key].position));

               var td8 = document.createElement("TD");

               td8.appendChild (document.createTextNode(data[key].mol));

               row.appendChild(th1);

               row.appendChild(td1);

               row.appendChild(td2);

               row.appendChild(td3);

               row.appendChild(td4);

               row.appendChild(td5);

               row.appendChild(td6);

               row.appendChild(td7);

               row.appendChild(td8);

               tbody.appendChild(row);

            }
        }   
    );    
}

$(':checkbox').checkboxpicker();

let searchId = 0;
let checkChange = document.getElementById("check"); 
$('.switch_1').on('change', function() {

    if(checkChange.checked) {
        $("#changebtn").prop("disabled", false);
        searchId = 1;
    }else {
        $("#changebtn").prop("disabled", true);
        searchId = 0;
        clearForm();
    }
  });

let idChange = document.getElementById("idChange");

//let sId;
//получаем в функцию id на который кликнули в таблице
function getId(sId) {
    //alert(sId);
    idChange.value = sId;
    if (searchId == 1) {
        $.post(
            "core.php",
            {
                "action" : "get",
                "sId" : sId
            },
            function(data) {
                //console.log(data);
                data = JSON.parse(data);
                for (let key in data){
                    name.value = data[key].name;
                    type.value = data[key].type;
                    position.value = data[key].position;
                    status.value = data[key].status;
                    serialNumber.value = data[key].serialNumber;
                    inventNumber.value = data[key].inventNumber;
                    room.value = data[key].room;
                    mol.value = data[key].mol;
                }
            }
        );
    }
}


//удаляет элементы при повторном поиске
function delCount() {
    var el = document.querySelectorAll('.cont');  

    for (let i=0; i<el.length; i++) {

        if(el[i] != '') {

            el[i].parentNode.removeChild(el[i]);
        }
    }
}

//очищает форму отправки 
function clearForm() {
    name.value = "";
    type.value = "";
    serialNumber.value = "";
    inventNumber.value = "";
    position.value = "";
    room.value = "";
    status.value = "";
    mol.value = "";
}


$.post(
    "core.php",
    {
        "action" : "makrSearch"

    }, function(data){
        data = JSON.parse(data);
        for (let key in data){

        document.onkeypress = function(event) {
    

            //console.log(event);
        
            if(event.keyCode == 13){
        
                searchBase();
        
            }
            if(event.keyCode == 33){
        
                name.value = data[key].makr1name
                type.value = data[key].makr1type
                status.value = data[key].makr1status
                position.value = data[key].makr1position
            }
            if(event.keyCode == 34 || event.keyCode == 64 ){
        
                name.value = data[key].makr2name
                type.value = data[key].makr2type
                status.value = data[key].makr2status
                position.value = data[key].makr2position
            }
            if(event.keyCode == 35 || event.keyCode == 8470 ){
        
                name.value = data[key].makr3name
                type.value = data[key].makr3type
                status.value = data[key].makr3status
                position.value = data[key].makr3position
            }
            if(event.keyCode == 59 || event.keyCode == 36 ){
        
                name.value = data[key].makr4name
                type.value = data[key].makr4type
                status.value = data[key].makr4status
                position.value = data[key].makr4position
            }
        
        }

    }
        

});  




//кнопка изменить

let changebtn = document.getElementById('changebtn');

changebtn.onclick = changeData;

function changeData() {
    sendData();
    $.post(

        "core.php",
        {
        "action" : "change",
        "name" : dataInvent["name"],
        "type" : dataInvent["type"],
        "serialNumber" : dataInvent["serialNumber"],
        "inventNumber" : dataInvent["inventNumber"],
        "status" : dataInvent["status"],
        "room" : dataInvent["room"],
        "position" : dataInvent["position"],
        "mol" : dataInvent["mol"],
        "idChange" : idChange.value
        },
            function(data) {
                if(data == "Успешное редактирование!"){
                   clearForm(); 
                   searchBase();
                }
                alert(data);
            }
        );   
}



let btnExit = document.getElementById('exit')

btnExit.onclick = function() {
    exit1();
    //document.location.href = 'http://localhost/invent/';
    document.location.href = 'http://lockwebserv.vipcg.ru/invent/';


}

function exit1 () {
    $.post(

        "core.php",
        {
            "action" : "exit",
        }, function(data) {
            //document.location.href = 'http://localhost/invent/';
            document.location.href = 'http://lockwebserv.vipcg.ru/invent/';
        }
    )
}


let btn_panel = document.getElementById('btn_panel');

btn_panel.onclick = function() {
    document.location.href = 'http://lockwebserv.vipcg.ru/invent/panel.php';
}