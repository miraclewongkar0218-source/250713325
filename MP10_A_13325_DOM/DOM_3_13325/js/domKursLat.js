var targetNode;

function init() {
    targetNode = document.getElementById("hasil").firstChild;
    hitungKurs("idr");
}

function hitungKurs(id) {
    var inputEl = document.getElementById(id);
    var hasilUsd = parseFloat(inputEl.value) / 18246;
    targetNode.data = hasilUsd.toFixed(2);

    var li = document.createElement("li");
    var catatan = document.createTextNode("Rp " + inputEl.value + " = US$" + hasilUsd.toFixed(2));
    li.appendChild(catatan);
    document.getElementById("riwayat").appendChild(li);
}