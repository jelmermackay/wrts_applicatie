let btn = document.querySelectorAll(".updateBtn");
for (let x = 0; x < btn.length; x++) {
    let id = btn[x].id;
    btn[x].addEventListener("click", function(){
        myFunction(id);
    });
    
}

function myFunction(idX) {
    let array_id = idX.split(/([0-9]+)/);
    let gegevens_id = array_id[1].toString();
    var dutch = $("#mod" + gegevens_id).val();
    var english = $("#ctgr" + gegevens_id).val();
    var word_id = $("#gegevens_id" + gegevens_id).val();

    $.ajax({
        url: 'edit.php',
        method: 'POST',
        data: {
            dutch: dutch,
            english: english,
            word_id: word_id,
        },
        success: function (response) {
            console.log(response);
        }
    }
)
}