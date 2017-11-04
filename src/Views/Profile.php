<?php
/**
 * Created by PhpStorm.
 * User: georgeddunbar
 * Date: 10/31/17
 * Time: 9:27 AM
 */

namespace Ridonk\ClientPortal\Views;

use Ridonk\ClientPortal\Libs\Form\FormBuilder;
use Ridonk\ClientPortal\Models\DatabaseSelectClient;

class Profile extends FormBuilder {
    protected $client;

    /**
     * Profile constructor.
     * @param \PDO $connect
     * @param $session
     */
    public function __construct($connect, $session) {
        $client = DatabaseSelectClient::getClientWhereEmailMatches($session['email'], $connect);
        $this->client = $client[0];
    }

    public function createBaseView() {
        $firstname = $this->client['firstname'];
        if ($firstname != FALSE) {
            echo 'Hello ' . $firstname . '. <br />Your profile information is currently: <br />';
            echo self::buildUserTable($this->client);
            echo 'Enter a new pet using this form: <br /><small class="alert note">All fields are required</small><br />';
            echo self::buildNewPetForm();
        } else {
            echo 'Something broke...';
        }
        echo '<a href="logout.php">Logout</a>';
    }

    /**
     * @param $client
     * @return string
     */
    private static function buildUserTable($client) {
        $table = '<table cellpadding="5px" border="1px">';
        $table .= '<thead style="font-weight: 900"><tr>';
        foreach ($client as $key => $value) {
            if ($cell = self::buildTableCell($key, $key)) $table .= $cell;
        }
        $table .= '</thead></tr>';
        $table .= '<tr>';
        foreach ($client as $key => $value) {
            if ($cell = self::buildTableCell($key, $value)) $table .= $cell;
        }
        $table .= '</tr>';
        $table .= '</table>';
        return $table;
    }

    /**
     * @param $key
     * @param $value
     * @return bool|string
     */
    private static function buildTableCell($key, $value) {
        if (!is_integer($key)) {
            $cell = array('<td>', '</td>');
            return implode($value, $cell);
        } else return false;
    }

    private static function buildNewPetForm($action = 'default.php') {
        // Initialize form.
        $form = '<form method="post" action="' . $action . '">';
        // Get pet type
        $options = array(
            'petCat' => 'Cat',
            'petDog' => 'Dog',
            'petOther' => 'Other'
        );
        $form .= self::formRadioList($options);
        $form .= self::formTextField('Pet Name', 'petName', 'Enter your pets name');
        $form .= self::formTextArea('Pet Description', 'Enter a description of your pet', 'petGeneral');
        $form .= self::formTextArea('Pet Medical Information', 'Enter any special medical information for your pet.', 'petMedical');
        $form .= self::formTextArea('Pet Nutritional Needs', 'Enter any nutritional needs of your pet here.', 'petFood');
        $form .= self::formTextField('Veterinarian Name', 'vetName', 'Enter your vet\'s name');
        $form .= self::formTextField('Veterinarian Phone Number', 'vetPhone', 'Enter your vet\'s phone number');
        $form .= self::formTextField('Veterinarian Address', 'vetAddress', 'Enter your vet\'s address');
        $form .= self::formTextField('Veterinarian Zip', 'vetZip', 'Enter your vet\'s zipcode');
        $form .= self::formSubmit('submit', 'Add New Pet');
        return $form;
    }
}