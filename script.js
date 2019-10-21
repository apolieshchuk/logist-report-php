
// создаем слушатели чекбоксов и вносим в список отмеченные авто
let checkBoxes = document.querySelectorAll("input[type='checkbox']");
let checkedAuto = new Set();
for(let checkbox of checkBoxes){
    checkbox.addEventListener( 'change', function() {
        if(this.checked) {
            // Checkbox is checked..
            checkedAuto.add(checkbox.id);
        } else {
            // Checkbox is not checked..
            checkedAuto.delete(checkbox.id);
        }
        console.log(checkedAuto);
    });
}



//создаем слушатель кнопки
let copyBut = document.getElementById("copy-button");
copyBut.addEventListener( "click", function() {
    // Сплитим строку, достаем ИД машин
    let autoInBuffer = new Set();
    for(let auto of checkedAuto ){
        let splittedAutoId = auto.split("-")[1];
        autoInBuffer.add(splittedAutoId);
    }

    console.log(autoInBuffer);
});




