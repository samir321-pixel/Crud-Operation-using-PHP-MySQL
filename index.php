<?php
$servername=  "localhost";
$username="root";
$password="sam123";
$database="dbsamir";
$insert = false;
$update = false;
$delete = false;
$conn=mysqli_connect($servername, $username, $password, $database);
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `demo1` WHERE `demo1`.`id` = $id";
  $result = mysqli_query($conn, $sql);
}


if ($_SERVER['REQUEST_METHOD']=='POST'){
if (isset($_POST['snoEdit'])){
  $id=$_POST['snoEdit'];
  $Title=$_POST['TitleEdit'];
  $Notes=$_POST['NotesEdit'];
    // Sql query to be executed
  $sql="UPDATE `demo1` SET `Title` = '$Title' , `Notes` = '$Notes' WHERE `demo1`.`id` = $id ";
  $result=mysqli_query($conn, $sql);
  if($result){
    $update = true;
}
else{
    echo "We could not update the record successfully";
}
}

else{
    $Title=$_POST['Title'];
    $Notes=$_POST['Notes'];
    $sql="INSERT INTO `demo1` ( `title`, `notes`) VALUES ('$Title', '$Notes')";
    $result=mysqli_query($conn, $sql);

if ($result){
  $insert = true;
}
else{
 echo '<div class="alert alert-danger" role="alert">
 Hello, Sir! Your Record is not inserted Successfully!!
</div>'; 
}
}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
   
    <title>PHP PROJECT BY SAMIR</title>


  </head>
  <body >


  <!-- MOdal -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="editmodallabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editmodallabel">Edit Notes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <form action="/phpmyadmin/samir/index.php" method="post">
          <input type="hidden" name="snoEdit" id="snoEdit">
          <div class="form-group">
          <label for="exampleFormControlInput1">New Title</label>
          <input type="text" class="form-control" id="TitleEdit" name="TitleEdit" placeholder=" ">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Notes</label>
          <textarea class="form-control" id="NotesEdit" name="NotesEdit" rows="3"></textarea>
        </div class="modal-footer">
        <button type="submit" class="btn btn-primary mb-2">Update Note</button>
        <button type="button" class="btn btn-warning mb-2"  data-dismiss="modal">Close</button>
          </form>

      </div>
      
    </div>
  </div>
</div>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">INote By Samir</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="https://www.facebook.com/sameer.saitwal/">Facebook <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://github.com/samir321-pixel">GitHub</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://twitter.com/SaitwalSamir">Twitter</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://www.instagram.com/chococookey/">Instagram</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://in.pinterest.com/C_riminal/boards/">Pinterest</a>
      </li>
    
     
    </ul>
   
  </div>
</nav>

<?php
  if($insert){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been inserted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  <?php
  if($delete){
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";}
  ?>
  <?php
  if($update){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been updated successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>"; }?>



<div class="container mt-1">
<h1 > Add Notes Here </h1>
    <form action="/phpmyadmin/samir/index.php" method="post">
    <div class="form-group">
    <label for="exampleFormControlInput1">New Title</label>
    <input type="text" class="form-control" id="Title" name="Title" placeholder=" ">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Notes</label>
    <textarea class="form-control" id="Notes" name="Notes" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary mb-2">Add Note</button>
    </form>
</div>



<div class="container mt-1">

<table              class="table" id="myTable">
  <thead class="thead-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">Title</th>
      <th scope="col">Note</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody >
    <?php
    $sql=" SELECT * FROM `demo1`";
    $result=mysqli_query($conn, $sql);
    $num=mysqli_num_rows($result); ;  
        // We can fetch in a better way using the while loop
        $sno=0;
        while($row = mysqli_fetch_assoc($result)){
          $sno=$sno+1;
           echo "<tr>
                <th scope='row'>".$sno."</th>
                <td>".$row['Title']."</td>
                <td>".$row['Notes']."</td>
                <td> <button style='margin:5px;' class='edit btn btn-sm btn-primary' id=".$row['id'].">Edit</button> <button style='margin:5px;' class='delete btn btn-sm btn-danger' id=d".$row['id'].">Delete</button>  </td>
              </tr>";
        }
    ?>
  </tbody>
</table>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>
  <script>
    edits=document.getElementsByClassName('edit');
    Array.from(edits).forEach((element)=>{
      element.addEventListener("click",(e)=>{
        console.log("edit");
        tr=e.target.parentNode.parentNode;
        Title=tr.getElementsByTagName("td")[0].innerText;
        Notes=tr.getElementsByTagName("td")[1].innerText;
        console.log(Title,Notes);
        NotesEdit.value=Notes;
        TitleEdit.value=Title;
        snoEdit.value=e.target.id;
        console.log(e.target.id);
        $('#editmodal').modal('toggle')
      })
    })

    deletes=document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element)=>{
      element.addEventListener("click",(e)=>{
        console.log("Delete");
        sno=e.target.id.substr(1);
        
        if(confirm("Press a button!")){
          console.log("yes");
          window.location='/phpmyadmin/samir/index.php?delete=${sno}';
        }
        else
        {
          console.log("no");
        }
      })
    })
  </script>
  </body>
</html>