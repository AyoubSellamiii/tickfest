<?php
    class User
    {
		public $id;
        public $login;
        public $email;
        public $ddn;
		public $img;
		public $pswd;
		public $date_creation;
		public $role;

    

        public function __construct(int $id, string $login,string $email,DateTime $ddn,string $img,string $pswd, DateTime $date_creation,string $role )
    {
        $this->id = $id;
        $this->login = $login;
        $this->email = $email;
        $this->ddn =  $ddn;
        $this->img = $img;
        $this->pswd = $pswd;
        $this->date_creation = $date_creation;
        $this->role=$role;
    }

    public function getId() : int
    {
        return $this->id;
    }
    public function setId(int $id)
    {
        $this->id=$id;
    }
    public function getLogin() : string 
    {
        return $this->login;
    }
    public function setLogin(string $login )
    {
        $this->login=$login;
    }
    public function getEmail() : string 
    {
        return $this->email;
    }
    public function setEmail(string $email)
    {
        $this->email=$email;
    }
    public function getDdn(): DateTime
    {
        return $this->ddn;
    }

    public function setDdn(DateTime $ddn)
    {
        $this->ddn=$ddn;
    }
    public function getImg() : string 
    {
        return $this->img;
    }
    public function setImg(string $img)
    {
        $this->img=$img;
    }
    public function getPswd() : string 
    {
        return $this->pswd;
    }
    public function setPswd(string $pswd)
    {
        $this->pswd=$pswd;
    }
    public function getDate_creation() : DateTime 
    {
        return $this->date_creation;
    }
    public function setDate_creation(DateTime $dd)
    {
        $this->date_creation=$dd;
    }
    public function getRole() : string 
    {
        return $this->role;
    }
    public function setRole(string $role)
    {
        $this->role=$role;
    }

	}
   
?>