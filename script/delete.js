// deleten van hele lijsten
let deleteButton = document.querySelectorAll(".deleteList");
for (let y = 0; y < deleteButton.length; y++) {
    let listId = deleteButton[y].id;
    deleteButton[y].addEventListener("click", function() {
        deleteListFunction(listId);
    })
}

// deleten van woorden uit de lijst
let button = document.querySelectorAll(".deleteBtn");
for (let x = 0; x < button.length; x++) {
    let id = button[x].id;
    button[x].addEventListener("click", function(){
        deleteFunction(id);
    });
}

// deleten van lijst
function deleteListFunction(list) {
    let array_id = list.split(/([0-9]+)/);
    let list_id = array_id[1].toString();

    $.ajax({
        url: 'delete.php',
        method: 'POST',
        data: {
            list_id: list_id
        },
        success: function (response) {
            document.innerText = response;
        }
    })
}

// deleten van woorden
function deleteFunction(idX) {
    let array_id = idX.split(/([0-9]+)/);
    let word_id = array_id[1].toString();
    
    var el = document.getElementsByClassName('row' + word_id);
    $(el).remove();

    $.ajax({
        url: 'delete.php',
        method: 'POST',
        data: {
            word_id: word_id
        },
        success: function (response) {
            document.innerText = response;
        }
    })
}