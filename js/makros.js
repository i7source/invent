let btnMakrSerach = document.getElementById('btnMakrSerach');
let btnMakrUpdate = document.getElementById('btnMakrUpdate');

let makr1_name = document.getElementById('makr1-name');
let makr1_status = document.getElementById('makr1-status');
let makr1_position = document.getElementById('makr1-position');
let makr1_type = document.getElementById('makr1-type');

let makr2_name = document.getElementById('makr2-name');
let makr2_status = document.getElementById('makr2-status');
let makr2_position = document.getElementById('makr2-position');
let makr2_type = document.getElementById('makr2-type');

let makr3_name = document.getElementById('makr3-name');
let makr3_status = document.getElementById('makr3-status');
let makr3_position = document.getElementById('makr3-position');
let makr3_type = document.getElementById('makr3-type');

let makr4_name = document.getElementById('makr4-name');
let makr4_status = document.getElementById('makr4-status');
let makr4_position = document.getElementById('makr4-position');
let makr4_type = document.getElementById('makr4-type');



btnMakrSerach.onclick = function() {
    $.post(
        "core.php",
        {
            "action" : "makrSearch"

        }, function(data){
            data = JSON.parse(data);
            for (let key in data){
                makr1_name.value = data[key].makr1name
                makr1_status.value = data[key].makr1status
                makr1_position.value = data[key].makr1position
                makr1_type.value = data[key].makr1type
                
                makr2_name.value = data[key].makr2name
                makr2_status.value = data[key].makr2status
                makr2_position.value = data[key].makr2position
                makr2_type.value = data[key].makr2type
                
                makr3_name.value = data[key].makr3name
                makr3_status.value = data[key].makr3status
                makr3_position.value = data[key].makr3position
                makr3_type.value = data[key].makr3type
                
                makr4_name.value = data[key].makr4name
                makr4_status.value = data[key].makr4status
                makr4_position.value = data[key].makr4position
                makr4_type.value = data[key].makr4type

            }
        });  
}

btnMakrUpdate.onclick = function() {
    $.post(
        "core.php",
        {
            "action" : "makrUpdate",
            "makr1name" : makr1_name.value.trim(),
            "makr1status" : makr1_status.value.trim(),
            "makr1position" : makr1_position.value.trim(),
            "makr1type" : makr1_type.value.trim(),
            
            "makr2name" : makr2_name.value.trim(),
            "makr2status" : makr2_status.value.trim(),
            "makr2position" : makr2_position.value.trim(),
            "makr2type" : makr2_type.value.trim(),

            "makr3name" : makr3_name.value.trim(),
            "makr3status" : makr3_status.value.trim(),
            "makr3position" : makr3_position.value.trim(),
            "makr3type" : makr3_type.value.trim(),

            "makr4name" : makr4_name.value.trim(),
            "makr4status" : makr4_status.value.trim(),
            "makr4position" : makr4_position.value.trim(),
            "makr4type" : makr4_type.value.trim(),




        }, function(data){
            alert(data);            

        });  
}