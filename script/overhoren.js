var data = [];
var word;
var punten = 0;
var array_length = data.length;
var x = 0;

window.onload = function() {
    let params = (new URL(document.location)).searchParams;
    let list_id = parseInt(params.get('listId'));
    var x = 0;
    

    // var list_id = selected;
    $.ajax({
        url: 'vragenFunction.php',
        method: 'POST',
        data: {
            list_id: list_id
        },
        success: function (response) {
            data = JSON.parse(response);
            getWord();
        }
    })
}

x = data.length;

function getWord() {
    
    if (data.length <= 0) {
        document.getElementById("dutchWord").innerHTML = "U heeft " + punten.toString() + " antwoorden goed";
        document.getElementById("translatedWord").style.display = "none";
        document.getElementById("sendWord").style.display = "none";
        setTimeout(function () {
            window.location.href = "overhoren.php";
        }, 5000);
    } else {
        word = data[array_length];
        document.getElementById("dutchWord").innerHTML = word[1];
        document.getElementById("translatedWord").value = "";
    }
}

function checkWord(e) {
    e.preventDefault();
    var translated = document.getElementById('translatedWord').value;
    if (word[2] == translated) {
        punten += 1;
        data.splice(word, 1);
        document.body.style.backgroundColor = "#b0d9b2";
        getWord();
    }
    else if (word[2] !== translated) {
        data.splice(word, 1);
        document.body.style.backgroundColor = "#d99c9c";
        getWord();
    }
}