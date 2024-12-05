<?php
// Koneksi ke database
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'db_pizza';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memproses data saat form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $conn->real_escape_string($_POST['first_name']);
    $last_name = $conn->real_escape_string($_POST['last_name']);
    $message = $conn->real_escape_string($_POST['message']);

    // Query untuk menyimpan data
    $sql = "INSERT INTO feedback (first_name, last_name, message) VALUES ('$first_name', '$last_name', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
            alert('Terima kasih telah memberikan kritik dan saran');
            window.location.href = 'index.html'; // Redirect kembali ke form
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>