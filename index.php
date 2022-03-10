<?php
$alpha = str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890");
$result = "";
for ($i = 0; $i <= 4; $i++) {
    $result .= $alpha[array_rand($alpha)];
}
// var_dump(str_split($result));
// var_dump($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Captcha</title>
</head>

<body>
    <?php if (isset($_POST["kirim"])) : ?>
        <?php if (trim($_POST["captcha"]) == strtoupper(trim($_POST["captcha_verify"]))) : ?>
            <h1>Verifikasi berhasil</h1>
            <?php die(); ?>
        <?php else : ?>
            <h1>verifikasi gagal</h1>
            <?php die(); ?>
        <?php endif; ?>
    <?php endif;  ?>
    <form action="" method="post" autocomplete="off">
        <!-- ANGGAP INI GAMBAR -->
        <div class="capctha-box">
            <?php
            foreach (str_split($result) as $s) : ?>
                <?php
                $lines = rand(1, 3); //untuk line random
                ?>
                <div class="lines-<?= $lines ?> "><?= $s ?> </div>
            <?php endforeach; ?>
        </div>
        <h1>Masukkan kode captcha di atas</h1>
        <form action="" method="post">
            <input type="hidden" value="<?= $result ?>" name="captcha">
            <input type="text" name="captcha_verify">
            <button type="submit" name="kirim">Kirim</button>
        </form>
    </form>
</body>

</html>