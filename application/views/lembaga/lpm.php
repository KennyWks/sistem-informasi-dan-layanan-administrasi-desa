<section class="lpm" id="lpm">
    <div class="container mt-5">

        <div class="card mt-2">
            <div class="card-header">Lembaga Pemberdayaan Masyarakat (LPM)</div>
            <div class="row">
                <div class="card-body">
                    <blockquote class="blockquote">
                        <div class="card-deck">
                            <?php foreach ($rows as $row) : ?>
                                <div class="col-md-4">
                                    <div class="card mt-3 text-center">
                                        <i class="fas fa-user-tie fa-4x"></i>
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $row['nama']; ?></h5>
                                        </div>
                                        <div class="card-footer">
                                            <small class="text-muted"><?= $row['jabatan']; ?></small>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </blockquote>
                </div>
                <footer></footer>
            </div>
        </div>

    </div>
</section>