<?php require('header.php'); 
require('bdd.php'); ?>

  <div class="container-fluid mt-3">
    <div class="row m-0 p-0">
<?php 
$reponse = $bdd->query('SELECT * FROM project ORDER BY id');
  $donnees = $reponse->fetchAll();
    foreach ($donnees as $value) { ?>
      <!-- Select project -->
          <div class="card m-3">
            <div class="card-body">
              <h5 class="card-title"><?= $value['name']; ?></h5>
              <p class="card-text"><?= $value['content']; ?></p>
              <p class="deadline">Deadline : <?= $value['deadline']; ?></p>
              <a href="project.php?page=project&id=<?= $value['id']; ?>" class="btn btn-primary">Details</a>
              <!-- Delete project -->
              <a class="btn btn-dark text-white ml-3" href="deletProject.php?id=<?= $value['id']; ?>">Delete</a>
            </div>
          </div>
    <?php } ?>
  </div>
</div>

<form method="post" action="addProject.php" class="mt-3">
  <p>
    <label for="name">Project name : </label><br>
    <input type="text" name="name" id="name" required/>
  </p>
  <p>
    <label for="content">Content : </label> <br>
    <input type="text" name="content" id="content" required/>
  </p>
  <p>
    <label for="deadline">Deadline : </label> <br>
    <input type="date" min="<?= date("Y-m-d"); ?>" name="deadline" id="deadline" required/>
  </p>
  <input type="submit" value="Envoyer" />
</form>

<?php require('footer.php');