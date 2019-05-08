<?php
//DATABASE
//1. EKSTENSI MYSQL
//2. EKSTENSI MYSQLi
//3. PDO (PHP DATA OBJECT)

//INI ADALAH FILE MODULAR AGAR PROGRAM LEBIH OPTIMAL
//BAGIAN INI ADALAH KHUSUS FUNCTION UNTUK KONEKSI DAN QUERY DATABASE

//DISINI MENGGUNAKAN EKSTENSI MYSQLi
//1. KONEKSI KE DATABASE (MENGGUNAKAN XAMPP PASSWORD DIKOSONGKAN)
$host = "localhost";
$username_mysql = "root";
$password = "";
$nama_db = "phpdasar";
$koneksi = mysqli_connect($host, $username_mysql, $password, $nama_db);

//2. BUAT FUNCTION UNTUK QUERY
//UNTUK CRUD (CREATE READ UPDATE DELETE)

//3. AMBIL DATA MAHASISWA YANG SUDAH DI REQUEST DARI $hasil, ADA 4 CARA
//mysqli_fetch_assoc();
//MENGEMBALIKAN ARRAY ASOSIATIF

//mysqli_fetch_row();
//MENGEMBALIKAN ARRAY NUMERIK

//mysqli_fetch_array();
//MENGEMBALIKAN ARRAY NUMERIK DAN ARRAY ASOSIATIF (KEDUANYA)

//mysqli_fetch_object();
//MENGEMBALIKAN OBJEK

//READ
//DISINI MENGGUNAKAN ASSOC
function query($query){
    //LAKUKAN QUERY (PERMINTAAN) DATA KE ATAU DARI TABEL DATABASE (DISINI TABEL MAHASISWA)
    global $koneksi;
    $hasil = mysqli_query($koneksi, $query);
    $kotak = [];
    while( $isi = mysqli_fetch_assoc($hasil)){
        $kotak[] = $isi;
    }

    return $kotak;
}


//REGIS

function regis($data){
    global $koneksi;

    //AMBIL DATA DARI INPUTAN
    $username = strtolower(stripslashes(htmlspecialchars($data["username"])));
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $konfirm = mysqli_real_escape_string($koneksi, $data["konfirm"]);


    //PERIKSA USERNAME, MENGHINDARI DUPLIKASI
    $cek = "SELECT username FROM user WHERE username = '$username'";
    $hasil = mysqli_query($koneksi, $cek);
    if(mysqli_fetch_assoc($hasil)){
        echo "
            <script>
                alert('USERNAME YANG DIINPUT SUDAH TERDAFTAR');
                document.location.href='../halaman/regis.php';
            </script>
        ";

        return false;
    }

    //PERIKSA KONFIRMASI PASSWORD
    if($password !== $konfirm){
        echo "
            <script>
                alert('PASSWORD DENGAN KONFIRMASI PASSWORD TIDAK SAMA');
                document.location.href='../halaman/regis.php';
            </script>
        ";

        return false;
    }

    //ENKRIPSI PASSWORD
    //GUNAKAN PASSWORD HASH, JANGAN GUNAKAN MD5 KARENA TIDAK AMAN (DAPAT DI DEKRIP DENGAN MUDAH)
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    //LAKUKAN QUERY
    $query = "INSERT INTO user VALUES ('', '$username', '$password')";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

//CREATE (INSERT)

function tambah($data){
    global $koneksi;
    //AMBIL DATA DARI INPUTAN
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    //UPLOAD GAMBAR
    //1. UPLOAD GAMBAR DENGAN FUNGSI UPLOAD()
    $gambar = upload();

    //2. PERIKSA APAKAH GAMBAR BERHASIL DI UPLOAD
    if(!$gambar){
        return false;
    }

    //LAKUKAN QUERY INSERT DATA
    $query = "INSERT INTO mahasiswa
            VALUES ('', '$nama', '$nim', '$alamat', '$jurusan', '$gambar')";
    
    //JALANKAN QUERYs
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


//UPLOAD FILE
function upload(){
    //AMBIL NAMA FILE
    $namaFile = $_FILES["gambar"]["name"];

    //AMBIL UKURAN FILE
    $ukuranFile = $_FILES["gambar"]["size"];

    //ERROR
    $erorr = $_FILES["gambar"]["error"];

    //AMBIL TEMPAT PENYIMPANAN SEMENTARA
    $tmp = $_FILES["gambar"]["tmp_name"];

    //PERIKSA GAMBAR DIUPLOAD ATAU TIDAK
    if($erorr === 4){
        echo "
            <script>
                alert('UPLOAD GAMBAR TERLEBIH DAHULU');
            </script>
        ";
        return false;
    }

    //PERIKSA APA YANG DI UPLOAD
    //AMBIL EKSTENSI GAMBAR
    $ekstensiValid = ["jpg", "jpeg", "png"];
    //PECAH ANTARA EKSTENSI DENGAN NAMA FILE DAN LAKUKAN VALIDASI 
    $ekstensiGambar = explode(".", $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    //PERIKSA 
    if(!in_array($ekstensiGambar, $ekstensiValid)){
        echo "
            <script>
                alert('UPLOAD TIDAK VALID, WAJIB UPLOAD GAMBAR');
            </script>
        ";
        return false;
    }

    //PERIKSA UKURAN
    if($ukuranFIle > 5000000){
        echo "
            <script>
                alert('UKURAN GAMBAR TIDAK BOLEH LEBIHD ARI 5 MB');
            </script>
        ";
        return false;
    }

    //PINDAHKAN GAMBAR LOKASI PENYIMPANAN
    //GENERATE NAMA GAMBAR BARU AGAR TIDAK ADA DUPLIKASI GAMBAR
    $namaFileBaru = uniqid();
    $namaFileBaru .= ".";
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmp, "../img/" . $namaFileBaru);

    return $namaFileBaru;

}

//DELETE 

function hapus($id){
    global $koneksi;

    //LAKUKAN QUERY INSERT DATA
    $query = "DELETE FROM mahasiswa WHERE id = $id";
    
    //JALANKAN QUERY
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

//UPDATE
function ubah($data){
    global $koneksi;
    
    //AMBIL DATA DARI INPUTAN
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    //UPLOAD GAMBAR
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    //PERIKSA GAMBAR DI UPDATE ATAU TIDAK
    if($_FILES["gambar"]["error"] === 4){
        $gambar = $gambarLama;
    }else{
        $gambar = upload();
    }

    //LAKUKAN QUERY INSERT DATA
    $query = "UPDATE mahasiswa SET
                nama = '$nama',
                nim = '$nim',
                alamat = '$alamat',
                jurusan = '$jurusan',
                gambar = '$gambar'
            WHERE id = $id";
    
    //JALANKAN QUERYs
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

//SEARCHING (READ)
function cari($keyword){
    global $koneksi;

    //LAKUKAN QUERY PENCARIAN
    $query = "SELECT * FROM mahasiswa WHERE 
                nama LIKE '%$keyword%' OR
                nim LIKE '%$keyword%' OR
                alamat LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%'";

    return query($query);
}
?>