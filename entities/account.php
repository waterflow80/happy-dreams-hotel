<?php

class Account{
    private $accountId;
    private $email;
    private $userName;
    private $role;
    private $password;

    public function __construct($accountId,$email,$userName,$role,$password)
    {
        $this->accountId = $accountId;
        $this->email = $email;
        $this->userName = $userName;
        $this->role = $role;
        $this->password = $password;
    }

    public function getAccountId(){
        return $this->accountId;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getUserName(){
        return $this->userName;
    }
    public function getRole(){
        return $this->role;
    }
    public function getPassword(){
        return $this->password;
    }
}

?>