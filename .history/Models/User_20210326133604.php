<?php
//import the database class
include "./Database.php";
class User
{

    //variables

    /**
     * store the user_id
     * @var string 
     */
    private $user_id;
    /**
     * store the first name of the user
     * @var string 
     */
    private $f_name;
    /**
     * store the last name of the user
     * @var string 
     */
    private $l_name;
    /**
     * store the email of the user
     * @var string 
     */
    private $email;
    /**
     * store the hashed user_pass of the user
     * @var string 
     */
    private $user_pass;
    /**
     * store the user type id (foreign key from the users_type table in the database)
     * @var string 
     */
    private $user_type_id;

    /**
     * store the connection of the database
     * @var mysqli
     */
    private $conn;


    //getters and setters

    /**
     * Get store the user_id
     *
     * @return  string
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set the user_id
     *
     * @param  string  $user_id  store the user_id
     *
     */
    public function setUserId(string $user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * Get store the first name of the user
     *
     * @return  string
     */
    public function getFName()
    {
        return $this->f_name;
    }

    /**
     * Set the first name of the user
     *
     * @param  string  $f_name  store the first name of the user
     *
     */
    public function setFName(string $f_name)
    {
        $this->f_name = $f_name;
    }

    /**
     * Get the last name of the user
     *
     * @return string
     */
    public function getLName()
    {
        return $this->l_name;
    }

    /**
     * Set the last name of the user
     *
     * @param  string  $l_name store the last name of the user
     *
     */
    public function setLName(string $l_name)
    {
        $this->l_name = $l_name;
    }

    /**
     * Get the email of the user
     *
     * @return  string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the email of the user
     *
     * @param  string  $email  store the email of the user
     *
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * Get the user type id (foreign key from the users_type table in the database)
     *
     * @return  string
     */
    public function getUserTypeId()
    {
        return $this->user_type_id;
    }

    /**
     * Set the user type id (foreign key from the users_type table in the database)
     *
     * @param  string  $user_type_id  store the user type id (foreign key from the users_type table in the database)
     *
     */
    public function setUserTypeId(string $user_type_id)
    {
        $this->user_type_id = $user_type_id;
    }

    /**
     * create an instance of the User class with null values
     */
    public function __construct()
    {
        //set the default value of the variables
        $this->user_id = null;
        $this->f_name = null;
        $this->l_name = null;
        $this->email = null;
        $this->user_type_id = null;
        //get and store the connection of mysqli
        $conn = Database::getInstance()->getConnection();
    }

    //TODO: checkLoggedUser() check the session for uid
    //TODO: login($email,$user_pass) @return bool create session(call createSession() function) if user is valid 
    //TODO: logout() user checkLoggedUser() @return bool if there is an active session then logout the user 
    //TODO: register() @return bool user existsWithId to check for the usr, if there is not user with the same data create an new user in the database
    //TODO: existsWithId() @return bool check the database if the user existsWithId 
    //TODO: initWithSession() @return bool set the user instance data from session uid (using checkLoggedUser() first to check the session)
    //TODO: initWith($user_id,$f_name,$l_name,$email,$user_pass,$user_type_id) set the values of the instance
    //TODO: private createSession() create session
    //TODO: isAdmin() @return bool check if the user is admin

    /**
     * check if the user logged throw the session
     * @return bool
     */
    public function checkLoggedUser()
    {
        //check if the session is not empty
        if (!empty($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }
    /**
     *  create session if user is valid
     * @param string $email the email of the user
     * @param string $user_pass the user_pass of the user 
     * @return bool return true of the user is valid
     */
    public function login($email, $user_pass)
    {
        //assign email to the instance
        $this->email = $email;
        //check if the user with this email exists and populate the instance
        $exists = $this->existsWithEmail();
        if ($exists) {
            //check if user_pass is valid
            if (password_verify($user_pass, $this->user_pass)) {
                //set the session for the logged in user
                $_SESSION["user_id"] = $this->user_id;
                session_start();
            }
        }
    }
    /**
     * if there is an active session then logout the user 
     * @return bool if logout was successful return true
     */
    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
    }
    /**
     * create an new user in the database
     * @param string $f_name the first name of the user
     * @param string $l_name the last name of the user
     * @param string $email the email of the user
     * @param string $user_pass the hashed user_pass of the user
     * @param string $user_type_id the type of the user (example normal,admin)
     * @return bool if the user exists With the email return false
     */
    public function register($f_name, $l_name, $email,$user_pass,$user_type_id)
    {
        //set the values of the instance
        $this->initWith(null,$f_name,$l_name,$email,$user_pass,$user_type_id);
        //check if the user exists
        if(!$this->existsWithEmail()){
            //sql query to execute
            $sql = "INSERT INTO USERS(f_name, l_name, email, user_pass,user_type_id) VALUES (?,?,?,?,?)";
            //prepare the sql for the parameters 
            $stmt = $this->conn->prepare($sql);
            //set the values of the parameters (s for string)
            $stmt->bind_param("ssssss",$this->f_name,$this->l_name,$this->email,$user_pass,$user_type_id);
            //run the sql command
            $stmt->execute();
            //get the id of the user after the insert as set the value of the user_id variable
            $this->user_id = $stmt->insert_id;


        }
    }
    /**
     * check the database if the user exists with the id
     * @return bool return true if the user exists With Id
     */
    public function existsWithId()
    {
        //sql query to execute
        $sql = "SELECT * FROM USERS WHERE user_id = $this->user_id";
        //query the database
        $results = $this->conn->query($sql);
        $user = $results->fetch_object();
        //get the data as an object(fetch_object()) and check if the results is empty
        if (!empty($user)) {
            //return true of the result is not empty
            $this->initWith($user->user_Id, $user->f_name, $user->l_name, $user->email,$user->user_pass,$user->user_type_id);
            return true;
        } else {
            //return false of the result is empty
            return false;
        }
    }

    /**
     * check the database if the user exists with the email
     * @return bool return true if the user exists With email
     */
    public function existsWithEmail()
    {
        //sql query to execute
        $sql = "SELECT * FROM USERS WHERE email = $this->email";
        //query the database
        $results = $this->conn->query($sql);
        $user = $results->fetch_object();
        //get the data as an object(fetch_object()) and check if the results is empty
        if (!empty($user)) {
            //return true if the result is not empty and init the instance
            $this->initWith($user->user_Id, $user->f_name, $user->l_name, $user->email,$user->user_pass, $user->user_type_id);
            return true;
        } else {
            //return false of the result is empty
            return false;
        }
    }

    /**
     * set the user instance data from session uid
     * @return bool return false if the users is not logged in
     */
    public function initWithSession()
    {
        //check if the user is logged in
        if ($this->checkLoggedUser()) {
            //get the id from the session
            $id = $_SESSION['user_id'];
            //sql query to execute
            $sql = "SELECT * FROM USERS WHERE user_id = $id";
            //get the data as an object(fetch_object())
            $results = $this->conn->query($sql)->fetch_object();
            //set the values of the instance variables
            $this->initWith($results->user_id, $results->f_name, $results->l_name, $results->email, $results->user_pass,$results->user_type_id);
            //return true to indicate that the process what successful
            return true;
        } else {
            return false;
        }
    }

    /**
     * set the values of the instance variables
     * @param string $user_id the id of the user
     * @param string $f_name the firstName of the user
     * @param string $l_name the lastName of the user 
     * @param string $email the email of the user
     * @param string $user_pass the hashed user_pass of the user
     * @param string $user_type_id the type of the user
     */
    public function initWith($user_id, $f_name, $l_name, $email, $user_pass, $user_type_id)
    {
        //set value of the variables
        $this->user_id = $user_id;
        $this->f_name = $f_name;
        $this->l_name = $l_name;
        $this->email = $email;
        $this->user_pass = $user_pass;
        $this->user_type_id = $user_type_id;
    }
    /**
     * create session
     */
    private function createSession(){

    }
    /**
     * check if the user is admin
     * @return bool true if the user is admin
     */
    public function isAdmin(){
        // if the user is admin
        if ($this->user_type_id == 1) {
            return true;
        }else{
            //if user is not admin or null
            return false;
        }
    }
}
