<section class="kt" id="kt">
    <div class="container mt-5">

        <div class="card mt-2">
            <div class="card-header">Karang Taruna</div>
            <div class="card-body">
                <blockquote class="blockquote">
                    <div class="row">
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
</section>