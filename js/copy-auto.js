
// создаем слушатели чекбоксов и вносим в список отмеченные авто
let checkBoxes = document.querySelectorAll("input[type='checkbox']");
let checkedAuto = new Set();

var addCheckHandler = function(checkbox){
    checkbox.addEventListener( 'change', function() {
        if(this.checked) {
            // Checkbox is checked..
            checkedAuto.add(checkbox);
        } else {
            // Checkbox is not checked..
            checkedAuto.delete(checkbox);
        }
        console.log(checkedAuto);
    });
};

for(let checkbox of checkBoxes){
    addCheckHandler(checkbox);
}

//создаем слушатель кнопки
let copyBut = document.getElementById("copy-button");
copyBut.addEventListener( "click", function() {
    // копируем авто в буфер
    let copyToClipbord = "";
    let counter = 1;
    for(let auto of checkedAuto){
        // Находим выделенный ряд
        let row = auto.parentElement.parentElement;

        //вытягиваем каждую перменную
        let carrierName = row.querySelector('.name').textContent;
        let mark = row.querySelector('.mark').textContent;
        let auto_num = row.querySelector('.auto_num').textContent;
        let trail_num = row.querySelector('.trail_num').textContent;
        let dr_surn = row.querySelector('.dr_surn').textContent;
        let dr_name = row.querySelector('.dr_name').textContent;
        let dr_fath = row.querySelector('.dr_fath').textContent;
        let tel = row.querySelector('.tel').textContent;
        let notes = row.querySelector('.notes').textContent;
        // создаем текстовку
        let text = [carrierName,mark,auto_num,trail_num,dr_surn,dr_name,dr_fath,tel,notes].join(" ");
        text = counter + ") " + text + '\n';
        //добавляем в общий лист для копирования
        copyToClipbord += text;

        counter++;
    }
    copyStringToClipboard(copyToClipbord);
});

function copyStringToClipboard (str) {
    // Create new element
    var el = document.createElement('textarea');
    // Set value (string to be copied)
    el.value = str;
    // Set non-editable to avoid focus and move outside of view
    el.setAttribute('readonly', '');
    el.style = {position: 'absolute', left: '-9999px'};
    document.body.appendChild(el);
    // Select text inside element
    el.select();
    // Copy text to clipboard
    document.execCommand('copy');
    // Remove temporary element
    document.body.removeChild(el);
}








