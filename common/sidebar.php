<div class="dashboard_sidebar">



    <div class="dashboard_sidebar_item">
        <!-- <h6 class="ds_title" data-ref="setting">
                  <span style="font-size:20px;font-weight:bolder;" class="text"> Physiotherapy Tretment</span>
                  <span class="icon"><i class="fa-solid fa-chevron-down"></i></span>
                </h6> -->
        <ul class="ds_ul" data-ref="setting">
            <?php
            $disease = mysqli_query($conn, "SELECT * FROM disease WHERE status='Publish'");
            while ($row = mysqli_fetch_assoc($disease)) { ?>
            <li><a href="index.php?page=<?php echo $row['url'] ?>"><i class="fa fa-user"></i>
                    <span><?php echo $row['disease'] ?></span></a></li>
            <?php } ?>

        </ul>
    </div>

</div>