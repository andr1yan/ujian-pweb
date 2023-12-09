<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<title>CRUD ANDRIYAN PRATAMA</title>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap');

body {
    background-color: #aaa69d;
    color: #c23616;
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
}

.navbar {
    border-radius: 0;
    background-color: #192a56;
    color: #ecf0f1;
    padding: 15px;
}

h4 {
    color: #6F1E51;
    font-size: 50px;
    margin-top: 20px;
    font-weight: bold;
}

table {
    margin-top: 10px;
    color: #f8c291;
    border-collapse: collapse;
    font-size: 17px;
    width: 100%;
    background-color: #BDC581;
}

td, th {
    text-align: center;
    padding: 10px;
}

th {
    background-color: #CAD3C8;
}

.table-primary, .table-primary > th, .table-primary > td {
    background-color: #CAD3C8;
    color: #2c3e50;
}

.table-danger, .table-danger > th, .table-danger > td {
    background-color: #CAD3C8;
    color: #2c3e50;
}

.btn {
    margin-right: 5px;
    background-color: #e74c3c;
    color: #ecf0f1;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
}

.btn:hover {
    background-color: #c0392b;
}
</style>
<body>
    <nav class="navbar navbar-dark bg-dark">
            <span class="navbar-brand mb-0 h1">UJIAN ANDRIYAN PRATAMA</span>
        </div>
    </nav>
<div class="container">
    <br>
    <h4><center>DATA DIRI MAHASISWA</center></h4>
<?php

    include "koneksi.php";

    if (isset($_GET['id_mahasiswa'])) {
        $id_mahasiswa=htmlspecialchars($_GET["id_mahasiswa"]);

        $sql="delete from mahasiswa where id_mahasiswa='$id_mahasiswa' ";
        $hasil=mysqli_query($kon,$sql);

            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>

     <tr class="table-danger">
            <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered">
            <tr class="table-primary">           
            <th>No</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>No Telpon</th>
            <th>Domisili</th>
            <th colspan='2'>Action</th>

        </tr>
        </thead>

        <?php
        include "koneksi.php";
        $sql="select * from mahasiswa order by id_mahasiswa desc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nama"]; ?></td>
                <td><?php echo $data["jurusan"];   ?></td>
                <td><?php echo $data["no_telp"];   ?></td>
                <td><?php echo $data["domisili"];   ?></td>
                <td>
                    <a href="update.php?id_mahasiswa=<?php echo htmlspecialchars($data['id_mahasiswa']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_mahasiswa=<?php echo $data['id_mahasiswa']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
</div>
</body>
</html>