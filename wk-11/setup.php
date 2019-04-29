<?php
/**
 * SQLite Database setup
 *
 * This file calls the tables_create and tables_seed files to create and seed the contacts database.
 *
 * @author      Adrian Gould <Adrian.Gould@tafe.wa.edu.au>
 * @file        setup.php
 * @project     C4Prog-JS-SQL-2019-S1
 * @version     1.0
 * @created     2019-04-08
 * @copyright   This work is licensed under the Creative Commons
 *              Attribution-ShareAlike 3.0 Australia License. To view a copy of
 *              this license, visit http://creativecommons.org/licenses/by-sa/3.0/au/
 *              or send a letter to Creative Commons, PO Box 1866, Mountain View,
 *              CA 94042, USA.
 */

include_once 'page-header.php';
require_once 'connection.php';
require_once 'tables-drop.php';
require_once 'tables-create.php';
require_once 'tables-seed.php';
include_once 'page-footer.php';
