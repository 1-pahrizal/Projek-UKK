<?php
include 'koneksi.php';

class oop {

    function simpan($koneksi, $table, array $field, $redirect) {
        $sql = "INSERT INTO $table SET ";
        foreach ($field as $key => $value) {
            $sql.=" $key = '$value',";
        }
        $sql = rtrim($sql, ',');
        $query = mysqli_query(@$koneksi, $sql);
        if ($query) {
            echo "<script>alert('Success');document.location.href='$redirect'</script>";
        } else {
            echo error_log($query);
        }
    }

    function tampil($koneksi, $table) {
        $sql = "SELECT * FROM $table";
        $query = mysqli_query($koneksi, $sql);
        while ($data = mysqli_fetch_array($query))
            $isi[] = $data;
        return @$isi;
    }

    function hapus($koneksi, $table, $where, $redirect) {
        $sql = "DELETE FROM $table WHERE $where";
        $query = mysqli_query($koneksi, $sql);
        if ($query) {
            echo "<script>alert('Success');document.location.href='$redirect'</script>";
        } else {
            echo $sql;
        }
    }

    function edit($koneksi, $table, $where) {
        $sql = "SELECT * FROM $table WHERE $where";
        $query = mysqli_query($koneksi, $sql);
        $data = mysqli_fetch_array($query);
        return $data;
    }

    function ubah($koneksi, $table, array $field, $where, $redirect) {
        $sql = "UPDATE $table SET";
        foreach ($field as $key => $value) {
            $sql.=" $key = '$value',";
        }
        $sql = rtrim($sql, ',');
        $sql.="WHERE $where";
        $query = mysqli_query($koneksi, $sql);
        if ($query) {
            echo "<script>alert('Success');document.location.href='$redirect'</script>";
        } else {
             echo $sql;
        }
    }

    function upload($foto, $folder) {
        $tmp = $foto['tmp_name'];
        $namafile = $foto['name'];
        move_uploaded_file($tmp, "$folder/$namafile");
        return $namafile;
    }
    function login($koneksi, $table, $username, $password, $redirect) {
        @session_start();
        $sql = "SELECT * FROM $table WHERE username = '$username' and password = '$password'";
        $query = mysqli_query($koneksi, $sql);
        $tampil = mysqli_fetch_assoc($query);
        $cek = mysqli_num_rows($query);
        if ($cek > 0) {
            $_SESSION['username'] = $username;
            echo "<script>alert('Login Berhasil');document.location.href='$redirect'</script>";
        } else {
            echo "<script>alert('Login gagal cek username dan password !!');</script>";
        }
    }

    function cari($keyword) {
        $query = "SELECT * FROM pembuktian WHERE hari LIKE '%$keyword%' OR tanggal LIKE '%$keyword%'";
        return query($query);
    }
}
?>