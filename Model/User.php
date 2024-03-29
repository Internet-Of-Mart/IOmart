<?php

namespace model;

include_once($_SERVER['DOCUMENT_ROOT'] . '/Util/DB.php');

use Util\DB;

class User
{
    public int $id = 0;
    public string $email = '';
    public int $employee_number = 0;
    public string $firstname = '';
    public string $lastname = '';
    public int $telephone = 0;
    public string $address = '';
    public string $dob = '';
    public string $do_employment = '';
    public int $position = 0;

    /**
     * @param int $id
     * @param string $email
     * @param int $employee_number
     * @param string $firstname
     * @param string $lastname
     * @param int $telephone
     * @param string $address
     * @param string $dob
     * @param string $do_employment
     * @param int $position
     */
    public function __construct(int $id, string $email, int $employee_number, string $firstname, string $lastname, int $telephone, string $address, string $dob, string $do_employment, int $position)
    {
        $this->id = $id;
        $this->email = $email;
        $this->employee_number = $employee_number;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->telephone = $telephone;
        $this->address = $address;
        $this->dob = $dob;
        $this->do_employment = $do_employment;
        $this->position = $position;
    }

    public static function loadRaw($userRaw): User
    {
        return new User(
            $userRaw['id_user'],
            $userRaw['email'],
            $userRaw['employee_number'],
            $userRaw['first_name'],
            $userRaw['last_name'],
            $userRaw['telephone'],
            $userRaw['address'],
            $userRaw['date_of_birth'],
            $userRaw['date_of_employment'],
            $userRaw['position_type']
        );
    }

    public function getPositionString(): ?string
    {
        if ($this->position == 1) {
            return 'Admin';
        }
        if ($this->position == 2) {
            return 'Manager';
        }
        if ($this->position == 3) {
            return 'User';
        }
        return null;
    }


    /**
     * Returns User Object if login is successful
     */
    public static function login($username, $password): ?User
    {
        $DB = new DB();
        $userDB = $DB->getUserCredentials($username)[0];
        $newUser = $DB->getUserPositions($userDB['id_user']);
        $DB->closeConnection();

        if (password_verify($password, $userDB['password_hash'])) {
            if (sizeof($newUser) == 0) {
                $userDB['position_type'] = 1;
            }
            return User::loadRaw($userDB);
        }
        return null;
    }

    public static function loginPasswordless($username): ?User
    {
        $DB = new DB();
        $userDB = $DB->getUserCredentials($username)[0];
        $newUser = $DB->getUserPositions($userDB['id_user']);
        $DB->closeConnection();


        if (sizeof($newUser) == 0) {
            $userDB['position_type'] = 1;
        }
        return User::loadRaw($userDB);

    }

    public static function getSessionUser()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        return json_decode($_SESSION['user']);
    }

    public static function username_exist($username): bool
    {
        $DB = new DB();
        $rawData = $DB->checkUsername($username);
        $DB->closeConnection();

        return boolval($rawData);
    }

    public static function registerAdmin(array $data): User
    {
        $DB = new DB();
        $data = ($DB->createUser($data));
        $DB->closeConnection();
        $data['position_type'] = 1;

        return User::loadRaw($data);
    }

    public static function createUser(array $data)
    {
        $DB = new DB();
        $DB->createUser($data);
        $userID = $DB->getMaxUserID();
        $DB->associateUserStore($data['store_id'], $userID, $data['position']);
        $DB->closeConnection();
    }

    public static function deleteUser($userID)
    {
        $DB = new DB();
        $cred = $DB->getCred($userID)['id'];
        $DB->deletePosition($userID);
        $DB->deleteUser($userID);
        $DB->deleteCredentials($cred);
        $DB->closeConnection();

    }

    /** Edits a person and its position */
    public static function editUser(array $data, int $userID): void
    {
        $DB = new DB();
        $edit = $DB->editUserData($userID, $data);
        $editPos = $DB->editPosition($userID, $data['store_id'], $data['position']);
        $DB->closeConnection();
    }

    public static function accountCred(int $userID): array
    {
        $DB = new DB();
        $userDB = $DB->getCred($userID);
        $DB->closeConnection();

        return $userDB;

    }

    public static function getPosition($position): array
    {
        $DB = new DB();
        $position = $DB->getPosition($position);
        $DB->closeConnection();

        return $position;
    }

    public static function getCred($userID)
    {
        $DB = new DB();
        $userDB = $DB->getCred($userID);
        $DB->closeConnection();
        return $userDB;
    }

    public static function changeUsername(int $userId, string $username): bool
    {
        $DB = new DB();
        $username = $DB->changeUsername($userId, $username);
        $DB->closeConnection();
        return $username;
    }

    public static function changePassword(int $userId, string $passWord): bool
    {
        $DB = new DB();
        $psw = $DB->changePassword($userId, password_hash($passWord, PASSWORD_BCRYPT));
        $DB->closeConnection();
        return $psw;
    }


    public static function changePerson($userID, $data)
    {
        $DB = new DB();
        $edit = $DB->editUserData($userID, $data);
        $DB->closeConnection();

    }


}