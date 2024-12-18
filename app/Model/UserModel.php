<?php

class UserModel
{

   private $Name;
   private $Password;
   private $Email;
   private $NewUser;


    public function __construct($User = null)
    {
        $this->NewUser = $User;
        $this->InitializeUser($this->NewUser);
    }

    public static function authenticate($username, $password)
    {
        // Aqui você pode consultar o banco de dados para verificar o usuário
        if ($username === 'admin' && $password === '1234') {
            return [
                'id' => 1,
                'username' => $username
            ];
        }
        return null;
    }
 
   public function getName()
   {
      return $this->Name;
   }

   public function setName($Name)
   {
      $this->Name = $Name;
   }

   public function getPassword()
   {
      return $this->Password;
   }

   public function setPassword($Password)
   {
      $this->Password = $Password;
   }

   public function getEmail()
   {
      return $this->Email;
   }

   public function setEmail($Email)
   {
      $this->Email = $Email;
   }

   public function getNewUser()
   {
      return $this->NewUser;
   }

   public function setNewUser($NewUser)
   {
      $this->NewUser = $NewUser;
   }

   public function InitializeUser() {
     if($this->getNewUser() && is_array($this->getNewUser())){

        $DataUser = $this->getNewUser();
        
        $this->setName($DataUser['name']);
        $this->setEmail($DataUser['email']);
        $this->setPassword($DataUser['password']);

        return $this;
     }
   }

   
}
