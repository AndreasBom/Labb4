<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 2015-10-04
 * Time: 20:08
 */

namespace view;


class crap
{

    public function render($isLoggedIn, IVIEW $v, DateTimeView $dtv) {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <title>Login Example</title>
        </head>
        <body>
        <h1>Assignment 2</h1>
        $this->renderRegistrationLink($isLoggedIn, $v)
        $this->renderIsLoggedIn($isLoggedIn)

        <?php
        if ($isLoggedIn) {
            echo "<h2>Logged in</h2>";
        } else {
            echo "<h2>Not logged in</h2>";
        }
        ?>
        <div class="container" >
            <?php
            echo $v->response();

            $dtv->show();
            ?>
        </div>

        <div>
            <em>This site uses cookies to improve user experience. By continuing to browse the site you are agreeing to our use of cookies.</em>
        </div>
        </body>
        </html>
        <?php
    }
}