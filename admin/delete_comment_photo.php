<?php include("includes/init.php"); 

if(!$session->is_signed_in()) {redirect("login.php"); }
?>

<?php

if(empty($_GET['id'])) {
    redirect("comments.php");


}else{

    $comment = Comment::find_by_id($_GET['id']);

    if($comment){

        $comment->delete();
        $session->message("The comment with {$comment->id} id has been deleted");
        redirect("comment_photo.php?id={$_GET['id']}");
    }else{
        redirect("comment_photo.php?id={$comment->photo_id}");
    }

   
}





?>