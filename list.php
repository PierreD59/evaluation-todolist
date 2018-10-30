<?php
require('header.php');
require('bdd.php'); ?>

<div class="container-fluid mt-3 mb-5">
  <div class="row m-0 p-0">

<?php $reponse = $bdd->query('SELECT task.id, task.name, task.finished, content, deadline, list_id FROM task WHERE task.list_id = ' . $_GET['id']);
  $donnees = $reponse->fetchAll();
    foreach ($donnees as $key => $task) { ?>

            <!-- Add task -->
          <div class="card m-5">
            <div class="card-body">
              <h5 class="card-title"><?= $task['name']; ?></h5>
              <div class="d-flex flex-column card-text">
                <p class="content"><?= $task['content']; ?></p>
                <p class="deadline">Deadline : <?= $task['deadline']; ?></p>
              </div>
              <div>
                <!--valid Task -->
                <form class="d-inline" method="post" action="validTask.php?id=<?= $task['id'] ?>&list_id=<?= $_GET['id'] ?>">
                    <?php if ($task['finished'] == true) { ?>
                        <input name="finished" type="hidden" value="0">
                        <input name="submit" id="btn-valid" class="btn btn-success" type="submit" value="Finished">
                    <?php } else { ?>
                        <input name="finished" type="hidden" value="1">
                        <input name="submit" id="btn-reset" class="btn btn-danger" type="submit" value="Working">
                    <?php } ?>
                </form> 
                <!-- Delete project -->
                <a class="btn btn-dark text-white ml-3" href="deletTask.php?id=<?= $task['id'] ?>&list_id=<?= $_GET['id'] ?>">Delete</a>
              </div>
            </div>
          </div>
    <?php } ?>
  </div>
</div>



<form method="post" action="addTask.php?id=<?= $_GET['id'] ?>" class="mb-3 mt-3">
  <p>
    <label for="name_task">Task name : </label><br>
    <input type="text" name="name_task" id="name_task" required/>
  </p>
    <p>
    <label for="content">Content : </label><br>
    <input type="text" name="content" id="content" required/>
  </p>
    <p>
    <label for="deadline">Deadline : </label> <br>
    <input type="date" name="deadline" id="deadline" required/>
  </p>
  
    <input type="submit" value="Envoyer" />
</form>
<?php require('footer.php'); ?>