<?php
$koneksi = mysqli_connect("localhost", "proiso", "ra11-19", "demo");
if (mysqli_connect_errno()) {
    echo "koneksi gagal " . mysqli_connect_error();
}
