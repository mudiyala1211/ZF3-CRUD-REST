<?php
namespace User\Controller;

use User\Form\UserForm;
use User\InputFilter\FormUserFilter;
use User\Model\UserTable;
use User\Model\User;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class UserController extends AbstractRestfulController {

    private $table;

    public function __construct(UserTable $table) {
        $this->table = $table;
    }

    public function getList() {
        $users = $this->table->fetchAll();
        $data = $userArr = [];
        foreach($users as $user) {
            $data[] = $user;
        }

        if(empty($data)){
            $userArr['status'] ='success';
            $userArr['message'] = 'Users not found';
            $userArr['users'] = [];
            return new JsonModel($userArr);
        }

        $userArr['status'] ='success';
        $userArr['message'] = 'Users are available';
        $userArr['users'] = $data;
        return new JsonModel($userArr);

    }

    public function get($id) {
        $id = (int) $id;

        if (0 === $id) {
            $dataArr['status'] ='error';
            $dataArr['message'] = 'User does not exists';
            return new JsonModel($dataArr);
        }

        $user = $this->table->getUser($id);

        $dataArr = $userArr = [];
        if($user){
            // Private/Protected Object to Array Conversion
            $userArr = json_decode(json_encode($user), true);
        } else {
            $dataArr['status'] ='error';
            $dataArr['message'] = 'User does not exists';
            $dataArr['userDetails'] = [];
            return new JsonModel($dataArr);
        }

        $dataArr['status'] ='success';
        $dataArr['message'] = 'User details are available';
        $dataArr['userDetails'] = $userArr;
        return new JsonModel($dataArr);

    }

    public function create($data) {
        $form = new UserForm();
        $request = $this->getRequest();

        $inputfilter = new FormUserFilter();
        $form->setInputFilter($inputfilter);
        $form->setData($request->getPost());

        $dataArr=[];
        if ($form->isValid()) {
            $user = new User();
            $user->exchangeArray($form->getData());
            $this->table->saveUser($user);
            $dataArr['status'] ='success';
            $dataArr['message'] = 'User added successfully!';
            return new JsonModel($dataArr);
        }

        $dataArr['status'] ='error';
        $dataArr['message'] = 'invalid data';
        return new JsonModel($dataArr);

    }

    public function update($id, $data) {
        $id = (int) $id;

        $dataArr=[];
        if (0 === $id) {
            $dataArr['status'] ='error';
            $dataArr['message'] = 'User does not exists';
            return new JsonModel($dataArr);
        }

        $form = new UserForm();

        $inputfilter = new FormUserFilter();
        $form->setInputFilter($inputfilter);
        $data['id'] = $id;
        $form->setData($data);

        if ($form->isValid()) {
            $user = new User();
            $user->exchangeArray($form->getData());
            try{
                $this->table->saveUser($user);
                $dataArr['status'] ='success';
                $dataArr['message'] = 'User updated successfully!';
                return new JsonModel($dataArr);
            } catch (\Exception $e) {
                $dataArr['status'] ='error';
                $dataArr['message'] = 'User does not exists';
                return new JsonModel($dataArr);
            }
        }

        $dataArr['status'] ='error';
        $dataArr['message'] = 'invalid data';
        return new JsonModel($dataArr);

    }

    public function delete($id) {
        $id = (int) $id;

        $dataArr=[];
        if (0 === $id) {
            $dataArr['status'] ='error';
            $dataArr['message'] = 'User does not exists';
            return new JsonModel($dataArr);
        }

        $user = $this->table->getUser($id);

        if($user){
            $this->table->deleteUser($id);
            $dataArr['status'] ='success';
            $dataArr['message'] = 'User deleted successfully!';
            return new JsonModel($dataArr);
        }

        $dataArr['status'] ='error';
        $dataArr['message'] = 'User does not exists';
        return new JsonModel($dataArr);

    }

}