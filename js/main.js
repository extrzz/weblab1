/*


*/

let xCord = document.querySelector("#x-textinput");
let yCord = document.querySelector("#y-textinput");



function onlyOne(checkbox) {
    let checkboxes = document.getElementsByName('R_value')
    checkboxes.forEach((item) => {
        if (item !== checkbox) item.checked = false
    })
}
function isNumber(str){
    let num = parseFloat(str.replace(',', '.'));
    return !isNaN(num) && isFinite(num);
}
function validateField(coordinate, min, max){
    if(coordinate.value){
        coordinate.value = coordinate.value.replace(',', '.');
        if (coordinate.value <= min || coordinate.value >= max || !isNumber(coordinate.value)){
            alert("Input correct number");
            return false;
        } else {
            return true;
        }
    }
    return false;
}

function validateAll(){
    return validateField(xCord, -5 , 3) && validateField(yCord, -5, 5);
}
$(document).ready(function(){
    $.ajax({
        url: 'load.php',
        method: "POST",
        dataType: "html",
        success: function(data){
            $("#result_table>tbody").html(data);
        },
    })
})
$("#form").on("submit", function(event){
    event.preventDefault();
    if(!validateAll()) { return;}
    $.ajax({
        url: 'main.php',
        method: "POST",
        data: $(this).serialize() + "&timezone=" + new Date().getTimezoneOffset(),
        dataType: "html",
        success: function (data) {
            $(".button").attr("disabled", false);
            $("#result_table>tbody").html(data);
            },
        })
});
$(".reset_button").on("click",function(){
    $.ajax({
        url: 'clear.php',
        method: "POST",
        dataType: "html",
        success: function(data){
            $("#result_table>tbody").html(data);
        },
    })
});