<?php
// Reluctant and hopefully temporary use of PHP only for convenience
// in creating the list of app links

function createLink($ref, $text) {
    echo "&#10149;&nbsp;<a href='$ref'>$text</a>";
}

function createLinkArray($ref, $text) {
    return array(
        'ref' => $ref,
        'text' => $text
    );
}

/**
 * Returns an array containing an array for each link with needed info
 * Add a call to createLinkArray inside the return array for each link
 * to be added to the list
 * @return array
 */
function getLinks() {
    return array(
        createLinkArray('hours.php', 'Hours Worked Calculator')
        // Add other calls to createLinkArray above this comment
    );
}

?>

<!DOCTYPE html>
<html>
    <head>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/head.php'; ?>
        <title>Apps</title>
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
                    <h1>Apps</h1>
                    The following is a list of the apps I have on this site. More 
                    information about each app is on its page.
                    
                    <ul id="appList">
                        <?php foreach (getLinks() as $link): ?>
                        <li><?php createLink($link['ref'], $link['text']); ?></li>
                        <?php endforeach; ?>
                    </ul>
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