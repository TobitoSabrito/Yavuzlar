function goToHomePage() {
    window.location.href = "index.php";
}

function Addquestion() {
    window.location.href = "addquestion.php";
}

function Showquestions() {
    window.location.href = "showquestions.php";
}

function Editquestions() {
    window.location.href = "editquestions.php";
}

function Nextquestion() {
    window.location.reload();
}

function updateDiffid() {
    const difficulty = document.getElementById('difficulty').value;
    let diffid;

    switch (difficulty) {
        case 'KOLAY':
            diffid = 1;
            break;
        case 'ORTA':
            diffid = 2;
            break;
        case 'ZOR':
            diffid = 3;
            break;
        case 'KAZIK':
            diffid = 4;
            break;
        default:
            diffid = '';
            break;
    }

    document.getElementById('diffid').value = diffid;
}

function searchQuestions() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("questionTable");
    tr = table.getElementsByTagName("tr");

    for (i = 1; i < tr.length; i++) {
        tr[i].style.display = "none";
        tdArray = tr[i].getElementsByTagName("td");

        for (var j = 0; j < tdArray.length; j++) {
            if (tdArray[j]) {
                txtValue = tdArray[j].textContent || tdArray[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    break;
                }
            }
        }
    }
}


