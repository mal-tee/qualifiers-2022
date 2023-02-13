<?php
$mockFiles = array(
    "/" => ["content" => "welcome.php"],
    "/robots.txt" => ["content" => "robots.txt.php"],
    "/s3cur3Fl4g.html" => ["content" => "s3cur3Fl4g.php"]
);
?>
<?php if (sizeof(explode(",",$_SERVER["HTTP_X_FORWARDED_FOR"])) == 1): ?>
    <?php include '../resc/error.php'; ?>
<?php else: ?>
    <?php if (ip2long($_SERVER["REMOTE_ADDR"]) >= 2886729729 && ip2long($_SERVER["REMOTE_ADDR"]) <= 2886729982) : ?>
        <?php
        if (isset($mockFiles[$_SERVER['REQUEST_URI']])) {
            include '../resc/' . $mockFiles[$_SERVER['REQUEST_URI']]['content'];
        } else {
            include '../resc/404.php';
        }
        ?>
    <?php else : ?>
        <?php include '../resc/wrongCidr.php' ?>
    <?php endif; ?>
<?php endif; ?>