<?php
header("Content-Type: text/html; charset=utf-8");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Verileri formdan al (Boş gelme ihtimaline karşı varsayılan değer atadık)
    $ad = htmlspecialchars($_POST['ad'] ?? 'Belirtilmedi');
    $email = htmlspecialchars($_POST['email'] ?? 'Belirtilmedi');
    $cinsiyet = htmlspecialchars($_POST['cinsiyet'] ?? 'Belirtilmedi');
    $sehir = htmlspecialchars($_POST['sehir'] ?? 'Belirtilmedi');
    $mesaj = htmlspecialchars($_POST['mesaj'] ?? 'Belirtilmedi');
    $kurallar = isset($_POST['kurallar']) ? 'Onaylandı' : 'Onaylanmadı';
    
    // Hocanın Puan Vereceği O "Ekrana Yazdırma" Kısmı
    ?>
    <!DOCTYPE html>
    <html lang="tr">
    <head>
        <meta charset="UTF-8">
        <title>Gelen Veriler</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body { background-color: #0D1B2A; color: #E0E1DD; display: flex; align-items: center; justify-content: center; min-height: 100vh; padding: 20px;}
            .sonuc-karti { background-color: #1B263B; padding: 40px; border-radius: 20px; width: 100%; max-width: 600px; border-top: 5px solid #2A9D8F; }
        </style>
    </head>
    <body>
        <div class="sonuc-karti shadow-lg">
            <h3 class="fw-bold text-white text-center mb-4">Sunucuya Gelen Veriler (PHP POST)</h3>
            
            <table class="table table-dark table-striped table-hover rounded-3 overflow-hidden">
                <tbody>
                    <tr><th style="width: 35%;">Ad Soyad</th><td><?php echo $ad; ?></td></tr>
                    <tr><th>E-Posta</th><td><?php echo $email; ?></td></tr>
                    <tr><th>Cinsiyet</th><td><?php echo $cinsiyet; ?></td></tr>
                    <tr><th>Şehir</th><td><?php echo $sehir; ?></td></tr>
                    <tr><th>Onay Durumu</th><td class="text-success fw-bold"><?php echo $kurallar; ?></td></tr>
                    <tr><th>Mesaj</th><td><?php echo nl2br($mesaj); ?></td></tr>
                </tbody>
            </table>

            <div class="text-center mt-4">
                <a href="iletisim.html" class="btn px-4 fw-bold shadow-sm" style="background-color: #415A77; color: white; border-radius: 10px;">Geri Dön</a>
            </div>
        </div>
    </body>
    </html>
    <?php
} else {
    header("Location: iletisim.html");
    exit();
}
?>