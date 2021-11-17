<?php require_once 'header.php'; ?>
<?php require_once $base_view_path . 'menu/search_header.php'; ?>

<?php require_once $base_view_path . 'home/index.php'; ?>

<?php require_once $base_view_path . 'menu/menu_footer.php'; ?>
<?php require_once 'footer.php'; ?>

<style>
    #setup_button {
        display: none;
    }
</style>
<button id="setup_button" onclick="installApp()">Installer</button>

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

    function installApp() {
        // Show the prompt
        deferredPrompt.prompt();
        setupButton.disabled = true;
        // Wait for the user to respond to the prompt
        deferredPrompt.userChoice
            .then((choiceResult) => {
                if (choiceResult.outcome === 'accepted') {
                    console.log('PWA setup accepted');
                    // hide our user interface that shows our A2HS button
                    setupButton.style.display = 'none';
                } else {
                    console.log('PWA setup rejected');
                }
                deferredPrompt = null;
            });
    }
</script>