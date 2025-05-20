<?php
        session_start();
        require_once '../VeriTabanı/baglan.php';
    function head_ustkisim(){
        
        echo'
        <!DOCTYPE html>
<html>
    
    <head>
        <title>Forum</title> 
        <header>
            <img class="logo" src="../Resimler/logo.png" title="logo" alt="logo">
            <div class="baslik" >Forum</div>

            <link rel="stylesheet" href="../VeriTabanı/oturum.css">
            <link rel="stylesheet" href="style.css">
        </header>
        <nav>
            <table>
                <tr>';
            }

    function kategori_bari (){
    echo'
    <td> <a href="main_index.php" class="link">Ana Sayfa</a> </td>
                    <td> 
                        <div class="dropdown">
                            <a href="#" class="link">Kategoriler</a>
                            <div class="dropdown-content">
                                <a href="muzik.php">Müzik</a>
                                <a href="eglence.php">Eğlence</a>
                                <a href="yazilim.php">Yazılım</a>
                            </div>
                        </div>
                    </td>
                    <td> <a href="magaza.php"class="link">Mağaza</a>  </td>
                    <td> <a href="gonderi.php"class="link">Gönderi</a> </td>
                    <td> <a href="k_profil.php"class="link">Profil</a> </td>
                    <td> <input class="ara" type="text" placeholder="Ara"> </td>
                </tr>
            </table>
        </nav>
    </head>
    <body>
    <div class="icerik">';
    }
    function icerik_sol (){
        echo'
        <aside> 
                <div class="pybaslik">Popüler Yazılar</div>
                <div class="yazilar"><b>Lorem ipsum dolor sit amet<br></b>consectetur adipiscing elit. Sed laoreet felis ut diam ultricies, ut posuere purus feugiat</div>
                <div class="yazilar"><b>Lorem ipsum dolor sit amet<br></b>consectetur adipiscing elit. Sed laoreet felis ut diam ultricies, ut posuere purus feugiat</div>
                <div class="yazilar"><b>Lorem ipsum dolor sit amet<br></b>consectetur adipiscing elit. Sed laoreet felis ut diam ultricies, ut posuere purus feugiat</div>
                <div class="yazilar"><b>Lorem ipsum dolor sit amet<br></b>consectetur adipiscing elit. Sed laoreet felis ut diam ultricies, ut posuere purus feugiat</div>
        </aside> 
        <article>';
    }
        
    function gonderi (){
        echo'
        <link rel="stylesheet" href="gonderi.css">
        <div class="gonderi_yazi">
                    <h3>Gönderi</h3>  
                <p>Lütfen Aşağıya Sorununuz veya Destek Almak İstediğiniz Konuyu Yazınız</p>
            <form class="gonderi_form" action="gonderi.php" method="post">
                <input type="text" class="gonderi_baslik" name="title" id="title" placeholder="Lütfen Başlığı Giriniz">
                <textarea class="textarea" name="content" id="gonderi" cols="30" rows="10"></textarea>
                <input type="submit" value="Gönder">
            </form>
        </div>
        ';
    }
    function music(){
        echo'
        <div id="Müzikler">Müzik</div>
                <div class="esybaslik">En Son Yazılanlar</div>
            <div class="yazilar"><b>Pellentesque eget eros quam.<br></b>Vestibulum scelerisque, nisl vel suscipit molestie, lectus nulla pellentesque ligula, et tempus ex quam sit amet erat. Vestibulum tristique nunc nec urna tempus tempor.</div>
            <div class="yazilar"><b>Pellentesque eget eros quam.<br></b>Vestibulum scelerisque, nisl vel suscipit molestie, lectus nulla pellentesque ligula, et tempus ex quam sit amet erat. Vestibulum tristique nunc nec urna tempus tempor.</div>
            <div class="yazilar"><b>Pellentesque eget eros quam.<br></b>Vestibulum scelerisque, nisl vel suscipit molestie, lectus nulla pellentesque ligula, et tempus ex quam sit amet erat. Vestibulum tristique nunc nec urna tempus tempor.</div>
            <div class="yazilar"><b>Pellentesque eget eros quam.<br></b>Vestibulum scelerisque, nisl vel suscipit molestie, lectus nulla pellentesque ligula, et tempus ex quam sit amet erat. Vestibulum tristique nunc nec urna tempus tempor.</div>
         ';
    }
    function k_profil(){
        if(isset($_SESSION['kullanici_adi'])) {
            $baglanti = baglan();
            $username = $_SESSION['kullanici_adi'];
            $sorgu = $baglanti->prepare("SELECT id , kullanici_adi FROM kullanicilar WHERE kullanici_adi = ?");
            $sorgu->bind_param("s", $username);
            $sorgu->execute();
            $result = $sorgu->get_result();
            $user = $result->fetch_assoc();
        echo'
        <div class="k_profil_icerik">
                <link rel="stylesheet" href="kategori_profil.css">
                <div class="k_profil_sol">
                    <div class="k_profil_baslik"><h4>Profil</h4></div>
                    <div><img class="k_profil_pp" src="../Resimler/profil.png" title="pp" alt="kullanıcı"></div>
                    <div class="k_profil_veri">
                      <div class="userID">
                    ' . $user['kullanici_adi'] . '<span style="color: gray;">#' . $user['id'] . '</span>
                </div>
                      <p class="k_profil_nitelik">Rütbe:</p>
                      <p class="k_profil_nitelik">Unvan:</p> 
                      <p class="k_profil_nitelik">Yetki:</p><br>
                      <p class="k_profil_nitelik">Sadakat Puani:</p> 
                      <p class="k_profil_nitelik">Bakiye:</p>
                      <p class="k_profil_nitelik">Arkadaşlar:</p>  
                    </div>
                </div>
            <div class="k_profil_aksiyon">
                <a href="" class="k_profil_buton yazilar1">Mesaj At</a>
                <a href="" class="k_profil_buton yazilar1">Arkadaş Ekle</a>
                <a href="" class="k_profil_buton yazilar1">Takip Et</a>
                <a href="" class="k_profil_buton yazilar1">Engelle</a>
                <a href="" class="k_profil_buton yazilar1">Bildir</a>
            </div>
            <div class="k_profil_sag"><h3>Selamlar<br></h3>
            <p>Bir islem yapmaya kalktığınızda burada gözükecek</p><br>
            <p>Bildirimler de burada gözükecek</p><br>
            </div>
        </div>
        ';

        $sorgu->close();
        $baglanti->close();
        }

        else{
            echo'<h3>Lütfen Kayıt olun veya giriş yapın</h3>
            <div class="p_oturum">
            <div class="p_oturum_giris">
                <h1>Üye Girişi</h1>
                <form action="../VeriTabanı/islem.php" method="post">
                    <input type="text" name="kullanici_adi" placeholder="Kullanıcı Adı" >
                    <input type="password" name="parola" placeholder="Şifre" >
                    <button type="submit" name="giris">Giriş Yap</button>
                </form>
            </div>
            <div class="p_oturum_kayit">
                <h1>Üye Ol</h1>
                <form action="../VeriTabanı/islem.php" method="post">
                    <input type="text" name="kullanici_adi" placeholder="Kullanıcı Adı" >
                    <input type="password" name="parola" placeholder="Şifre" >
                    <button type="submit" name="kayit">Kayıt Ol</button>
                </form>



            </div>



    </div>';
        }


    }
    function magaza(){
        echo'
        <div class="k_magaza">
                <link rel="stylesheet" href="magaza.css">
                <div class="sp_magaza">
                    <h3>Sadakat Puanı Mağazası</h3>
                    <a href="" class="sp_magaza_buton yazilar1">> A</a>
                    <a href="" class="sp_magaza_buton yazilar1">> Ürün 1</a>
                </div>
                <div class="re_magaza">
                    <h3>Mağaza</h3>
                    <a href="" class="re_magaza_buton yazilar1">> A</a>
                    <a href="" class="re_magaza_buton yazilar1">> Ürün 1</a>
                </div>
            </div>
        ';
    }


    
    function icerik_orta(){
        

$baglanti = new mysqli("localhost", "root", "", "forum");

$sorgu = "SELECT title,content FROM yazilar ORDER BY id DESC LIMIT 15";
$sonuc = $baglanti->query($sorgu);
    echo "<div class='esybaslik'>En Son Yazılanlar</div>";

if ($sonuc ->num_rows > 0) {
    while ($satir = $sonuc->fetch_assoc()) {
        echo "<div class='yazilar'>";
        echo "<a class='link' href='makale.php?title=" . urlencode($satir['title']) . "'><b>" . htmlspecialchars($satir['title']) . "</b></br>" . htmlspecialchars($satir['content']) . "</a>";

        echo "</div>";
    }
    
} 

$baglanti->close();
}
    function post(){
        echo'
        <link rel="stylesheet" href="post.css">
        <div class="post">
            <div class="post_baslik">Başlık</div>
            <div class="post_yazi">Yazı</div>
            <div class="post_yorum}';




    }
    function profil(){
        if(isset($_SESSION['kullanici_adi'])) {
            $baglanti = baglan();
            $username = $_SESSION['kullanici_adi'];
            $sorgu = $baglanti->prepare("SELECT id , kullanici_adi FROM kullanicilar WHERE kullanici_adi = ?");
            $sorgu->bind_param("s", $username);
            $sorgu->execute();
            $result = $sorgu->get_result();
            $user = $result->fetch_assoc();

        echo'
        </article>
        <div class="profil">
            <div class="logobaslik">
                <div class="prbaslik">Profil</div>    

            <img width="75px" src="../Resimler/profil.png" title="pp" alt="kullanıcı">
                <div class="userID">
                    ' . $user['kullanici_adi'] . '<span style="color: gray;">#' . $user['id'] . '</span>
                </div>
            </div>
            
            
            <div class="profilveri">
            <p>Rütbe:</p>
            <p>Unvan:</p> 
            <p>Yetki:</p><br>

            <p>Sadakat Puani:</p> 
            <p>Bakiye:</p>
            <p>Arkadaşlar:</p>
            <form action="../VeriTabanı/logout.php" method="post">
                <button type="submit" name="logout">Oturumu Kapat</button>
            </form>
            </div>
            
        </div>
</div>
    </body>';
$sorgu->close();
        $baglanti->close();
    }
    else {
        registerlogin();
    }
}
function registerlogin(){
    echo'
    </article>
    <div class="profil">
      <div class="oturum">
            <div class="oturum_giris">
                <h1>Üye Girişi</h1>
                <form action="../VeriTabanı/islem.php" method="post">
                    <input type="text" name="kullanici_adi" placeholder="Kullanıcı Adı" >
                    <input type="password" name="parola" placeholder="Şifre" >
                    <button type="submit" name="giris">Giriş Yap</button>
                </form>
            </div>
            <div class="oturum_kayit">
                <h1>Üye Ol</h1>
                <form action="../VeriTabanı/islem.php" method="post">
                    <input type="text" name="kullanici_adi" placeholder="Kullanıcı Adı" >
                    <input type="password" name="parola" placeholder="Şifre" >
                    <button type="submit" name="kayit">Kayıt Ol</button>
                </form>



            </div>



    </div>
</div>
</html>';
}

?>