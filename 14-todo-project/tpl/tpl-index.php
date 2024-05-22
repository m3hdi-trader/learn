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
      <div class="userPanel">
        <a href="<?= siteUrl("?logout=1") ?>"><i class="fa fa-sign-out-alt"></i></a>
        <span class="username"><?= getCurrentUser()->name ?></span>
        <img src="<?= getCurrentUser()->image ?>" width="40" height="40" />
      </div>
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
            <li class="<?= isset($_GET['folder_id']) ? 'active-all' : 'active' ?>">
              <a href="<?= siteUrl()  ?>">
                <i class="fa fa-folder"></i>All
              </a>
            </li>
            <?php foreach ($folders as $folder) : ?>
              <li class="<?= ($_GET['folder_id'] == $folder->id) ? 'active' : '' ?>">
                <a href="?folder_id=<?= $folder->id ?>">
                  <i class="fa fa-folder"></i><?= $folder->name ?>
                </a>
                <a class="remove" href="?delete_folder=<?= $folder->id ?>" onclick=" return confirm('Are you sure delete this item ?')">
                  <i class=" fa fa-trash"></i>
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
                    <i data-taskId="<?= $task->id ?>" style="cursor: pointer;" class="is_done fa <?= $task->is_done ? 'fa-square-check' : 'fa-square'; ?>"></i>
                    <span><?= $task->title ?></span>
                    <div class="info">
                      <span class="created-at">Created at <?= $task->created_at ?></span>
                      <a class="remove-task" href="?delete_task=<?= $task->id ?>" onclick="return confirm('Are you sure delete this item ?')">
                        <i class="fa fa-trash"></i>
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
      //region add folder
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
              $('<li><a href="?folder_id=#"><i class="fa fa-folder"></i>' + input.val() + '</a><a class="remove" href="?delete_dolder=1"><i class="fa fa-trash"></i></a></li>')
                .appendTo('ul.folderList')
              input.val("")
            } else {
              alert(response);
            }
          }
        });

      });
      //endregion 


      //region add task
      $('#addNewTask').on('keypress', function(e) {
        e.stopPropagation()
        if (e.which == 13) {
          $.ajax({
            url: "process/ajaxHandler.php",
            method: "post",
            data: {
              action: "addTask",
              folderId: <?= $_GET['folder_id'] ?? 0 ?>,
              taskTitle: $('#addNewTask').val()
            },
            success: function(response) {
              if (response === '1') {
                location.reload()
              } else {
                alert(response)
              }
            }
          });
        }
      })
      //endregion
      $('#addNewTask').focus();
      $('.is_done').click(function(e) {

        var tid = $(this).attr('data-taskId');

        $.ajax({
          url: "process/ajaxHandler.php",
          method: "post",
          data: {
            action: "doneSwitch",
            taskId: tid
          },
          success: function(response) {
            location.reload();
          }
        });


      })
    });
  </script>

</body>

</html>