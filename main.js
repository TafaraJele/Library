document.ready(function showBooks() {
    var str = document.getElementById("bookTitle").Value

    if (str == "") {
        setTimeout(function () { alert("Please input book title"); }, 3000)    
    }
    else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("showData").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "libraryService.php?q=" + str, true);
        xmlhttp.send();
    }

}

)
document.readyState(function submitLoanRequest() {

    var name = document.getElementById("").Value;
    var bookTitle = document.getElementById("").Value;
    var id = document.getElementById("").Value;
    var address = document.getElementById("").Value;
    var bookTitleCode = document.getElementById("").Value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
    var name = document.getElementById("").Value;
            alert("Book"+ bookTitle + "has been loaned to you" + name + "and will be delivered to address " + address );
        }
    }
    xmlhttp.open("POST", "libraryService.php?q=" + name +bookTitle + id + address + bookTitleCode, true);
    xmlhttp.send();
}


)
