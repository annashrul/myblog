-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2018 at 08:38 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_web2.0`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `id_user`, `slug_kategori`, `nama_kategori`) VALUES
(5, 33, 'technology', 'technology'),
(9, 33, 'agama', 'agama'),
(11, 33, 'sport', 'Sport'),
(12, 33, 'produk', 'produk'),
(13, 38, 'life-style', 'Life Style'),
(14, 38, 'pendidikan', 'pendidikan');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_sub_kategori` int(11) NOT NULL,
  `judul_post` varchar(255) NOT NULL,
  `artikel_post` text NOT NULL,
  `gambar_post` varchar(255) NOT NULL,
  `slug_artikel_post` varchar(255) NOT NULL,
  `status_post` enum('Publish','Draft') NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `waktu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id_post`, `id_user`, `id_kategori`, `id_sub_kategori`, `judul_post`, `artikel_post`, `gambar_post`, `slug_artikel_post`, `status_post`, `tanggal`, `waktu`) VALUES
(2, 38, 5, 7, 'Honor Siap Libas Xiaomi di Indonesia', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style="text-align: justify;">Vendor&nbsp;<em>smartphone</em>&nbsp;asal Tiongkok,&nbsp;Honor, sebentar lagi akan meluncurkan tiga&nbsp;<em>smartphone</em>&nbsp;terbaru yang menyasar kelas menengah&nbsp;dan premium di Indonesia. Di kampung halamannya sendiri, Honor sangat agresif. Di Tiongkok, penjualan&nbsp;<em>online</em>-nya bahkan mengalahkan Xiaomi. Menurut penelitian Sino Market Research, sepanjang tahun 2017 penjualan&nbsp;<em>online</em>Honor di Negeri Tirai Bambu tembus 54,5 juta unit dengan pendapatan 78,9 miliar yuan atau sekitar Rp 172 triliun. Sementara Xioami harus puas berada di bawahnya dengan penjualan 50,9 juta unit dengan pendapatan 63,7 miliar yuan atau sekitar Rp 139 triliun. Prestasi itu pun membuat&nbsp;Honor&nbsp;kian percaya diri dan berambisi ingin menjadi merek&nbsp;<em>smartphone</em>paling dicintai untuk anak muda dan pribadi yang berjiwa muda di pasar global, termasuk Indonesia.</p>\r\n<p style="text-align: justify;">"Dengan bisnis model internet yang unik, kami membawa model bisnis sukses di Tiongkok ke pasar global," kata George Zhao, Presiden Honor saat menghadiri ajang Consumer Electronic Show 2018 di Las Vegas beberapa waktu lalu. "Tujuan kami adalah ingin menjadi merek&nbsp;<em>smartphone</em>&nbsp;lima besar pada 2020," sambung Zhao dengan penuh percaya diri.Keberhasilan itu tak lepas dari model&nbsp;<em>smartphone</em>&nbsp;Honor yang diminati pasar, baik di Tiongkok maupun mancanegara, seperti seri Honor X.&nbsp;<em>Smartphone</em>&nbsp;Honor 4X dan Honor 7X telah terjual 40 juta unit secara global.</p>\r\n<p style="text-align: justify;">Honor 7X juga diklaim paling banyak penjualannya di Tiongkok di ajang diskon besar-besaran Single''s Day pada 11 November 2017. Di India, 20 ribu unit Honor 7X terjual hanya dalam waktu satu jam sejak penjualan dibuka. Kemudian seri&nbsp;<em>flagship&nbsp;smartphone</em>&nbsp;Honor<a title="Honor " href="http://tekno.liputan6.com/read/3045794/honor-note-9-dibekali-dua-kamera-dan-ram-6gb">&nbsp;</a>View 10 disebut memiliki pangsa pasar terbesar di Tiongkok. Adapun tiga produk Honor yang bakal diboyong ke Indonesia adalah Honor 9 Lite dan Honor 7X untuk segmen kelas menengah dan Honor View 10 sebagai&nbsp;<em>flagship smartphone</em>.</p>\r\n</body>\r\n</html>', '40136950931.jpg', 'honor-siap-libas-xiaomi-di-indonesia.html', 'Publish', '2018-03-29 14:20:24', 0),
(3, 38, 5, 7, 'Separuh Pengguna Medsos di Jerman Pertimbangkan Tutup Akun Ilustrasi media sosial', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style="text-align: justify;">Hampir separuh pengguna media sosial di Jerman telah mempertimbangkan untuk menutup akun mereka menyusul tudingan pada Facebook yang tidak memberikan perlindungan data pemilik akun. Hasil itu diperoleh berdasarkan survei terbaru dari majalah Jerman Focus, bahwa sekitar 49 persen peserta dalam survei telah memikirkan penutupan akun mereka di media sosial termasuk Facebook, Instagram, dan Twitter. Hasil survei yang dirilis pada Sabtu (24/3) lalu ini pun menunjukkan bahwa 53 persen partisipan pria dan lebih dari 44 persen untuk partisipan wanita ingin melakukan penutupan itu dikutip dari&nbsp;<em>Antara</em>.&nbsp;Sebelumnya, Facebook dituding memberikan data 50 juta penggunanya tanpa izin pada Cambridge Analytica - konsultan politik yang bekerja pada kampanye pemilihan Presiden Amerika Serikat Donald Trump pada 2016."Hapus halaman SpaceX di Facebook jika Anda jantan?" demikian cuitan seorang pengguna pada Musk.&nbsp;"Saya tidak menyadari jika kami memilikinya. Akan saya lakukan," balas Musk. Tak lama kemudian, halaman Facebook SpaceX dan Tesla, yang masing-masing memiliki 2,6 juta pengikut itu tidak lagi dapat diakses.&nbsp;Tantangan untuk Musk sendiri bermula dari cuitan pendiri WhatsApp, Brian Acton, di tagar #deletefacebook pada 21 Maret lalu. Acton mengatakan bahwa ini saatnya untuk menghapus akun di media sosial tersebut. Oleh karenanya, tagar #deletefacebook sempat ramai menjadi perbincangan setelah jaringan sosial terbesar di dunia itu mengecewakan penggunanya karena kesalahan penanganan data. Maraknya pembahasan soal facebook mengusik pemilik perusahaan roket SpaceX dan pembuat mobil listrik Tesla, Elon Musk. Dia berjanji menghapus dua laman Facebook untuk SpaceX dan Tesla setelah Ia menerima tantangan dari pengguna Twitter lainnya.</p>\r\n</body>\r\n</html>', '18f4f2fd-0a6c-4402-b89d-068a41abd2d5_169.jpg', 'separuh-pengguna-medsos-di-jerman-pertimbangkan-tutup-akun-ilustrasi-media-sosial.html', 'Publish', '2018-03-29 14:08:03', 0),
(4, 38, 11, 1, 'Febri Hariyadi Dikabarkan Dapat Tawaran Bermain Diluar Negeri', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style="text-align: justify;">Pemain Persib Bandung, Febri Haryadi, dikabarkan mendapat sejumlah tawaran bermain dari tim-tim luar negeri. Tawaran tersebut datang dari tim-tim Asia Tenggara dan juga dari Eropa. Hal tersebut dikatakan oleh Direktur PT Persib Bandung Bermartabat, Teddy Tjahjono. Menurut Teddy, pemain sayap lincah tersebut diincar oleh salah satu tim dari Perancis. "Ada klub dari Asia Tenggara dan juga klub Perancis," kata Teddy dilansir BolaSport.com dari jabar.tribunnews.com.<br />Namun, Teddy enggan menyebut nama klub Perancis yang mengincar Febri tersebut. Apabila transfer tersebut benar terjadi, petinggi Persib lainnya, Glen Sugita, mengaku siap melepas Febri jika bermain di Perancis. "Kalau saya lihat kan ujung-ujungnya balik lagi untuk kepentingan Persib, nasional, dan pemainnya sendiri," ucap Glenn Sugita. Febri sendiri memiliki kontrak jangka panjang bersama Persib, yakni sampai 2021. Lebih lanjut, Glenn menegaskan bahwa kemungkinan besar tahun ini Febri akan tetap bertahan di Persib. (Stefanus Aranditio)<br /><br /></p>\r\n</body>\r\n</html>', '4140110568.jpg', 'febri-hariyadi-dikabarkan-dapat-tawaran-bermain-diluar-negeri.html', 'Publish', '2018-03-28 18:57:03', 0),
(7, 38, 11, 1, 'persib bandung ditahan imbang ps tira', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>sdasd</p>\r\n</body>\r\n</html>', '41401105681.jpg', 'persib-bandung-ditahan-imbang-ps-tira.html', 'Publish', '2018-03-28 18:56:50', 0),
(8, 38, 12, 8, 'Cemilan Murah Meriah dan Ramah di Kunyah', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style="text-align: justify;">Jajanan berbahan dasar gula ini biasanya bisa ditemukan di depan SD-SD dengan bentuk dan warna-warnanya yang cantik. Sedangkan untuk arum manis, makanan ini seperti camilan wajib pasar malam. Anda pasti bisa menemukannya di pasar-pasar malam. Makanan turun-temurun ini telah menjadi cemilan favorit seluruh kalangan usia. Kembang gula ini adalah "pembawa kebahagiaan".<br /><br />Arum manis pertama kali diperkenalkan pada tahun 1904 oleh William Morrison dan John C. Wharton di St. Louis World''f Fair dengan nama "Fairy Floss" atau yang dalam bahasa Indonesia disebut Benang Peri. Pembuatan arum manis ini adalah dengan memasukkan gula pasir dan pewarna makanan ke dalam mesin penghancur gula. Mesin tersebut memanaskan gula dan mencairkannya, kemudian diputar melalui lubang-lubang kecil yang hasilnya dipadatkan melalui udara. Benang-benang tersebut dikumpulkan di wadah logam besar dan ditangkap dengan sepotong kayu kecil atau kertas berbentuk kerucut.<br /><br />Arum manis ini terasa manis dan lengket. Ketika dimasukkan ke dalam mulut gulanya segera mencair dan rasanya yummy! Arum manis ini akan berubah lengket dan keras jika terkena udara, jadi Anda harus segera memakannya begitu plastiknya dibuka. Serunya makan Arum manis ini kan bertambah saat Anda melihat proses pembuatannya. Warna yang biasanya banyak digemari adalah merah jambu, biru, dan ungu.<img src="https://www.google.co.id/search?q=aromanis+simping+(nenek+mellow)&amp;hl=id&amp;source=lnms&amp;tbm=isch&amp;sa=X&amp;ved=0ahUKEwiZ17W3l43aAhUCT48KHb_KA_IQ_AUICigB&amp;biw=1366&amp;bih=588#imgrc=xk43JM7P6obUIM:" alt="" /></p>\r\n<p style="text-align: justify;">Lain lagi dengan gulali. Meskipun sama-sama berbahan dasar gula, cara pembuatan kedua manisan ini berbeda. Gulali lebih mirip lolipop meskipun tentu rasanya berbeda. Gulali dibuat dari gula yang dicairkan dalam wajan, pembuatannya mirip karamel. Gula yang lengket ini diberi pewarna makanan dan kemudian dibentuk menjadi berbagai macam model yang lucu. Kerennya para penjual gulali ini bisa membuat bentuk apapun, Anda juga bisa request bentuk yang Anda inginkan.<br /><br />Kedua makanan ini sudah dinikmati sejak jaman dahulu dan masih bertahan hingga sekarang. Orang tua atau bahkan nenek-kakek Anda pasti pernah merasakan manisnya kedua jajanan ini. Bisa dikatakan manisnya memang tidak ada yang bisa menggantikan.</p>\r\n<p style="text-align: justify;">Alamat : Jln. Kebon Manggu rt 02/04 Kelurahan Padasuka Kecamatan Cimahi Tengah Kota Cimahi No 112</p>\r\n<p style="text-align: justify;">Hub : 0877-2201-3414 (WhatsApp)</p>\r\n<p style="text-align: justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;0853-2454-4191 (Handphone)</p>\r\n</body>\r\n</html>', 'IMG_9804_copy.jpg', 'cemilan-murah-meriah-dan-ramah-di-kunyah.html', 'Publish', '2018-03-28 18:56:43', 0),
(9, 38, 11, 9, 'Liem Swie King, Kudus, dan Pahlawan Bulu Tangkis Masa Depan ', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style="text-align: justify;">Dari arena bulu tangkis, pemuda itu mengalahkan lawannya satu demi satu dengan pukulan tinggi mematikan. Tekniknya khas, sang pemain melompat tinggi lalu fokus menghentakkan raket dengan keras pada&nbsp;shuttlecock. "Haccck..." Hentakan itu biasanya berakhir dengan sorak sorai dan tambahan poin. Pukulan tinggi itu kemudian dinamai &ldquo;King Smash&rdquo;&mdash;nama yang diambil dari pemain yang biasa melakukannya, Liem Swie King. Gara-gara pukulan maut itu, ia berhasil membawa pulang piala dari banyak kejuaraan nasional dan internasional. Beberapa yang fenomenal adalah saat ia tiga kali berhasil menjadi juara All England, yakni pada 1978, 1979, dan 1981. King di kurun waktu tersebut begitu bersinar. Meski demikian, segala jerih upaya tak dilalui dengan mulus-mulus saja. Dari buku yang memuat perjalanan hidupnya, "Panggil Aku King",&nbsp;kemampuan bulu tangkis yang sedemikian apik itu benar-benar diasahnya dari nol, bahkan saat usianya belum matang betul. King kecil dilatih dengan keras oleh ayahnya. Baru kemudian saat masuk usia 15 tahun, ia bergabung dengan Perkumpulan Bulu Tangkis Djarum ( PB Djarum)&mdash;klub dimana King menjadi salah satu anggota pertamanya&mdash;di kota asalnya, Kudus. "King itu tidak pernah ingin jadi nomor dua dalam hal apa pun. King sangat gigih," ujar Saiful Santoso, Ketua PB Djarum pertama. PB Djarum dan para pahlawan bulu tangkis Dari buku itu pula diceritakan bahwa&nbsp;King dan PB Djarum adalah satu kesatuan yang tak dapat dipisahkan. PB Djarum belum sebesar saat ini ketika King mulai bergabung. Bahkan, bentuknya masih sebatas komunitas karyawan pabrik. Tempat latihan khusus juga tidak ada. Lapangan yang dipakai oleh para pemain bulu tangkis itu sebenarnya adalah tempat melinting rokok. Karenanya, tempat itu hanya bisa dipakai di luar jam operasional. Kesuksesan King membuat Djarum mengukuhkan organisasinya menjadi lebih serius. Tempat yang tadinya berbasis di Kudus juga dibuat jadi lebih mapan dan profesional di Jakarta.&nbsp;&nbsp; Setelah King, muncul bintang-bintang bulu tangkis lain binaan PB Djarum. Di antaranya adalah Fung Permadie, Ivana Lie, Alan Budi Kusuma, dan Hariyanto Arbi.<br /><img src="https://asset.kompas.com/crop/37x0:722x457/750x500/data/photo/2018/03/27/1873024529.jpg" alt="" width="750" height="500" /></p>\r\n<p style="text-align: justify;"><span style="font-size: 8pt;">Audisi umum Djarum Beasiswa Bulutangkis(Dok. PB Djarum)</span><br /><br /></p>\r\n<p style="text-align: justify;"><span style="font-size: 8pt;"><span style="font-size: 10pt;">Nama-nama itu kemudian berlanjut pada benih-benih muda yang belakangan dikenal, seperti Tontowi Ahmad, Liliyana Natsir, Mohammad Ahsan, atau yang lebih muda lagi Kevin Sanjaya. Pencapaian mereka juga sama luar biasa. Tontowi, misalnya, berhasil menjadi juara sebagai pemain ganda campuran bersama Liliyana pada penyelenggaraan All England 2012. Selain itu, mereka juga menyumbang medali emas di Olimpiade Rio 2016. Tontowi dan Kevin laiknya King dahulu. Mereka bukan berasal dari kota metropolitan, tempat segala fasilitas memadai. Tontowi berasal dari desa kecil, Selandaka, Sumpiuh, Kabupaten Banyumas, Jawa Tengah. Kalau bukan karena prestasi Tontowi, mungkin nama desa itu tak sepopuler sekarang. Sama halnya dengan Kevin yang berasal dari Banyuwangi, Jawa Timur. King, Tontowi, ataupun Kevin hanyalah contoh. Di Indonesia, masih banyak benih muda yang bisa meneruskan tongkat estafet para pahlawan bulu tangkis sebelumnya.&nbsp;&nbsp; Karenanya, secara konsisten pula, PB Djarum membuka Audisi Umum Djarum Beasiswa Bulutangkis &nbsp;untuk menemukan para calon juara tak hanya di kota besar, tetapi juga desa-desa kecil. Tujuannya untuk mendukung mereka agar siap mengharumkan nama bangsa. Berpuluh-puluh tahun mendatang, nama Tontowi atau Kevin mungkin akan menjadi legenda seperti King berganti dengan nama-nama baru yang memiliki semangat dan napas sama, menjadi juara.</span><br /><br /></span></p>\r\n<p style="text-align: justify;">&nbsp;</p>\r\n</body>\r\n</html>', '201489431.JPG', 'liem-swie-king-kudus-dan-pahlawan-bulu-tangkis-masa-depan.html', 'Publish', '2018-03-28 18:56:35', 0),
(10, 38, 14, 2, 'Fakta-Fakta Menarik dari Sejarah Indonesia yang Nggak Kamu Dapatkan di Sekolah', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style="text-align: justify;">Kita pasti sudah akrab dengan sejarah Indonesia. Bahkan, zaman pra-sejarah pun ikut kita pelajari sejak duduk di bangku sekolah dasar.&nbsp;Kita diberitahu bahwa Kerajaan Kutai adalah kerajaan pertama di Indonesia dan Belanda menjajah Indonesia selama 3,5 abad (meskipun ini kemudian menuai perdebatan). Tidak lupa, ada juga kisah Keris Mpu Gandring yang digunakan untuk membunuh keturunan Ken Arok dan Tunggul Ametung.</p>\r\n<p style="text-align: justify;">Buku sejarah yang begitu tebal dan tidak ada habisnya dibahas dari sekolah dasar hingga menengah atas seakan telah merekam seluruh peristiwa bersejarah di Indonesia. Tapi, sebenarnya ada lho fakta-fakta unik dari sejarah yang nggak diajarkan&nbsp;di bangku sekolahmu. Berikut ini beberapa di antaranya:</p>\r\n<h2 style="text-align: justify;">1. Koran Pertama yang Terbit dan yang Dibredel di Indonesia adalah Koran yang Sama</h2>\r\n<p style="text-align: justify;"><img src="https://cdn-image.hipwee.com/wp-content/uploads/2014/08/bataviase-nouvelles-hikayat.321.jpg" width="527" height="395" /></p>\r\n<p style="text-align: justify;"><span style="font-size: 8pt;">Koran pertama di Indonesia via&nbsp;<a href="http://sorotnews.com/" target="new">sorotnews.com</a></span></p>\r\n<p style="text-align: justify;">Gubernur Jenderal Hindia Belanda&nbsp;Jan Pieterszoon Coen memerintahkan anak buahnya untuk membuat lembaran berita internal yang berisi informasi mengenai kedatangan dan keberangkatan kapal-kapal niaga. Lembaran berita tersebut ditulis tangan sebanyak 4 halaman dan diberi nama&nbsp;<em>Memorie der Nouvelles.&nbsp;</em>Ini merupakan cikal bakal koran&nbsp;<em>Bataviase Nouvelles,</em>&nbsp;yang diterbitkan pertama kali pada 7 Agustus 1744 &mdash; setelah masuknya mesin cetak ke Hindia Timur.</p>\r\n<p style="text-align: justify;"><em>Bataviase Nouvelles</em>&nbsp;merupakan koran pertama yang diterbitkan di Batavia, maupun Indonesia. Koran ini diterbitkan seminggu sekali sebanyak 4 halaman dengan&nbsp;<em>layout</em>&nbsp;dua kolom. Namun sayangnya, baru saja kontrak penerbitan diperpanjang, koran ini harus dibredel pada 20 November 1745 karena anggota Dewan Direktur VOC di Amsterdam takut akan banyak rahasia VOC yang terbongkar ke publik.</p>\r\n<h2 style="text-align: justify;">2. Marco Polo Bertemu dengan Masyarakat Kanibal di Nusantara</h2>\r\n<p style="text-align: justify;"><img src="https://cdn-image.hipwee.com/wp-content/uploads/2014/08/641130528_Seorang-Mantan-Kanibal-dari-Batak_1905.jpg" width="527" height="305" /></p>\r\n<p style="text-align: justify;"><span style="font-size: 8pt;">Mantan kanibal dari Sumatra Utara tahun 1905 via&nbsp;<a href="http://historia.co.id/" target="new">historia.co.id</a></span></p>\r\n<p style="text-align: justify;">Pada perjalanannya ke Nusantara tahun 1292, Marco Polo terkejut melihat adanya&nbsp;masyarakat yang memakan daging manusia. Kejadian ini ia temukan di pesisir Sumatra. Ketika berada di Kerajaan Dagroian (daerah Pidie, Aceh), Marco Polo melihat masyarakat setempat memakan daging kerabatnya yang sedang sakit parah dan tidak bisa disembuhkan. Di daerah tersebut, jika ada kerabat yang sakit maka akan dipanggil penyihir untuk memeriksa apakah penyakit tersebut bisa disembuhkan atau tidak. Jika tidak bisa, maka akan dipanggil orang khusus untuk membunuh kerabat yang sakit. Lalu setelah mati, dagingnya akan dimasak dan disantap bersama.</p>\r\n<h2 style="text-align: justify;">3. Bung Karno Tidak Puasa Saat Proklamasi</h2>\r\n<p style="text-align: justify;"><img src="https://cdn-image.hipwee.com/wp-content/uploads/2014/08/Indonesia_declaration_of_independence_17_August_1945-850x566.jpg" width="527" height="351" /></p>\r\n<p style="text-align: justify;">Mungkin&nbsp;kamu&nbsp;tahu bahwa hari proklamasi&nbsp;kemerdekaan RI jatuh pada bulan Ramadhan. Namun, saat itu Bung Karno<a href="http://nationalgeographic.co.id/berita/2013/07/yang-tercecer-di-balik-proklamasi" target="_blank" rel="noopener">&nbsp;</a>tidak berpuasa&nbsp;karena sedang sakit akibat gejala malaria tertiana. Ketika dibangunkan di pagi hari, Bung Karno mengeluh badannya terasa seperti meriang. Setelah disuntik dan minum obat, beliau kembali tidur dan bangun pada pukul 09.00 WIB untuk bersiap-siap memroklamirkan kemerdekaan RI pada pukul 10.00 WIB. Bayangkan betapa membaranya semangat beliau&nbsp;memproklamasikan kemerdekaan. Kamu pasti nggak menyangka &lsquo;kan kalau saat itu beliau sedang sakit?</p>\r\n</body>\r\n</html>', '61458_10202629687881032_965679450_n-720x340.jpg', 'fakta-fakta-menarik-dari-sejarah-indonesia-yang-nggak-kamu-dapatkan-di-sekolah.html', 'Publish', '2018-03-29 16:09:33', 0),
(11, 38, 13, 10, 'Atur Waktu Makan Jadi Kunci Turunkan Berat Badan', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style="text-align: justify;">Banyak yang sudah membuktikan bahwa memangkas jumlah konsumsi kalori ditambah dengan olahraga rutin bisa menurunkan berat badan dan mengecilkan lingkar pinggang. Namun, kunci menurunkan berat badan ternyata bukan melulu dengan memangkas konsumsi karbohidrat, melainkan mengatur waktu makan yang ternyata lebih efektif mencapai tujuan penurunan berat badan. Sebuah penelitian menunjukkan manfaat time-restricted feeding (TRF) atau pengaturan waktu makan yang memungkinkan seseorang makan sesuai yang diinginkan mengikuti pola waktu yang terjadwal.</p>\r\n<p style="text-align: justify;">Selain menurunkan berat badan, proses ini juga diklaim bisa menurunkan risiko diabetes. Proses yang telah terbukti membawa manfaat terhadap tikus ini diyakini juga memiliki efek serupa&nbsp;pada manusia. Biologis dari Salk Institute di San Diego, Dr Satchin Panda memulai studi TRF hampir 15 tahun yang lalu. Saat ini dia mengadopsi metode mengatur waktu makan mirip puasa dalam hidupnya, dengan sarapan pada pukul 07.00 dan makan malam pada Pukul 19.00 serta tidak mengkonsumsi makanan apapun di antara dua waktu tersebut.</p>\r\n<p style="text-align: justify;">Kepada The Washington Post, Dr Panda menyampaikan bahwa sejak ia mulai mengadopsi pola TRF, angka gula darahnya menurun drastis, berat badannya turun dan tidurnya lebih nyenyak. Dr Panda dan koleganya pada 2008 mengungkapkan bahwa berat badan tikus yang menjalani TRF menurun 28 persen dalam empat bulan. Hasil itu dianggap di luar dugaan. Eksperimen itu dilakukan berulang dan menunjukkan adanya perkembangan diabetes, penyakit jantung dan kanker.</p>\r\n<p style="text-align: justify;">Sementara itu, ilmuwan nutrisi dari University of Alabama di Birmingham, Dr Courtney Peterson juga mengadopsi TRF. Ia mengkonsumsi makanan antara Pukul 08.00 dan 14.00 lima kali seminggu, serupa dengan puasa atau diet OCD yang pernah dipopulerkan Deddy Corbuzier. "Kurasa dalam 10 tahun kita akan menemukan petunjuk jelas soal pola pengaturan makan ini. Tapi kami masih dalam tahap penelitian," kata Dr Peterson.</p>\r\n<p style="text-align: justify;">Ia menemukan manfaat dari TRF setelah pada Januari lalu meneliti 11 pasien yang kelebihan berat badan. Dr Peterson dan koleganya menemukan bahwa mereka yang makan antara Pukul 08.00 dan 14.00 cenderung tak akan terserang lapar di malam hari dan bisa menjaga nafsu makannya. Sementara yang makan dengan pola Pukul 08.00 dan 20.00 menderita kelaparan sebelum pergi tidur. Kepada Daily Mail Online, Dr Peterson menyampaikan bahwa makan tak terlalu larut berkaitan dengan sistem circadian clock atau ritme tubuh dan berdampak pada kesehatan. Banyak aspek metabolisme bekerja secara optimal di pagi hari, termasuk menjaga level gula darah dan pembakaran lemak. Meski begitu, Dr Peterson meyakini efek pola puasa tersebut akan berbeda antara manusia dan tikus, yang memiliki pola hidup nokturnal dan hanya hidup tiga tahun.<br /><br /></p>\r\n</body>\r\n</html>', '3574801979.jpg', 'atur-waktu-makan-jadi-kunci-turunkan-berat-badan.html', 'Publish', '2018-03-29 12:00:22', 0),
(12, 38, 9, 5, 'Mereka Yang Mati Kemudian Hidup Kembali: Nabi Ibrahim dan Burung ', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style="text-align: justify;">Allah SWT berfirman: Dan (ingatlah) ketika Ibrahim berkata: &ldquo;Ya Tuhanku, perlihatkanlah kepadaku bagaimana Engkau menghidupkan orang-orang mati&rdquo;. Allah berfirman: &ldquo;Belum yakinkah kamu?&rdquo; Ibrahim menjawab: &ldquo;Aku telah meyakinkannya, akan tetapi agar hatiku tetap mantap (dengan imanku) Allah berfirman: &ldquo;(Kalau demikian) ambillah empat ekor burung, lalu cincanglah semuanya olehmu. (Allah berfirman): &ldquo;Lalu letakkan diatas tiap-tiap satu bukit satu bagian dari bagian-bagian itu, kemudian panggillah mereka, niscaya mereka datang kepadamu dengan segera&rdquo;. Dan ketahuilah bahwa Allah Maha Perkasa lagi Maha Bijaksana. (QS:Al-Baqarah | Ayat: 260).</p>\r\n<p style="text-align: justify;">Dialah al-Muhyi, Yang Maha Menghidupkan. Dia kuasa menjadikan padang yang gersang menjadi rimbun. Lihatlah musim kemarau ini. Rerumputan mati. Tanah berdebu, mengering, retak. Lalu turunlah air dari langit, rumput kering itu menjadi segar. Debu-debu sirna kemudian menggumpal dan kembali memadat menjadi tanah. Retak yang terlihat tertambal, hilang dan menjadi subur. Allah ? berfirman,</p>\r\n<p style="text-align: justify;">&ldquo;Dan di antara tanda-tanda-Nya (Ialah) bahwa kau lihat bumi kering dan gersang, maka apabila Kami turunkan air di atasnya, niscaya ia bergerak dan subur. Sesungguhnya Tuhan Yang menghidupkannya, Pastilah dapat menghidupkan yang mati. Sesungguhnya Dia Maha Kuasa atas segala sesuatu.&rdquo; (QS:Fushshilat | Ayat: 39).</p>\r\n<p style="text-align: justify;">Jika hal ini Anda anggap lumrah, karena terbiasa menyaksikannya, maka Allah ? telah mengubah keyakinan hati Nabi Ibrahim menjadi haqqul yaqin, keyakinan yang derajatnya lebih tinggi. Bukan hanya hati yang meyakini, bukan juga mata yang hanya menyaksikan, tapi haqqul yaqin adalah tingkat keyakinan seseorang buah dari indera perasanya.</p>\r\n<p style="text-align: justify;">Allah ? menghidupkan empat ekor burung yang sudah disembelih, dicincang, kemudian diletakkan secara acak di puncak gunung-gunung yang berbeda.</p>\r\n<p style="text-align: justify;">Imam Ibnu Katsir meriwayatkan dari Ibnu Abbas bahwasanya setelah Nabi Ibrahim &lsquo;alaihissalam mencincang tubuh burung-burung, mengacaknya, dan melatakkannya di puncak bukit, beliau memegang kepala mereka di tangannya. Kemudian Allah ? perintahkan untuk memanggil burung-burung tersebut. Ibrahim &lsquo;alaihissalam memanggil mereka sebagaimana yang Allah ? perintahkan.</p>\r\n<p style="text-align: justify;">Keajaiban terjadi. Hal-hal yang tidak dapat dinalar manusia hanyalah perkara kecil di sisi Allah ?. Allah, Dialah Yang Maha Mengetahui yang telah terjadi, yang sedang terjadi, yang akan terjadi, dan Dia mengetahui sesuatu yang tidak mungkin terjadi bagaimana bila itu terjadi.</p>\r\n<p style="text-align: justify;">Nabi Ibrahim melihat bulu-bulu burung itu berterbangan. Berkumpul saling menyempurnakan. Kucuran darah yang telah tertumpah bertemu kembali ke kadar yang sesuai. Sobekan dan potongan-potongan daging yang telah tersayat kembali menyatu membentuk tubuh. Demikian pula tiap-tiap anggota badan burung itu, mereka kembali ke posisinya semula. Tersambung membentuk tubuh yang utuh.</p>\r\n<p style="text-align: justify;">Setelah organ-organnya mampu menopang tubuh, mereka tegak berdiri, bersegera berjalan menghampiri Ibrahim untuk mencari kepala mereka. Allah ? menjadikan penciptaan mereka lebih dari yang diharapkan Nabi Ibrahim. Agar mata beliau menyaksikan. Dan anggota tubuh lainnya ikut merasakan.</p>\r\n<p style="text-align: justify;">Burung-burung itu datang menjemput kepala mereka di tangan Nabi Ibrahim &lsquo;alaihissalam. Apabila yang mereka temui bukan kepala mereka, mereka menolaknya. Apabila mereka dapati bagian yang beliau pegang itu kepala mereka, dengan kuasa Allah ? bagian tubuh itu bersatu. Sungguh Allah ? Maha Kuasa, Perkasa, lagi Bijaksana. Oleh karena itu, Allah ? tutup ayat ini dengan kalam-Nya,</p>\r\n<p style="text-align: justify;">&ldquo;Dan ketahuilah bahwa Allah Maha Perkasa lagi Maha Bijaksana.&rdquo;</p>\r\n<p style="text-align: justify;">Dia Maha Perkasa, tidak ada yang mampu mengalahkan-Nya. Dia Maha Perkasa, tidak ada yang mampu mencega kehendak-Nya. Dan Dia Maha Bijaksana dalam firman dan tindakan-Nya.</p>\r\n<p style="text-align: justify;"><strong>Penutup</strong></p>\r\n<p style="text-align: justify;">Mudah-mudahan rangkaian lima kisah ini dapat melembutkan hati kita untuk semakin tunduk kepada Allah ?. Dia telah memberikan pengajaran bahwa Dia Maha Kuasa lagi memiliki kemampuan sempurna.</p>\r\n<p style="text-align: justify;">Dia mampu menghidupkan kaum yang telah mati. Menghidupkan kota hingga makmur kembali. Juga menghidupkan burung dengan cara yang luar biasa. Semoga Allah memberi taufik kepada kita semua untuk beramal bersiap menjemput hari berbangkit.</p>\r\n<p style="text-align: justify;"><strong>Pustaka:</strong><br />&ndash; http://quran.ksu.edu.sa/tafseer/katheer/sura2-aya260.html#katheer</p>\r\n</body>\r\n</html>', '9e9e5-soika-6.jpg', 'mereka-yang-mati-kemudian-hidup-kembali-nabi-ibrahim-dan-burung.html', 'Publish', '2018-03-29 12:13:33', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kategori`
--

CREATE TABLE `sub_kategori` (
  `id_sub_kategori` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `slug_sub_kategori` varchar(255) NOT NULL,
  `nama_sub_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_kategori`
--

INSERT INTO `sub_kategori` (`id_sub_kategori`, `id_kategori`, `id_user`, `slug_sub_kategori`, `nama_sub_kategori`) VALUES
(1, 11, 33, 'sepakbola', 'sepakbola'),
(2, 14, 38, 'sejarah', 'sejarah'),
(4, 11, 33, 'basket', 'basket'),
(5, 9, 33, 'sejarah-nabi', 'sejarah nabi'),
(6, 11, 33, 'basket', 'basket'),
(7, 5, 33, 'internet', 'Internet'),
(8, 12, 33, 'makanan', 'makanan'),
(9, 11, 33, 'badminton', 'badminton'),
(10, 13, 38, 'eat-good', 'eat good');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `first_name`, `last_name`, `username`, `password`, `email`) VALUES
(33, 'kevin', 'sanjaya', 'kevin sanjaya', 'fcea920f7412b5da7be0cf42b8c93759', 'kevin_sanjaya@gmail.com'),
(34, 'aqua', 'mineral', 'aqua', 'fcea920f7412b5da7be0cf42b8c93759', 'aqua@gmail.com'),
(35, 'mamah', 'yeni', 'yeni sudartini', 'fcea920f7412b5da7be0cf42b8c93759', 'yenisudartini@gmail.com'),
(37, 'annashrul ', 'yusuf', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'anashrulyusuf@gmail.com'),
(38, 'annashrul', 'yusuf', 'annashrul yusuf', 'fcea920f7412b5da7be0cf42b8c93759', 'anashrulyusuf@gmail.com'),
(39, 'dayusman', 'tardian', 'dayusman', 'c20ad4d76fe97759aa27a0c99bff6710', 'dayuss@gmail.com'),
(40, 'diki', 'fahrizal', 'diki fahrizal', 'e10adc3949ba59abbe56e057f20f883e', 'poponut@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD PRIMARY KEY (`id_sub_kategori`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  MODIFY `id_sub_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
