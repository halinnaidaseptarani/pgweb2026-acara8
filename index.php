<?php
// 1. Setting Koneksi ke Database
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "acara 8 latihan pgweb";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2. Query Ambil Data
$sql = "SELECT * FROM penduduk";
$result = $conn->query($sql);

// Tombol/Link menuju Form Input Data Baru
echo "<a href='input/index.html'>Input Data Baru</a><br><br>";

// 3. Menampilkan Data ke Tabel
if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Kecamatan</th><th>Longitude</th><th>Latitude</th><th>Luas</th><th>Jumlah Penduduk</th></tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["kecamatan"] . "</td>
                <td>" . $row["longitude"] . "</td>
                <td>" . $row["latitude"] . "</td>
                <td>" . $row["luas"] . "</td>
                <td>" . $row["jumlah_penduduk"] . "</td>
                </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>