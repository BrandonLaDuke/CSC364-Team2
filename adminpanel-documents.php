<?php require "header.php"; ?>
<main>
  <?php if (isset($_SESSION['userId']) && $_SESSION['admin']) { ?>

    <!-- Admin Edit Games page start -->

    <section class="control-panel-eg">
      <div class="cp-nav">
        <ul>
          <li><a href="adminpanel.php">Control Panel Home</a></li>
          <li><a href="adminpanel-edit-games.php">Edit Games</a></li>
          <li><a href="adminpanel-edit-platforms.php">Edit Platforms</a></li>
          <li><a href="adminpanel-edit-faq.php">Edit FAQ</a></li>
          <li><a href="adminpanel-documents.php">Project Documents</a></li>
        </ul>
      </div>

      <div class="cp-edit docs">
        <h1 class="head-txt">Project Documents</h1>
        <ul>
          <li><a href="docs/Project_Manual_2.docx">Project Manual</a></li>
          <li><a href="docs/Project_Summary.docx">Project Summary</a></li>
          <li><a href="docs/csc364_bdurham_week_3.pdf">Context Level Diagram</a></li>
          <li><a href="docs/week_8.pdf">Data Flow Diagram</a></li>
          <li><a href="docs/week_9.pdf">Activity Diagram</a></li>
        </ul>
      </div>
    </section>




    <!-- Admin Edit Games page end -->

  <?php } else {
          header("Location: index.php");
          exit();
        } ?>
</main>
<?php require "footer.php"; ?>
