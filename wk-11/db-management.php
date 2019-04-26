<?php
/**
 * Browse the contacts
 *
 * This file retrieves the contacts and displays them in a simple form
 *
 * @author      Adrian Gould <Adrian.Gould@tafe.wa.edu.au>
 * @file        contacts-browse.php
 * @project     C4Prog-JS-SQL-2019-S1
 * @version     1.0
 * @created     2019-04-08
 * @copyright   This work is licensed under the Creative Commons
 *              Attribution-ShareAlike 3.0 Australia License. To view a copy of
 *              this license, visit http://creativecommons.org/licenses/by-sa/3.0/au/
 *              or send a letter to Creative Commons, PO Box 1866, Mountain View,
 *              CA 94042, USA.
 */

require_once 'connection.php';
include_once 'page-header.php';

$tables = getTableList($conn);
$numTables = countTables($conn);

?>
    <div class="row">
        <div class="col pl-0 pt-3">
            <h2 class="h2">Database Management</h2>
            <div class="row">
                <?php
                require_once "db-management-steps.php";
                ?>

                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <h5 class="card-header">Tables</h5>
                                <div class="card-body text-center">
                                    <p class="fa-5x"><?= $numTables ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card">
                                <h5 class="card-header">Table Names</h5>
                                <div class="card-body">
                                    <?php
                                    foreach ($tables as $table) {
                                        ?>
                                        <h5 class="card-title"><?= $table ?></h5>
                                        <p class="card-text"><?= rowCount($conn, $table) ?></p>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php

include_once 'page-footer.php';