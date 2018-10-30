<?php
require('header.php');
require('bdd.php'); ?>

<div class="container-fluid">
  <div class="row m-0 p-0">

<?php $list_req = $bdd->query('SELECT * FROM list WHERE project_id =' . $_GET['id'] );
while ($list = $list_req->fetch()) { ?>

          <!-- Add list -->
          <div class="card m-3">
            <div class="card-body">
              <h5 class="card-title"><?= $list['name']; ?></h5>

              <?php $task = $bdd->query('SELECT * FROM task WHERE list_id =' . $list['id']);
              while ($task_data = $task->fetch()) { ?>
                <p class="card-text"><?= $task_data['name'] ?></p>
              <?php } ?>

              <a href="list.php?page=list&id=<?= $list['id']; ?>" class="btn btn-primary">Details</a>
              <!-- Delete project -->
              <a class="btn btn-dark text-white ml-3" href="deletList.php?id=<?= $list['id']; ?>">Delete</a>
            </div>
          </div>
<?php } ?>
  </div>
</div>

<form method="post" action="addList.php?id=<?= $_GET['id'] ?>" class="mt-3 mb-3">
  <p>
    <label for="name_list">List name : </label><br>
    <input type="text" name="name_list" id="name_list" required/>
  </p>
    <input type="submit" value="Envoyer" />
</form>


<?php require('footer.php'); ?>
