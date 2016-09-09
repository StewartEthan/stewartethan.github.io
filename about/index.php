<!DOCTYPE html>
<html>
    <head>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/head.php'; ?>
        <title>About | ethan-stewart.net</title>
    </head>
    <body>
        <div>
            <header role="banner">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/header.php'; ?>
            </header>
            <nav id="nav-id" role="navigation">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/navigation.php'; ?>
            </nav>
            <main role="main">
                <div>
                    <h1>About</h1>
                    <p>Stuff about me/this site to go here</p>
                </div>
            </main>
            <footer role="contentinfo">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/footer.php'; ?>
                <div>
                    <?php echo 'Last Update: ' . date(' j F, Y', getlastmod()) ?>
                </div>
            </footer>
        </div>
    </body>
</html>