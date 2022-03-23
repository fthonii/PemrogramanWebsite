<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Peserta Rapid Test</title>
</head>
<body>
<h1>Mengubah Data Pendaftar Rapid Test</h1>
<form action="ubah.php" method="post">
    <input type="hidden" name="email" value="<?= $peserta->getEmail() ?>">
    Email: <input type="email" name="new_email" value="<?= $peserta->getEmail() ?>"><br>
    Nama: <input type="text" name="new_nama" value="<?= $peserta->getNama() ?>"><br>
    <input type="submit" value="Ubah">
</form>
</body>
</html>
