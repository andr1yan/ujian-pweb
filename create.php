<!DOCTYPE html>
<html>
<head>
    <title>Form Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz@6..12&family=Poppins:wght@300;400&family=Rubik&display=swap');
        
    body {
        background-color: #7f8fa6;
        color: #40739e;
        font-family: 'Nunito Sans', sans-serif;
    }

    .container {
        margin-top: 50px;
        color: #686de0;
    }

    h2 {
        color: #1e272e;
        font-size: 35px;
        text-align: center;
        font-weight: bold;
    }

    form {
        background-color: #30336b;
        padding: 20px;
        border-radius: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        color: #130f40;
    }

    label {
        font-weight: bold;
        color: #686de0;
    }

    .form-control {
        margin-bottom: 15px;
        background-color: #fff;
    }

    button.btn-primary {
        background-color: #ef5777;
        border: 1px solid #ef5777;
    }

    button.btn-primary:hover {
        background-color: #ffc048;
        border: 1px solid #ffc048;
    }
    </style>

<body>
<div class="container">
    <?php

    include "koneksi.php";


    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama=input($_POST["nama"]);
        $jurusan=input($_POST["jurusan"]);
        $no_telp=input($_POST["no_telp"]);
        $domisili=input($_POST["domisili"]);


        $sql="insert into mahasiswa (nama,jurusan,no_telp,domisili) values
		('$nama','$jurusan','$no_telp','$domisili')";

        $hasil=mysqli_query($kon,$sql);

        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>INPUT DATA MAHASISWA</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama :</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required />

        </div>
       <div class="form-group">
            <label>Jurusan :</label>
            <input type="text" name="jurusan" class="form-control" placeholder="Masukan Jurusan" required/>
        </div>
                </p>
        <div class="form-group">
            <label>No Telpon :</label>
            <input type="text" name="no_telp" class="form-control" placeholder="Masukan No Telpon" required/>
        </div>
        <div class="form-group">
            <label>Domisili:</label>
            <textarea name="domisili" class="form-control" rows="5"placeholder="Masukan Domisili" required></textarea>
        </div>       

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>