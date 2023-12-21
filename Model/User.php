<?php

namespace model;

class User
{
    public string $email = '';
    public int $employee_number = 0;
    public string $name = '';
    public int $telephone = 0;
    public string $address = '';
    public string $dob = '';
    public string $do_employment = '';
    public int $position = 0;

    /**
     * @param string $email
     * @param int $employee_number
     * @param string $name
     * @param int $telephone
     * @param string $address
     * @param string $dob
     * @param string $do_employment
     * @param int $position
     */
    public function __construct(string $email, int $employee_number, string $name, int $telephone, string $address, string $dob, string $do_employment, int $position)
    {
        $this->email = $email;
        $this->employee_number = $employee_number;
        $this->name = $name;
        $this->telephone = $telephone;
        $this->address = $address;
        $this->dob = $dob;
        $this->do_employment = $do_employment;
        $this->position = $position;
    }

    public static function generateManagerDemo(): User
    {
        /*TODO:Remove*/
        return new User(
            'hello@email.com',
            123,
            'Adam',
            33799,
            'Paris 75001',
            '01/01/1999',
            '20/12/2019',
            2
        );
    }

    public static function generateAdminDemo(): User
    {
        /*TODO:Remove*/
        return new User(
            'hello@email.com',
            123,
            'Adam',
            33799,
            'Paris 75001',
            '01/01/1999',
            '20/12/2019',
            1
        );
    }
}