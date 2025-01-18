<div class="container">

    <div class="row">
        <div class="col-8">
            <h1 class="heading">Questions</h1>
            <?php
            include("./common/db.php");

            // Initialize variables to avoid undefined warnings
            $cid = $uid = $search = null;

            if (isset($_GET["c-id"])) {
                $cid = intval($_GET["c-id"]); // Safely cast to integer
                $query = "select * from questions where category_id=$cid";
            } else if (isset($_GET["u-id"])) {
                $uid = intval($_GET["u-id"]); // Safely cast to integer
                $query = "select * from questions where user_id=$uid";
            } else if (isset($_GET["latest"])) {
                $query = "select * from questions order by id desc";
            } else if (isset($_GET["search"])) {
                $search = htmlspecialchars($_GET["search"]); // Sanitize input for safety
                $query = "select * from questions where `title` LIKE '%$search%'";
            } else {
                $query = "select * from questions";
            }

            $result = $conn->query($query);

            foreach ($result as $row) {
                $title = $row['title'];
                $id = $row['id'];

                echo "<div class='row question-list'>";
                echo "<h4 class='my-question'><a href='?q-id=$id'>$title</a>";

                // Check if $uid is set to show the delete link
                echo $uid ? "<a href='./server/requests.php?delete=$id'>Delete</a>" : null;

                echo "</h4></div>";
            }
            ?>
        </div>
        <div class="col-4">
            <?php include('categorylist.php'); ?>
        </div>
    </div>
</div>
