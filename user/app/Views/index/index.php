<?php include(INCLUDESPATH . '/header.php'); ?>
<!-- Html Content Start  -->
<div class="d-flex justify-content-center m-4">
    <div class="card p-5" style="width: 18rem;">

        <div class="card-body">
            <h5 class="card-title">Index Page</h5>
            <p class="card-text">Welcome To Index Page</p>
            <a href="<?= USER_PATH ?>" class="btn btn-primary px-3">Go to User </a>
        </div>
    </div>
</div>
<div class="card">
    <h5 class="card-header">Featured</h5>
    <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-warning">Go somewhere</a>
    </div>
</div>


<?php foreach ($data as $d) {
    echo $d['data'];
} ?>
<!-- Html Content End -->
<?php include(INCLUDESPATH . '/footer.php'); ?>