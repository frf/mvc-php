    </div>

    <footer class="footer">
        <div class="container">
            <p class="text-muted">
                <?php print $_SESSION['oConfig']->getConfig()->info->title; ?> -
                <?php print $_SESSION['oConfig']->getConfig()->info->phone; ?>
                <?php print $_SESSION['oConfig']->getConfig()->info->phone; ?>
                Version: <?php echo $_SESSION['oConfig']->getConfig()->version; ?>
            </p>
        </div>
    </footer>

    <script src="/public/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/public/js/main.js"></script>
    <?php echo $aViewJs; ?>
</body>
</html>