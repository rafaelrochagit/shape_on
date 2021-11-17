<?php require_once 'header.php'; ?>
<?php require_once $base_view_path . 'menu/search_header.php'; ?>

<?php require_once $base_view_path . 'home/index.php'; ?>

<?php require_once $base_view_path . 'menu/menu_footer.php'; ?>
<?php require_once 'footer.php'; ?>

<script>
    addToHomescreen();
</script>

<script>
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('<?=$base?>/src/pwa/sw.js')
            .then(function() {
                console.log('service worker registered');
            })
            .catch(function() {
                console.warn('service worker failed');
            });
    }
</script>