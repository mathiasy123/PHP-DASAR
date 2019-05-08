//AMBIL ELEMEN YANG DIBUTUHKAN UNTUK LIVE SEARCH

$(document).ready(function () {

    //CARI UPLOAD FILE
    $(document).ready(function () {
        $('input[type="file"]').change(function (e) {
            var fileName = e.target.files[0].name;
            alert('FILE "' + fileName + '" DIPILIH');
        });
    });

    //HILANGKAN TOMBOL CARI
    $("#tombol-cari").hide();

    //BERIKAN EVENT (RESPON DARI USER)
    $("#keyword").on("keyup", function () {
        $(".loader").show();

        $.get("ajax/mahasiswa.php?keyword=" + $("#keyword").val(), function (data) {
            $("#tabel-data").html(data);
            $(".loader").hide();
        });
    });
});