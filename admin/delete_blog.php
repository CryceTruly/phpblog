<?php 
    session_start();
    include('../config/constants.php');
    if(!isset($_SESSION['user']))
    {
        header('location:'.SITEURL.'admin/login.php');
    }
    //echo "Deete User PAge";
    //GEtting user_id from Users.php PAge
    if(isset($_GET['blog_id']))
    {
        $blog_id = $_GET['blog_id'];
        //Connectng Database
        $conn = mysqli_connect(LOCALHOST,USERNAME,PASSWORD) or die(mysqli_error());
        
        //Selecting Database
        $db_select = mysqli_select_db($conn,DBNAME);
        
        $query = "DELETE FROM tbl_blogs WHERE blog_id=$blog_id";
        
        //Executing Query
        $res = mysqli_query($conn,$query);
        if($res==true)
        {
            //echo "Deleted Successfully";
            $_SESSION['delete_success']="Blog Deleted Successfully";
            header('location:'.SITEURL.'admin/blogs.php');
        }
        else
        {
            //echo "FAiled to Delete";
            $_SESSION['delete_fail']="Failed to Delete Blog";
            header('location:'.SITEURL.'admin/blogs.php');
        }
    }
    else
    {
        echo "Error";
    }
    
?>