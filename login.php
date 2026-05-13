<?php
// Oturumu başlatıyoruz
session_start();

// Sadece form doldurularak bu sayfaya gelinmişse çalış
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // HTML formundan gelen bilgileri al ve güvenli hale getir
    $kullanici_adi = htmlspecialchars(trim($_POST['kullaniciadi']));
    $sifre = htmlspecialchars(trim($_POST['password']));

    // SİSTEME KAYITLI DOĞRU BİLGİLER
    $dogru_kullanici = "b251210098";
    $dogru_sifre = "sima123";

    // Bilgiler doğru mu diye kontrol ediyoruz
    if ($kullanici_adi === $dogru_kullanici && $sifre === $dogru_sifre) {
        
        // Giriş başarılıysa bir "Oturum Bileti" oluştur
        $_SESSION['oturum_acik'] = true;
        $_SESSION['kullanici'] = $kullanici_adi;

        // Onaylandı. Hemen Hakkımda sayfasına yönlendir
        header("Location: hakkimda.html");
        exit();

    } else {
        // Hatalı giriş! İndex sayfasına "?hata=1" koduyla geri fırlat
        header("Location: index.html?hata=1");
        exit();
    }

} else {
    // Biri linke tıklayıp doğrudan login.php'ye girmeye çalışırsa kapıdan çevir
    header("Location: index.html");
    exit();
}
?>