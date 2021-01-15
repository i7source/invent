$(document).ready(function () {
    var trigger = $('.hamburger'),
    overlay = $('.overlay'),
    isClosed = false;
   
    trigger.click(function () {
        hamburger_cross(); 
    });
   
    function hamburger_cross() {
   
    if (isClosed == true) { 
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
    } else { 
            overlay.show();
            trigger.removeClass('is-closed');
            trigger.addClass('is-open');
            isClosed = true;
        }
    }
    
    $('[data-toggle="offcanvas"]').click(function () {
    $('#wrapper').toggleClass('toggled');
    }); 
   });

   let registration = document.getElementById('registration');
   let out_panel = document.getElementById('out_panel');
   let log = document.getElementById('log');
   let makros = document.getElementById('makros');
   
   $('#registration').click(function(){
       $('.menu1').slideToggle();
   })


    $('#log').click(function(){
        $('.menu2').slideToggle();
    })

    $('#makros').click(function(){
        $('.menu3').slideToggle();
    })

//добавление нового пользователя
let regName = document.getElementById('regName1');    
let regPass = document.getElementById('regPass1');    
let btnReg = document.getElementById('btnReg');  
let typeRadio = document.getElementsByName('typeRadio');

let valueRadio = 0;

//проходим по radio
btnReg.onclick = function() {
    for (var i=0;i<typeRadio.length; i++) {
        if (typeRadio[i].checked) { 
            valueRadio = typeRadio[i].value;
        }
    }

    $.post(
    "core.php",
    {
        "action" : "reg",
        "regName" : regName.value.trim(),
        "regPass" : regPass.value.trim(),
        "valueRadio" : valueRadio,
    }, function(data){
        
         delCount();


        if(data == 'Пользователь создан!'){
            regName.value = '';
            regPass.value = '';
        }
        userTable();
        alert(data);

    });  
    
} 

//удаляет элементы при повторном поиске
function delCount() {
    var el = document.querySelectorAll('.cont2');  

    for (let i=0; i<el.length; i++) {

        if(el[i] != '') {

            el[i].parentNode.removeChild(el[i]);
        }
    }
}


let menu2 = document.querySelector('.menu2');

//построение таблицы пользователей
function userTable() {
    $.post(
        "core.php",
        {
            "action" : "userTable"
        }, function(data){
            data = JSON.parse(data);
            for (let key in data){
    
                var tbody = document.getElementById("userTable").getElementsByTagName("TBODY")[0];
                var row = document.createElement("TR");

                row.setAttribute(`class`,`cont2`);
    
                var td1 = document.createElement("TD");
                td1.appendChild(document.createTextNode(data[key].id));
    
                var td2 = document.createElement("TD");
                td2.appendChild(document.createTextNode(data[key].name));
    
                var td3 = document.createElement("TD");
                td3.appendChild(document.createTextNode(data[key].type));
    
                var td4 = document.createElement("TD");
                td4.appendChild(document.createTextNode(data[key].date));
    
                var td5 = document.createElement("TD");
                td5.appendChild(document.createTextNode(data[key].nameCreate));
    
              
                row.appendChild(td1);
    
                row.appendChild(td2);
    
                row.appendChild(td3);
    
                row.appendChild(td4);
    
                row.appendChild(td5);
    
                tbody.appendChild(row);
    
            }
        });  
}
userTable();



let delName = document.getElementById('delName');
let btnDel = document.getElementById('btnDel');

//удаление пользователя
btnDel.onclick = function() {
    delCount();

    $.post(
        "core.php",
        {
            "action" : "del",
            "delName" : delName.value.trim(),
        }, function(data){
            delCount();
    
        if(data == 'Пользователь удален!'){
            delName.value = '';
        }
        userTable();
        alert(data);
    });  
}

let btn_panel_exit = document.getElementById('btn_panel_exit');

btn_panel_exit.onclick = function() {
    document.location.href = 'http://lockwebserv.vipcg.ru/invent/';
}