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
$tableStats = [];
foreach ($tables as $table) {
    $tableStats[$table] = rowCount($conn, $table);
}

?>
    <div class="row">
        <div class="col pl-0 pt-3">
            <h2 class="h2">Contact List</h2>
            <div class="row">
                <div class="col">
                    <div class="row">
                        <?php
                        foreach ($tableStats as $tableName => $tableRows) {
                            ?>
                            <div class="col">
                                <div class="card">
                                    <h5 class="card-header"><?= ucwords($tableName); ?></h5>
                                    <div class="card-body text-center">
                                        <p class="fa-5x"><?= $tableRows ?></p>
                                    </div>
                                </div>
                            </div>
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