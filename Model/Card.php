<div class="col-12 col-md-4 col-lg-3">
    <div class="card">
        <img src="<?= $image ?>" class="card-img-top my-ratio" alt="<?= $title ?>">
        <div class="card-body">
            <?php if(isset($error) && $error) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error; ?>
                </div>
            <?php } ?>

            <h5 class="card-title">
                <?= $title ?>
            </h5>
            <p class="card-text">
                <?= $content ?>
            </p>
            <div class="">
                <div>
                    <span> vote:
                        <?php echo $custom ?>
                    </span>
                </div>
                <div>
                    genre:
                    <?php foreach($genre as $item) {
                        echo $item.', ';
                    } ?>
                </div>
                <div>
                    <?= $custom2 ?>
                </div>

                <div>Price:
                    <?= ' $ '.$price ?>
                </div>
                <?php if(isset($discount) && $discount) { ?>
                    <div>
                        <?php
                        echo "Discount :$discount %"
                            ?>

                    </div>
                <?php } ?>
                <div>Quantity:
                    <?= $quantity ?>
                </div>

            </div>

        </div>
    </div>
</div>