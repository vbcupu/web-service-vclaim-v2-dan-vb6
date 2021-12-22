# web service vclaim v2 dan vb6
 
 Web service prototype (belum selesai) untuk bridging Vclaim v2. Web service ini menggunakan slim 4 dan akan digunakan sebagai service web oleh visual basic 6.
 
 Visual basic 6 adalah bahasa pemrograman populer yang sayangnya sudah tidak diperbarui lagi. Sehingga ada masanya ada hal-hal yang tidak bisa dilakukan atau membutuhkan research yang tinggi untuk diselesaikan dengan visual basic 6. Contohnya adalah decompresi lzstring dan sha256 dnegan mode cbc dengan vi faktor seperti yang digunakan di enkripsi dan kompresi bridging vclaim v2.
 
 Penggunaan:
 <br>
 <ol>
 <li>Ubah end point di .htaccess sesuai dengan folder web service.</li> 
 <li>Masukkan parameter bridging vclaim di file util.php di bagian configvclaim:
    <ul>
     <li>$consid = "";</li>
     <li>$secretkey = "";</li>
     <li>$userkey = "";</li>
     <li>$url = "https://apijkn-dev.bpjs-kesehatan.go.id/vclaim-rest-dev";</li>
  </ul>
 </li>
 </ol>
 source utama service ada di file index.php
 bagian aplikasi:
 routing = definisi endpoint dan mengarahkan fungsi di  ke fungsi (di file index.php) yang sesuai
 index berisi fungsi-fungsi yang digunakan 
 
 
 Fitur web service vclaim v2
 
 +Decrypt response bpjs
 +Decompress respon bpjs
 +api referensi
  -Diagnosa
  -Poli
  -Fasilitas Kesehatan
  -Dokter DPJP
  -Propinsi
  -Kabupaten
  -Kecamatan
  
 Contoh aplikasi visual basic 6
 +get referensi diagnosa


Feel free to ask, semoga source kecil ini bisa bermanfaaat. 
terima kasih
 
 
