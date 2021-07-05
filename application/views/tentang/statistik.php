<body>
    <section id="grafik" class="grafik">

        <div class="container mt-5">

            <div class="alert alert-primary info-grafik" role="alert">
                <h4 class="alert-heading">Selamat Datang!</h4>
                <hr>
                <p><b>Hallo!</b> Berikut ini kami sajikan statistik berdasarkan beberapa data yang kami kumpulkan di desa Oelatimo, anda bisa memperolehnya secara gratis dengan cara mengunduhnya dalam bentuk gambar, dokumen berformat pdf atau dicetak langsung dengan memilih menu pada sudut kiri atas grafik dibawah ini dan jika data yang anda butuhkan masih kurang, silahkan mengunjungi kantor desa Oelatimo untuk informasi selanjutnya. Terima kasih!</p>
            </div>

            <div class="card">
                <div class="card-header">
                    Penduduk
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">

                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="<?= base_url('tentang/getDataPenduduk'); ?>" allowfullscreen></iframe>
                        </div>

                        <footer></footer>
                    </blockquote>
                </div>
            </div>

            <div class="card mt-1">
                <div class="card-header">
                    Pendidikan
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">

                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="<?= base_url('tentang/getDataPendidikan'); ?>" allowfullscreen></iframe>
                        </div>

                        <footer></footer>
                    </blockquote>
                </div>
            </div>

            <div class="card mt-1">
                <div class="card-header">
                    Lahan
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">

                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="<?= base_url('tentang/getDataLahan'); ?>" allowfullscreen></iframe>
                        </div>

                        <footer></footer>
                    </blockquote>
                </div>
            </div>

            <div class="card mt-1">
                <div class="card-header">
                    Sarana & Prasarana
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">

                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="<?= base_url('tentang/getDataSaspras'); ?>" allowfullscreen></iframe>
                        </div>

                        <footer></footer>
                    </blockquote>
                </div>
            </div>

            <div class="card mt-1">
                <div class="card-header">
                    APB Desa <?= date('Y') - 1; ?>  
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">

                        <div class="row mb-2">
                            <div class="col-lg">
                                <select class="form-control pilih">
                                    <option value="A">Awal</option>
                                    <option value="P">Perubahan</optionvalue="P">
                                </select>
                            </div>
                        </div>

                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item frameAPbdes" src="<?= base_url('tentang/getDataAPBDesaA'); ?>" allowfullscreen></iframe>
                        </div>

                        <footer></footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>
</body>