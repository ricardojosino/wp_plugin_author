<?php
    $profile = $data ?? false;
?>

<?php if($profile) : ?>
<div class="rj-author--profile">

    <div class="rj-author--profile-col-1">
        <div class="rj-author--profile-image" <?php if($profile['image']) : ?> style="background-image: url(<?php echo $profile['image'] ?>)" <?php endif ?> >

        </div>
    </div>

    <div class="rj-author--profile-col-2">
        <h3 class="rj-author--profile-name"><?php echo $profile['name'] ?? null ?></h3>
        <p class="rj-author--profile-description"><?php echo $profile['description'] ?? null ?></p>
    </div>

</div>
<?php endif ?>