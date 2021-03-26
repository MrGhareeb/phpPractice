<?php
class User
{

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
     * store the user type id (foreign key from the users_type in the database)
     * @var string 
     */
    private $userTypeId;

    public function __construct()
    {
        //set the default value of the variables
        $this->userId = null;
        $this->fName = null;
        $this->lName = null;
        $this->email = null;
        $this->userTypeId = null;
    }

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
     * Set store the userId
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
     * Set store the first name of the user
     *
     * @param  string  $fName  store the first name of the user
     *
     */
    public function setFName(string $fName)
    {
        $this->fName = $fName;
    }

    /**
     * Get store the last name of the user
     *
     * @return string
     */
    public function getLName()
    {
        return $this->lName;
    }

    /**
     * Set store the last name of the user
     *
     * @param  string  $lName store the last name of the user
     *
     */
    public function setLName(string $lName)
    {
        $this->lName = $lName;
    }

    /**
     * Get store the email of the user
     *
     * @return  string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set store the email of the user
     *
     * @param  string  $email  store the email of the user
     *
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * Get store the user type id (foreign key from the users_type in the database)
     *
     * @return  string
     */
    public function getUserTypeId()
    {
        return $this->userTypeId;
    }

    /**
     * Set store the user type id (foreign key from the users_type in the database)
     *
     * @param  string  $userTypeId  store the user type id (foreign key from the users_type in the database)
     *
     */
    public function setUserTypeId(string $userTypeId)
    {
        $this->userTypeId = $userTypeId;
    }
}
