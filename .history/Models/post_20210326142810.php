<?php
class Post
{

    //variables

    /**
     * @var string store the id of the post
     */
    private $post_id;
    /**
     * @var string store the title of the post
     */
    private $post_title;
    /**
     * @var string store the body of the post
     */
    private $post_body;
    /**
     * @var string store the id of how created the post 
     */
    private $created_by;
    /**
     * @var string store the img location in the server
     */
    private $post_img;
    /**
     * @var string store the date of when the post was created
     */
    private $post_time_stamp;
     /**
     * store the connection of the database
     * @var mysqli
     */
    private $conn;


    //getter and setters

    /**
     * Get the id of the post
     *
     * @return  string
     */
    public function getPostId()
    {
        return $this->post_id;
    }

    /**
     * Set the id of the post
     *
     * @param  string  $post_id  store the id of the post
     *
     */
    public function setPostId(string $post_id)
    {
        $this->post_id = $post_id;
    }

    /**
     * Get the title of the post
     *
     * @return  string
     */
    public function getPostTitle()
    {
        return $this->post_title;
    }

    /**
     * Set the title of the post
     *
     * @param  string  $post_title  the title of the post
     *
     */
    public function setPostTitle(string $post_title)
    {
        $this->post_title = $post_title;
    }

    /**
     * Get sre the body of the post
     *
     * @return  string
     */
    public function getPostBody()
    {
        return $this->post_body;
    }

    /**
     * Set the body of the post
     *
     * @param  string  $post_body  the body of the post
     *
     */
    public function setPostBody(string $post_body)
    {
        $this->post_body = $post_body;
    }

    /**
     * Get the id of how created the post
     *
     * @return  string
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }

    /**
     * Set the id of how created the post
     *
     * @param  string  $created_by the id of how created the post
     *
     */
    public function setCreatedBy(string $created_by)
    {
        $this->created_by = $created_by;
    }

    /**
     * Get the img location in the server
     *
     * @return  string
     */
    public function getPostImg()
    {
        return $this->post_img;
    }

    /**
     * Set the img location in the server
     *
     * @param  string  $post_img the img location in the server
     *
     */
    public function setPostImg(string $post_img)
    {
        $this->post_img = $post_img;
    }

    /**
     * Get the date of when the post was created
     *
     * @return  string
     */
    public function getPostTimeStamp()
    {
        return $this->post_time_stamp;
    }

    /**
     * Set store the date of when the post was created
     *
     * @param  string  $post_time_stamp the date of when the post was created
     *
     */
    public function setPostTimeStamp(string $post_time_stamp)
    {
        $this->post_time_stamp = $post_time_stamp;
    }



    public function __construct()
    {
        //set the values of the variables as null
        $this->post_id = null;
        $this->post_title = null;
        $this->post_body = null;
        $this->created_by = null;
        $this->post_img = null;
        $this->post_time_stamp = null;
         //get and store the connection of mysqli
         $conn = Database::getInstance()->getConnection();
    }
}
