<?php
namespace User\Model;

class User {
    public $id;
    public $username;
    public $fullname;
    public $email;
    public $phoneno;
    public $address;

    public function exchangeArray(array $data) {
        $this->id       = !empty($data['id']) ? $data['id'] : null;
        $this->username = !empty($data['username']) ? $data['username'] : null;
        $this->fullname = !empty($data['fullname']) ? $data['fullname'] : null;
        $this->email    = !empty($data['email']) ? $data['email'] : null;
        $this->phoneno  = !empty($data['phoneno']) ? $data['phoneno'] : null;
        $this->address  = !empty($data['address']) ? $data['address'] : null;
    }

    public function getArrayCopy() {
        return [
            'id'        => $this->id,
            'username'  => $this->username,
            'fullname'  => $this->fullname,
            'email'     => $this->email,
            'phoneno'   => $this->phoneno,
            'address'   => $this->address,
        ];
    }

}