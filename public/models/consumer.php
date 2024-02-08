<?php
/* 
CREATE TABLE consumers (
    id int(255) auto_increment not null,
    name varchar(255) not null,
    last_name varchar(255) not null,
    email varchar(255) not null,
    password varchar(255) not null,
    created_at date not null,
    CONSTRAINT pk_consumers PRIMARY KEY(id),
    CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDB;
*/
require_once('models/ConnectionDB.php');
class Consumer extends ConnectionDB{
    private $id;    
    private $name;
    private $last_name;
    private $email;
    private $password;
    private $created_at;

    public function __construct() {
        parent:: __construct();
        $this->setCreatedAt();
    }
    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName($name): self
    {
        $this->name = $this->db->real_escape_string($name);

        return $this;
    }

    /**
     * Get the value of last_name
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set the value of last_name
     */
    public function setLastName($last_name): self
    {
        $this->last_name = $this->db->real_escape_string($last_name);

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail($email): self
    {
        $this->email = $this->db->real_escape_string($email);

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */
    public function setPasswordLogin($password){
        $this->password = $password;
    }
    public function setPassword($password): self
    {
        $this->password = password_hash($this->db->real_escape_string($password),PASSWORD_BCRYPT,['cost'=>4]);

        return $this;
    }

    /**
     * Get the value of created_at
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     */
    public function setCreatedAt(): self
    {
        $this->created_at = date('Y-m-d H:i:s');

        return $this;
    }

    public function save(){
        $sql = "INSERT INTO consumers VALUES(null,'{$this->getName()}','{$this->getLastName()}','{$this->getEmail()}','{$this->getPassword()}','{$this->getCreatedAt()}')";
        $save = $this->db->query($sql);
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function checkLogin(){
        $result = false;
        $email = $this->getEmail();
        $password = $this->getPassword();
        $sql = "SELECT * FROM consumers WHERE email = '{$this->getEmail()}';";
        $login = $this->db->query($sql);
        if( $login && $login->num_rows == 1 ){
            $consumer = $login->fetch_object();
            $verify = password_verify($this->password, $consumer->password);
            if($verify){
                $result = $consumer;
            }
        }
        return $result;
        
    }

}