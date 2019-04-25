
var data1 = new Array()
data1[0] = "<img class='img-thumbnail' src='images/art/tiny/116010.jpg' alt='...'>"
data1[1] = "Artist Holding a Thistle"
data1[2] = "2"
data1[3] = "$500"
data1[4] = "$1000"

var data2 = new Array()
data2[0] = "<img class='img-thumbnail' src='images/art/tiny/113010.jpg' alt='...'>"
data2[1] = "Self-portrait in a Straw Hat"
data2[2] = "1"
data2[3] = "$700"
data2[4] = "$700"

var all = new Array()
all[1] = data1
all[2] = data2

var tab=document.getElementById('lll')

function creat(Array) {
    for (var n = 1; n <= 2; n++) {
        creatTable(Array[n]);
    }
}

function creatTable(data) {

    var tableData = "<tr>"
    for (var i = 0; i < data.length; i++) {
        tableData += "<td>" + data[i] + "</td>";
    }
    tableData += "</tr>";
    tab.innerHTML+=tableData;

}


creat(all);


