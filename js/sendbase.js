//type

let type = document.getElementById("type");



let typeItem = document.getElementsByClassName("type-item");



for (let i=0; i<typeItem.length; i++) {

    typeItem[i].onclick = f1;

}



function f1(){

    type.value = this.innerHTML;

}



//status

let status = document.getElementById("status");



let statusItem = document.getElementsByClassName("status-item");



for (let i=0; i<statusItem.length; i++) {

    statusItem[i].onclick = f2;

}



function f2(){

    status.value = this.innerHTML;

}



//position

let position = document.getElementById("position");



let positionItem = document.getElementsByClassName("position-item");



for (let i=0; i<positionItem.length; i++) {

    positionItem[i].onclick = f3;

}



function f3(){

    position.value = this.innerHTML;

}

//mol



let mol = document.getElementById("mol");

let molItem = document.getElementsByClassName("mol-item");



for (let i=0; i<molItem.length; i++) {

    molItem[i].onclick = f30;

}



function f30(){

    mol.value = this.innerHTML;

}











//name

let name = document.getElementById("name");

let serialNumber = document.getElementById("serialNumber");

let inventNumber = document.getElementById("inventNumber");

let room = document.getElementById("room");



let dataInvent = {};



function sendData(){

    dataInvent["name"] = name.value.trim();

    dataInvent["type"] = type.value.trim();

    dataInvent["serialNumber"] = serialNumber.value.trim();

    dataInvent["inventNumber"] = inventNumber.value.trim();

    dataInvent["status"] = status.value.trim();

    dataInvent["room"] = room.value.trim();

    dataInvent["position"] = position.value.trim();

    dataInvent["mol"] = mol.value.trim();

    //console.log(dataInvent);

   

};



let out = document.getElementById("out");

let outTable = document.getElementById("outTable");

let search = document.getElementById("search1");

let sendBtn = document.getElementById("send");



    sendBtn.onclick =  sendDataBase;

    

    

    function sendDataBase () {

        

        sendData();



        $.post(

            "core.php",

            {

            "action" : "set",

            "name" : dataInvent["name"],

            "type" : dataInvent["type"],

            "serialNumber" : dataInvent["serialNumber"],

            "inventNumber" : dataInvent["inventNumber"],

            "status" : dataInvent["status"],

            "room" : dataInvent["room"],

            "position" : dataInvent["position"],

            "mol" : dataInvent["mol"]

            },

                function(data) {

                    if(data == "Успешно"){

                       clearForm(); 

                    }

                    alert(data);

                }

            );   

    };

     



    

    