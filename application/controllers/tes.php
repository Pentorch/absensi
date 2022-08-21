<style>
    .galery-table tr td{
        padding: 15px;
        text-align: center;
    }
</style>
<?php
//dalam prakteknya anda bisa ambil array dari database
// lihat contoh ambil array dari databse di komentar artikel ini
$array = array(
    'a' => array('judul' => 'image1', 'img_src' => 'image1.jpg'),
    'b' => array('judul' => 'image2', 'img_src' => 'image2.jpg'),
    'c' => array('judul' => 'image3', 'img_src' => 'image3.jpg'),
    'd' => array('judul' => 'image4', 'img_src' => 'image4.jpg'),
    'e' => array('judul' => 'image5', 'img_src' => 'image5.jpg'),
    'f' => array('judul' => 'image6', 'img_src' => 'image6.jpg'),
    'g' => array('judul' => 'image7', 'img_src' => 'image7.jpg'),
    'h' => array('judul' => 'image8', 'img_src' => 'image8.jpg'),
    'i' => array('judul' => 'image9', 'img_src' => 'image9.jpg'),
    'j' => array('judul' => 'image10', 'img_src' => 'image10.jpg'),
    'k' => array('judul' => 'image11', 'img_src' => 'image11.jpg'),
    'l' => array('judul' => 'image12', 'img_src' => 'image12.jpg')
);
 
// atur jumlah kolom yang diinginkan disini
$kolom = 4;
 
$chunks = array_chunk($array, $kolom);
echo '<table class="galery-table">';
foreach ($chunks as $chunk) {
    echo '<tr>';
    foreach ($chunk as $galery) {
        echo '<td>';
        echo '<img src="img/' . $galery['img_src'] . '" /><br>' . $galery['judul'];
        echo '</td>';
    }
    echo '</tr>';
}
echo '</table>';
?>