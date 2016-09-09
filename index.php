<!DOCTYPE html>
<html>
    <head>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/head.php'; ?>
        <title>Home</title>
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
                    <h1>Home Page</h1>
                    <p>
                        This website is for my single-page JavaScript apps (SPJS). 
                        No guarantees are made on how frequently I update the site, 
                        but anytime I make an SPJS that I think is cool, I will put 
                        it here. Click the Apps link to see what apps I have here. 
                        I will eventually have About and Contact sections, if you 
                        want to learn boring stuff about me or contact me, respectively.
                    </p>
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