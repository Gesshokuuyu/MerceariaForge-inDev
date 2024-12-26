<?php

require_once __DIR__ . '/../../config/QGen.php';
class UserModel extends UserQueries 
{
   private $Name;
   private $Password;
   private $Email;
   private $NewUser;
   private $userQueries;


   const _TABLENAME = 'MFG_USERS';
   const _NAME = 'USER_NAME';
   const _ID = 'USER_ID';
   const _EMAIL = 'USER_EMAIL';
   const _PASSWORD = 'USER_PASSWORD';  


   public function __construct($User = null, UserQueries $userQueries = new UserQueries())
   {
       $this->NewUser = $User;
       $this->InitializeUser($this->NewUser);
       $this->userQueries = $userQueries;
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
      //   var_dump($this->getName());

        return $this;
     }
   }

   private function VerifyUser() {
      if (is_array($this->NewUser)) {
            foreach ($this->NewUser as $key => $value) {
               if (empty($value)) { 
                  return 2;
               }
            }
         // $this->InitializeUser();
         return 3;
      } else {
         return 1;
      }
  }

  public function CreateUserLogin()
{
    $verify = $this->VerifyUser(); 
    if ($verify == 3) {
        try {
            $userInsert = [
                self::_NAME     => $this->getName(),
                self::_EMAIL    => $this->getEmail(),
                self::_PASSWORD => $this->getPassword()
            ];

            $this->userQueries->createUser($userInsert);
            return 1; 
        } catch (Exception $e) {
            throw new Exception("Erro ao criar login do usuário: " . $e->getMessage());
        }
    }
}

public function VerifyEmailUser($email)
    {
        if (!$this->userQueries) {
            throw new Exception("UserQueries não foi inicializado.");
        }
        $user = $this->userQueries->getUserByEmail($email);
        return $user ? 1 : 2;
    }


   
}
