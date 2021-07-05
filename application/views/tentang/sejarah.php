<section class="sejarah" id="sejarah">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg mb-3">
                <div class="card">
                    <div class="card-header"><i class="fa fa-history fa-fw"></i> Sejarah</div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p class="text-left font-weight-normal">
                                Penduduk pertama desa Oelatimo berasal dari suku Timor yaitu terdiri dari sebagian penduduk Molo Selatan dan sebagian lagi dari Kefa, menetapnya penduduk tersebut di desa Oelatimo pada tahun 1910 membuat penduduk ini disebut sebagai “tuan tanah“ di wilayah fatuleu yang pada saat itu diperintah oleh Usif (raja) Ebnoni yang berkedudukan di nuataus, yang mana penduduk pertama Oelatimo hidup di wilayah kekuasaan tamukun naek Naifalo oleh Ne Kau Suan, namun karena politik adu domba yang di rancang oleh bangsa Belanda, maka pada tahun 1911 penduduk pertama Oelatimo terpecah dari pemerintahan tamukun naek naifalo, sehingga kemudian mereka terbentuk menjadi satu tamukun yaitu tamukun Oelatimo.
                            </p>
                            <p class="text-left font-weight-normal">
                                Nama desa Oelatimo berasal dari bahasa daerah uab meto yang terbentuk dari dua suku kata yaitu <b>Oel</b> berarti Air dan <b>Timo</b> berarti nama pohon yang hidup dekat mata air di daerah tersebut sehingga Oelatimo berarti Mata Air yang keluar dari Pohon Timo.
                                Letak desa Oelatimo berada di daerah pegunungan berbatasan langsung dengan wilayah tamukun naek Naifalo (Desa Nunsae), berdasarkan cerita rakyat, desa oelatimo adalah tempat tinggal penduduk pertama yang merupakan sebuah tempat yang disebut sonaf (istana).
                            </p>
                            <p class="text-left font-weight-normal">
                                Tamukun oelatimo yang di pimpin oleh Anin Olla pada tahun 1911, kemudian diganti oleh Kau Kono tahun 1912 namun digantikan lagi oleh Foan Ato pada tahun 1912 karena intervensi politik oleh pemerintah Belanda dan Inggris. pada pertengahan tahun 1927 Foan Ato di gantikan oleh Mafo Olla sampai dengn tahun 1930, lalu digantikan lagi oleh Tafin Olla dari tahun 1930 sampai dengan 1960, selama masa kepemimpinannya beliau melewati masa penjajahan sampai kemerdekaan pada tahun 1960, kemudian Tafin Olla digantikan dengan Esau Tallas sampai dengan tahun 1969, semasa kepemimpinan Tafin Olla terjadi gerakan politik dalam bangsa dan khususnya di Oelatimo pada tahun 1963 di mana ada beberapa orang masyarakat yang terllibat secara langsung dan di pimpin oleh Petrus Manune dan teman – temannya namun Pemerintah dan ABRI mengadakan gerakan pembersihan terhadap G30 S PKI sampai tahun 1967. Pada tanggal 27 september 1969 berakhirlah masa ketemukungan Oelatimo dan terbentuklah daerah baru yang digabungkan dengan desa Nunkurus dibawah pimpin oleh seorang kepala desa yakni Petrus Polin yang dipilih langsung oleh Fetor Onenama dan wakilnya Esaul Tallas pada tahun 1970, kemudian tahun 1973 beliau diganti oleh Filipus Affi yang memimpin sampai tahun 1977, pada saat itu pemerintah desa yang baru dipimpin oleh beberapa aparat dalam sebutan tamukung, pamong, Amnasit dan Barnemen sehingga pada tahun 1978 sampai dengan 1983 oelatimo di pimpin oleh bapak Benyamin Suan sebgai kepala desa, pada tahun 1984 diganti oleh Yehezkial Seik dan tahun 1994 diganti lagi oleh Alexsander Koroh.
                            </p>
                            <p class="text-left font-weight-normal">
                                Desa Oelatimo kemudian mengalami proses pemekaran kembali ke tamukun Oelatimo menjadi Desa Administratif dengan di keluarkan surat keputusan bupati nomor 13 tahun 2003, maka Desa Oelatimo resmi menjadi sebuah Desa baru yang di tetapkan pada tanggal 14 juli 2003 dan di angkat/ditunjuk Lorens Tapikab sebagai penjabat sementara di Desa Oelatimo sampai ada kepala desa definitif, kemudian pada tahun 2007 diadakan pemilihan secara langsung kepala desa dan bapak Alis Elia Metkono terpilih menjadi kepala desa yang menjabat dari tahun 2007 s/d 2013 sekaligus menjadi kepala desa pertama di desa Oelatimo. Kemudian pada masa transisi kepimimpinan Bapak Alis pada tahun 2013, maka ditunjuklah Ruben Olla sebagai Penjabat antar waktu (sembilan bulan) menunggu proses pemilihan Kepala Desa yang baru, setelah itu bapak Alis Elia Metkono kemudian terpilih kembali untuk periode yang kedua tahun 2013 – 2019.
                            </p>
                            </p>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <h5 class="card-header text-center">Sejarah Pemimpin Desa Oelatimo</h5>
            <div class="card-body">
                <div class="row">
                    <?php foreach ($rows as $row) : ?>
                        <div class="col-lg-4">
                            <div class="card">
                                <img src="<?= base_url(); ?>assets/img-kades/<?= $row['foto']; ?>" class="img-thumbnail" style="height: 200px" alt="oelatimo">
                                <div class="card-body">
                                    <h5 class="card-title text-center"><?= $row['nama']; ?></h5>
                                    <p class="card-text text-center"><?= $row['deskripsi']; ?></p>
                                </div>
                                <div class="card-footer text-center">
                                    <small class="text-muted"><?= $row['awal']; ?> - <?= $row['akhir']; ?></small>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    </div>
</section>