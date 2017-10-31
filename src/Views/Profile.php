<?php
/**
 * Created by PhpStorm.
 * User: georgeddunbar
 * Date: 10/31/17
 * Time: 9:27 AM
 */

namespace Ridonk\ClientPortal\Views;

use Ridonk\ClientPortal\Models\DatabaseSelectClient;

class Profile {
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
        } else {
            echo 'Something broke...';
        }
        echo '<a href="logout.php">Logout</a>';
    }

    private static function buildUserTable($client) {
        $table = '<table cellpadding="5px" border="1px">';
        $table .= '<thead style="font-weight: 900"><tr>';
        foreach ($client as $key => $value) {
            if ($cell = self::buildTableCell($key, $key) != FALSE) $table .= $cell;
        }
        $table .= '</thead></tr>';
        $table .= '<tr>';
        foreach ($client as $key => $value) {
            if ($cell = self::buildTableCell($key, $value) != FALSE) $table .= $cell;
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
        } else return FALSE;
    }
}