<?php
/**
 * The HTML for the bottom of the pages used in this example.
 *
 * @author      Adrian Gould <Adrian.Gould@tafe.wa.edu.au>
 * @file        page-footer.php
 * @project     C4Prog-JS-SQL-2019-S1
 * @version     1.0
 * @created     2019-04-08
 * @copyright   This work is licensed under the Creative Commons
 *              Attribution-ShareAlike 3.0 Australia License. To view a copy of
 *              this license, visit http://creativecommons.org/licenses/by-sa/3.0/au/
 *              or send a letter to Creative Commons, PO Box 1866, Mountain View,
 *              CA 94042, USA.
 */
?>
    </div>
    </main>

    <footer class="footer mt-auto py-3 bg-danger text-white">
        <div class="container">
            <p class="row">
                <small class="text-white col">Created by Adrian Gould</small>
                <small class="col text-center">
                    Made with
                    <a href="https://getbootstrap.com"
                       target="_blank" class="text-white">Bootstrap <i class="fa fa-external-link-alt text-black-50"></i>
                    </a> <br>
                    <a href="https://hackerthemes.com/bootstrap-cheatsheet/"
                       target="_blank" class="text-white">
                        Bootstrap Cheat Sheet <i class="fa fa-external-link-alt text-black-50"></i></a>
                </small>
                <small class="text-white-50 col text-right">
                    <?php
                    $backtrace = debug_backtrace();
                    $filename = basename($backtrace[0]['file']);
                    if (file_exists($filename)) {
                        echo "Last modified: " . date("Y-m-d", filemtime($filename));
                    } else {
                        echo "unknown";
                    }
                    ?>
                </small>
            </p>
        </div>
    </footer>

    <!-- JavaScript Includes - External JS code -->
    <script src="../assets/js/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>

    </body>
    </html>
<?php
