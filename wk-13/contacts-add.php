<?php
/**
 * Edit selected contact
 *
 * This file retrieves the contact for a given ID, displays the details in a form, and then when submit is pressed,
 * the updates are sent (via POST) to the update page.
 *
 * @author      Adrian Gould <Adrian.Gould@tafe.wa.edu.au>
 * @file        contacts-edit.php
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
include_once 'header.php';


$sql = "SELECT * FROM countries ORDER BY name";
$stmt = $conn->prepare($sql);
$stmt->execute();
$countries = $stmt->fetchAll();

?>
    <div class="row">
        <div class="col-12">
            <h2>Add New Contact</h2>
        </div>
        <div class="col-12">
            <form id="addContact" name="addContact" method="post" action="contacts-store.php" class="container">
                <div class="form-group">
                    <label for="given_name">Given Name:</label>
                    <input type="text" name="given_name" id="given_name" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="family_name">Family Name:</label>
                    <input type="text" name="family_name" id="family_name" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="email">eMail:</label>
                    <input type="email" name="email" id="email" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="position">Job Title:</label>
                    <input type="text" name="position" id="position" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" name="city" id="city" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="country">Country:</label>
                    <select name="country" id="country" class="form-control">
                        <option value="" disabled selected>Select country</option>
                        <?php
                        foreach ($countries as $country) {
                            ?>
                            <option value="<?= $country->country_code ?>">
                                <?= $country->name ?>
                            </option>
                            <?php
                        } // end for each country
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Save</button>

                    <a href="contacts-browse.php" class="btn btn-outline-secondary text-dark">Cancel</a>
                </div>
            </form>
        </div>
    </div>
<?php


include_once 'footer.php';