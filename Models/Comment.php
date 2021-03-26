<?php
include_once "./Database.php";
class Comment
{

    /**
     * 
     * @var string store the comment id
     */
    private $comment_id;
    /**
     * @var string store the comment body
     */
    private $comment_body;
    /**
     * @var string store the id of the user how created the comment
     */
    private $created_by;
    /**
     * @var string store the post id (foreign key)
     */
    private $post_id;
    /**
     * @var string store the data on when the comment was created
     */
    private $comment_stamp_date;

    /**
     * Get the comment id
     *
     * @return string
     */
    public function getCommentId()
    {
        return $this->comment_id;
    }

    /**
     * Set the comment id
     *
     * @param string  $comment_id  the comment id
     *
     */
    public function setCommentId(string $comment_id)
    {
        $this->comment_id = $comment_id;
    }

    /**
     * Get store the comment body
     *
     * @return string
     */
    public function getCommentBody()
    {
        return $this->comment_body;
    }

    /**
     * Set the comment body
     *
     * @param string  $comment_body the comment body
     *
     */
    public function setCommentBody(string $comment_body)
    {
        $this->comment_body = $comment_body;
    }

    /**
     * Get store the id of the user how created the comment
     *
     * @return  string
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }

    /**
     * Set the id of the user how created the comment
     *
     * @param string  $created_by the id of the user how created the comment
     *
     */
    public function setCreatedBy(string $created_by)
    {
        $this->created_by = $created_by;
    }

    /**
     * Get store the post id (foreign key)
     *
     * @return string
     */
    public function getPostId()
    {
        return $this->post_id;
    }

    /**
     * Set the post id (foreign key)
     *
     * @param string  $post_id the post id (foreign key)
     *
     */
    public function setPostId(string $post_id)
    {
        $this->post_id = $post_id;
    }

    /**
     * Get the data on when the comment was created
     *
     * @return  string
     */
    public function getCommentStampDate()
    {
        return $this->comment_stamp_date;
    }

    /**
     * Set the data on when the comment was created
     *
     * @param string  $comment_stamp_date the data on when the comment was created
     *
     */
    public function setCommentStampDate(string $comment_stamp_date)
    {
        $this->comment_stamp_date = $comment_stamp_date;
    }
    /**
     * create an instance of comment and set the values as null
     */
    public function __construct()
    {
        $this->comment_id = null;
        $this->comment_body = null;
        $this->created_by = null;
        $this->post_id = null;
        $this->comment_stamp_date = null;
    }

    //TODO: getCommentsByPost get all the comment by post_id 
    //TODO: initWith set the values of the instance
    /**
     * * @param string $comment_id the id if the comment 
     * * @param string $comment_body the body of the comment
     * * @param string $created_by the id of the user how created the comment
     * * @param string $post_id the id of the post the comment is related to
     * * @param string $comment_stamp_date the date when the post was created
     */
    public function initWith($comment_id,$comment_body,$created_by,$post_id,$comment_stamp_date){
        //set the values of the variables in the instance
        $this->comment_id = $comment_id;
        $this->comment_body = $comment_body;
        $this->created_by = $created_by;
        $this->post_id = $post_id;
        $this->comment_stamp_date = $comment_stamp_date;
    }
    
        /**
     * get all the comments from the database by the post id
     * @return Comment[] return array of comment objects
     */
    static public function getCommentsByPost($post_id)
    {
        //array of post objects
        $comments = [];
        //get the connection of the database
        $conn = Database::getInstance()->getConnection();
        //query the database
        $results = $conn->query("SELECT * FROM comments");
        //loop throw the data and create an array of post objects
        while ($row = $results->fetch_assoc()) {
            //create a new instance of post
            $comment = new Self();
            //set the data of the post object
            $comment->initWith($row['comment_id'], $row['comment_body'], $row['created_by'], $row['post_id'], $row['post_img'], $row['comment_stamp_date']);
            //add the post object to the array
            array_push($comments, $comment);
        }
        return $comments;
    }
}
