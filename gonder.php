<?php
// Sayfa karakter kodlamasını ayarla
header("Content-Type: text/html; charset=utf-8");

// Eğer forma POST metoduyla gelinmişse çalıştır
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Verileri formdan güvenli bir şekilde al
    $ad = htmlspecialchars(trim($_POST['ad']));
    $email = htmlspecialchars(trim($_POST['email']));
    $mesaj = htmlspecialchars(trim($_POST['mesaj']));
    
    // txt dosyasına kaydedilecek formatı hazırla
    $tarih = date("d.m.Y H:i:s");
    $kayit = "Tarih: $tarih | Gönderen: $ad | E-Posta: $email\nMesaj: $mesaj\n";
    $kayit .= "--------------------------------------------------------\n";
    
    // Veriyi txt dosyasına yaz (dosya yoksa kendi oluşturur)
    file_put_contents("iletisim_mesajlari.txt", $kayit, FILE_APPEND);
    
    // İşlem başarılıysa
    ?>
    <!DOCTYPE html>
    <html lang="tr">
    <head>
        <meta charset="UTF-8">
        <title>Mesaj İletildi</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body { background-color: #0D1B2A; color: #E0E1DD; display: flex; align-items: center; justify-content: center; height: 100vh; }
            .basari-karti { background-color: #1B263B; padding: 50px; border-radius: 20px; text-align: center; border-top: 5px solid #2A9D8F; }
        </style>
    </head>
    <body>
        <div class="basari-karti shadow-lg">
            <h1 style="color: #2A9D8F; font-size: 60px; margin-bottom: 20px;">✓</h1>
            <h3 class="fw-bold text-white">Teşekkürler, <?php echo $ad; ?>!</h3>
            <p class="text-secondary mt-3">Mesajın başarıyla kaydedildi. Sana en kısa sürede dönüş yapacağım.</p>
            <a href="iletisim.html" class="btn mt-4 px-4 fw-bold" style="background-color: #415A77; color: white; border-radius: 10px;">Geri Dön</a>
        </div>
    </body>
    </html>
    <?php

} else {
    // Form doldurulmadan bu sayfaya girilmeye çalışılırsa iletişim sayfasına geri at
    header("Location: iletisim.html");
    exit();
}
?>