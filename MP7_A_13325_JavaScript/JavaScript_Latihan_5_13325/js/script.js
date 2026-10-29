function fn_ValForm() {
    var sNama = document.getElementById("nama").value;
    var sEmail = document.getElementById("email").value;
    var sUmur = document.getElementById("umur").value;
    var sLomba = document.getElementById("kategori").value;

    var sMsg = "";

    if (sNama == "") {
        sMsg += "Nama tidak boleh kosong\n";
    }

    if (sEmail == "") {
        sMsg += "Email tidak boleh kosong\n";
    }

    if (sUmur == "") {
        sMsg += "Umur tidak boleh kosong\n";
    }

    if (sLomba == "") {
        sMsg += "Pilihan lomba harus dipilih\n";
    }

    var polaEmail = /^[a-z0-9][a-z0-9_\.-]{0,}[a-z0-9]@[a-z0-9][a-z0-9_\.-]{0,}[a-z0-9][\.][a-z0-9]{2,4}$/;

    if (sEmail != "" && !polaEmail.test(sEmail)) {
        sMsg += "Format email tidak valid\n";
    }

    if (sUmur != "") {
        if (isNaN(sUmur) || sUmur < 10 || sUmur > 18) {
            sMsg += "Umur harus berupa angka antara 10-18 tahun\n";
        }
    }

    if (sMsg != "") {
        alert("Peringatan:\n" + sMsg);
        return false;
    } else {
        var sInfo;

        if (sUmur <= 14) {
            sInfo = "Kategori Junior";
        } else {
            sInfo = "Kategori Senior";
        }

        var sPilihan;
        
        switch (sLomba) {
            case "C":
                sPilihan = "Cerdas Cermat";
                break;

            case "P":
                sPilihan = "Puisi";
                break;

            case "D":
                sPilihan = "Design Poster";
                break;

            default:
                alert("Pilihan lomba tidak valid");
                return false;
        }

        alert("Terima kasih " + sNama + " ! Anda terdaftar di lomba " + sPilihan + " (" + sInfo + ").");
        return false;
    }
}