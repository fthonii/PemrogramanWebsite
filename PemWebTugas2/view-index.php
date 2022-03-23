<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Peserta Rapid Test</title>
</head>
<body>
<h1><?= "Selamat Datang. " . $pesan ?></h1>
<table>
    <tr>
        <td>Email</td>
        <td>Nama</td>
        <td></td>
        <td></td>
    </tr>
    <?php foreach($daftarPeserta as $peserta) { ?>
    <tr>
        <td><?= $peserta->getEmail() ?></td>
        <td><?= $peserta->getNama() ?></td>
        <td><a href="ubah.php?email=<?= $peserta->getEmail() ?>">Ubah</a></td>
        <td>
            <form action="hapus.php" method="post">
                <input type="hidden" name="email" value="<?= $peserta->getEmail() ?>">
                <input type="submit" value="Hapus">
            </form>
        </td>
    </tr>
    <?php } ?>
</table>

<p><a href="tambah.php">Tambah Peserta</a></p>
</body>
</html>
