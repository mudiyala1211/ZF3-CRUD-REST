<?php
namespace User\Form;

use Zend\Form\Form;

class UserForm extends Form {

    public function __construct($name = null) {
        // We will ignore the name provided to the constructor
        parent::__construct('user');

        $this->add([
            'name' => 'id',
            'type' => 'hidden',
        ]);
        $this->add([
            'name' => 'username',
            'type' => 'text',
            'options' => [
                'label' => 'User Name',
            ],
        ]);
        $this->add([
            'name' => 'fullname',
            'type' => 'text',
            'options' => [
                'label' => 'Full Name',
            ],
        ]);
        $this->add([
            'name' => 'email',
            'type' => 'text',
            'options' => [
                'label' => 'email',
            ],
        ]);
        $this->add([
            'name' => 'phoneno',
            'type' => 'text',
            'options' => [
                'label' => 'Phone Number',
            ],
        ]);
        $this->add([
            'name' => 'address',
            'type' => 'text',
            'options' => [
                'label' => 'Address',
            ],
        ]);
    }

}