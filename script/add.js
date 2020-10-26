let btnAddWord = document.querySelectorAll(".addWord");
for (let y = 0; y < btnAddWord.length; y++) {
    let word = btnAddWord[y].id;
    btnAddWord[y].addEventListener("click", function() {
        addWord(word);
    })
}

function addWord(idX) {
    let array_id = idX.split(/([0-9]+)/);
    let listId = array_id[1].toString();
    var dutch = $("#dutch" + listId).val();
    var english = $("#english" + listId).val();
    var list_id = $("#list_id" + listId).val();

    $.ajax({
        url: 'add.php',
        method: 'POST',
        data: {
            dutch: dutch,
            english: english,
            list_id: list_id
        },
        success: function (response) {
            console.log(response);
        }
    })
}

// lijst toevoegen
let btnAddList = document.getElementById("addList");
btnAddList.onclick = function() {
    var list_name = $("#listName").val();
    $.ajax({
        url: "addList.php",
        method: "POST",
        data: {
            list_name: list_name
        },
        success: function (response) {
            console.log(response);
        }
    })
}