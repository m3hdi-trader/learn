<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title><?= SITE_TITLE ?></title>
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">

</head>

<body>
  <!-- partial:index.partial.html -->
  <div class="page">
    <div class="pageHeader">
      <div class="title">Dashboard</div>
      <div class="userPanel"><i class="fa fa-chevron-down"></i><span class="username">John Doe </span><img src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/73.jpg" width="40" height="40" /></div>
    </div>
    <div class="main">
      <div class="nav">
        <div class="searchbox">
          <div><i class="fa fa-search"></i>
            <input type="search" placeholder="Search" />
          </div>
        </div>
        <div class="menu">
          <div class="title">Folders</div>
          <ul class="folderList">
            <li class="<?= isset($_GET['folder_id']) ? 'active-all' : 'active' ?>"> <i class="fa fa-folder"></i>All</li>
            <?php foreach ($folders as $folder) : ?>
              <li class="<?= ($_GET['folder_id'] == $folder->id) ? 'active' : '' ?>">
                <a href="?folder_id=<?= $folder->id ?>">
                  <i class="fa fa-folder"></i><?= $folder->name ?>
                </a>
                <a class="remove" href="?delete_folder=<?= $folder->id ?>" onclick=" return confirm('Are you sure delete this item ?')">
                  <i class=" fa-solid fa-xmark"></i>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>

        </div>
        <div>
          <input type="text" class="input-add-new-folder" id="addNewFolder" placeholder="Add New Folder" />
          <button id="addNewBtn" class="btn clickable">+</button>
        </div>
      </div>
      <div class="view">
        <div class="viewHeader">
          <div class="title">
            <input type="text" class="input-add-new-task" id="addNewTask" placeholder="Add New Task" />
          </div>
          <div class="functions">
            <div class="button active">Add New Task</div>
            <div class="button">Completed</div>
          </div>
        </div>
        <div class="content">
          <div class="list">
            <div class="title">Today</div>
            <ul>
              <?php if (sizeof($tasks) > 0) : ?>
                <?php foreach ($tasks as $task) : ?>
                  <li class="<?= $task->is_done ? 'checked' : ''; ?> ">
                    <i class="fa-regular <?= $task->is_done ? 'fa-square-check' : 'fa-square'; ?>"></i>
                    <span><?= $task->title ?></span>
                    <div class="info">
                      <span class="created-at">Created at <?= $task->created_at ?></span>
                      <a class="remove-task" href="?delete_task=<?= $task->id ?>" onclick="return confirm('Are you sure delete this item ?')">
                        <i class="fa-solid fa-xmark"></i>
                      </a>
                    </div>
                  </li>
                <?php endforeach; ?>
              <?php else : ?>
                <li>No Tasks here...</li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="assets/js/script.js"></script>

  <script>
    $(document).ready(function() {
      $('#addNewBtn').click(function(e) {
        var input = $('input#addNewFolder');
        $.ajax({
          url: "process/ajaxHandler.php",
          method: "post",
          data: {
            action: "addFolder",
            folderName: input.val()
          },
          success: function(response) {
            if (response == 1) {
              $('<li><a href="?folder_id=#"><i class="fa fa-folder"></i>' + input.val() + '</a><a class="remove" href="?delete_dolder=1"><i class="fa-solid fa-xmark"></i></a></li>')
                .appendTo('ul.folderList')
              input.val("")
            } else {
              alert(response);
            }
          }
        });

      });
    });
  </script>

</body>

</html>