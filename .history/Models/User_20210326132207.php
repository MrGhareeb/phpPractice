<?php
//import the database class
include "./Database.php";
class User
{

    //variables

    /**
     * store the userId
     * @var string 
     */
    private $userId;
    /**
     * store the first name of the user
     * @var string 
     */
    private $fName;
    /**
     * store the last name of the user
     * @var string 
     */
    private $lName;
    /**
     * store the email of the user
     * @var string 
     */
    private $email;
    /**
     * store the hashed password of the user
     * @var string 
     */
    private $password;
    /**
     * store the user type id (foreign key from the users_type table in the database)
     * @var string 
     */
    private $userTypeId;

    /**
     * store the connection of the database
     * @var mysqli
     */
    private $conn;


    //getters and setters

    /**
     * Get store the userId
     *
     * @return  string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set the userId
     *
     * @param  string  $userId  store the userId
     *
     */
    public function setUserId(string $userId)
    {
        $this->userId = $userId;
    }

    /**
     * Get store the first name of the user
     *
     * @return  string
     */
    public function getFName()
    {
        return $this->fName;
    }

    /**
     * Set the first name of the user
     *
     * @param  string  $fName  store the first name of the user
     *
     */
    public function setFName(string $fName)
    {
        $this->fName = $fName;
    }

    /**
     * Get the last name of the user
     *
     * @return string
     */
    public function getLName()
    {
        return $this->lName;
    }

    /**
     * Set the last name of the user
     *
     * @param  string  $lName store the last name of the user
     *
     */
    public function setLName(string $lName)
    {
        $this->lName = $lName;
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
        return $this->userTypeId;
    }

    /**
     * Set the user type id (foreign key from the users_type table in the database)
     *
     * @param  string  $userTypeId  store the user type id (foreign key from the users_type table in the database)
     *
     */
    public function setUserTypeId(string $userTypeId)
    {
        $this->userTypeId = $userTypeId;
    }

    /**
     * create an instance of the User class with null values
     */
    public function __construct()
    {
        //set the default value of the variables
        $this->userId = null;
        $this->fName = null;
        $this->lName = null;
        $this->email = null;
        $this->userTypeId = null;
        //get and store the connection of mysqli
        $conn = Database::getInstance()->getConnection();
    }

    //TODO: checkLoggedUser() check the session for uid
    //TODO: login($email,$password) @return bool create session(call createSession() function) if user is valid 
    //TODO: logout() user checkLoggedUser() @return bool if there is an active session then logout the user 
    //TODO: register() @return bool user existsWithId to check for the usr, if there is not user with the same data create an new user in the database
    //TODO: existsWithId() @return bool check the database if the user existsWithId 
    //TODO: initWithSession() @return bool set the user instance data from session uid (using checkLoggedUser() first to check the session)
    //TODO: initWith($userId,$fName,$lName,$email,$password,$userTypeId) set the values of the instance
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
     * @param string $password the password of the user 
     * @return bool return true of the user is valid
     */
    public function login($email, $password)
    {
        //assign email to the instance
        $this->email = $email;
        //check if the user with this email exists and populate the instance
        $exists = $this->existsWithEmail();
        if ($exists) {
            //check if password is valid
            if (password_verify($password, $this->password)) {
                $_SESSION["user_id"]
            }
        }
    }
    /**
     * if there is an active session then logout the user 
     * @return bool if logout was successful return true
     */
    public function logout()
    {
    }
    /**
     * create an new user in the database
     * @param string $fName the first name of the user
     * @param string $lName the last name of the user
     * @param string $email the email of the user
     * @param string $password the hashed password of the user
     * @param string $userTypeId the type of the user (example normal,admin)
     * @return bool if the user exists With the email return false
     */
    public function register($fName, $lName, $email,$password,$userTypeId)
    {
        //set the values of the instance
        $this->initWith(null,$fName,$lName,$email,$password,$userTypeId);
        //check if the user exists
        if(!$this->existsWithEmail()){
            //sql query to execute
            $sql = "INSERT INTO USERS(f_name, l_name, email, user_pass,user_type_id) VALUES (?,?,?,?,?)";
            //prepare the sql for the parameters 
            $stmt = $this->conn->prepare($sql);
            //set the values of the parameters (s for string)
            $stmt->bind_param("ssssss",$this->fName,$this->lName,$this->email,$password,$userTypeId);
            //run the sql command
            $stmt->execute();
            //get the id of the user after the insert
            $this->userId = $stmt->insert_id;


        }
    }
    /**
     * check the database if the user exists with the id
     * @return bool return true if the user exists With Id
     */
    public function existsWithId()
    {
        //sql query to execute
        $sql = "SELECT * FROM USERS WHERE user_id = $this->userId";
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
            $id = $_SESSION['userId'];
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
     * @param string $userId the id of the user
     * @param string $fName the firstName of the user
     * @param string $lName the lastName of the user 
     * @param string $email the email of the user
     * @param string $password the hashed password of the user
     * @param string $userTypeId the type of the user
     */
    public function initWith($userId, $fName, $lName, $email, $password, $userTypeId)
    {
        //set value of the variables
        $this->userId = $userId;
        $this->fName = $fName;
        $this->lName = $lName;
        $this->email = $email;
        $this->password = $password;
        $this->userTypeId = $userTypeId;
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
        if ($this->userTypeId == 1) {
            return true;
        }else{
            //if user is not admin or null
            return false;
        }
    }
}