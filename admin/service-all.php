<?php include('common/header.php');?>
<?php 

if(isset($_GET['id'])){
  $id = $_GET['id'];
}

if(isset($_POST['add_service'])){
  $service =$_POST['service'];
  $url = strtolower($service).".php";
  $content =$_POST['content'];
      $check = mysqli_query($conn,"SELECT * FROM service WHERE content='$content'");
      if($check<1){
        $msg = "Alrady Have service. Please Insert Another";
        header("location:service.php?msg=$msg");
      }else{
      $row = mysqli_query($conn,"INSERT INTO service(service,url,content) VALUE('$service','$url','$content')");
      if($row){
        $msg = "Successfully Create a New service";
        header("location:service.php?msg=$msg");
      }else{
        echo "Something error!";
      }
    }
}
?>
<main class="content_wrapper">
    <!--===== main page content =====-->
    <div class="content">
        <div class="container">
            <div class="page_content">
                <div class="dashboard_layout">
                    <?php include('common/sidebar.php');?>
                    <div class="dashboard_content">                       
                      
                        <div class="dc_box">
                            <div class="dc_box_header">
                                <div class="dc_box_container">
                                    <h6>
                                        <span class="text">All Services </span>
                                    </h6>
                                    <a href="service.php">Add Service</a>
                                </div>
                            </div>

                            <div class="dc_box_container">
                                <div class="input_area">
                                    <table class="table table-dark">
                                        <thead>
                                            <tr>
                                                <th>Sl.</th>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $showRecordPerPage = 10;
                                            if(isset($_GET['page']) && !empty($_GET['page'])){
                                                $currentPage = $_GET['page'];
                                            }else{
                                                $currentPage = 1;
                                            }
                                            $startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
                                            $totalEmpSQL = "SELECT * FROM service WHERE status='Publish' ORDER BY id DESC";
                                            $allEmpResult = mysqli_query($conn, $totalEmpSQL);
                                            $totalEmployee = mysqli_num_rows($allEmpResult);
                                            $lastPage = ceil($totalEmployee/$showRecordPerPage);
                                            $firstPage = 1;
                                            $nextPage = $currentPage + 1;
                                            $previousPage = $currentPage - 1;
                                            $empSQL = "SELECT * FROM service WHERE status='Publish' ORDER BY id DESC LIMIT $startFrom, $showRecordPerPage";
                                            $query = mysqli_query($conn, $empSQL);
                                            $i = 0;
                                            while($row = mysqli_fetch_assoc($query)){ $i++;?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <?php
                                                if(empty($row['file'])){ ?>
                                                <td style="padding-left:40px;padding-top:15px;">NO IMAGES</td>
                                             <?php }else{ ?>
                                                <td><img style="width:100px;height:50px;" src="../upload/<?php echo $row['file'];?>"></td>
                                              <?php  }?>
                                                <td><?php echo $row['title'];?></td>
                                                <td>
                                                     <a class="btn btn-success" href="service-edit.php?id=<?php echo $row['id'];?>">Edit</a>
                                                     <a class="btn btn-danger" href="delete.php?src=service-all&&id=<?php echo $row['id'];?>">Delete</a>
                                                     <a target="_blank" class="btn btn-success" href="../index.php?page=<?php echo $row['url'];?>">View</a>
                                                    
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="pagi" style="display: flex; justify-content: space-between;">
                            <nav>
                                <ul class="">
                                    <?php if($currentPage >= 2) { ?>
                                    <li class="pagination"><a class="page-link"
                                            href="?page=<?php echo $previousPage ?>">Previws</a>
                                    </li>
                                    <?php } ?>
                                    <?php if($currentPage != $firstPage) { ?>
                                    <li class="pagination">
                                        <a class="page-link" href="?page=<?php echo $firstPage ?>">
                                            <span class="page-link" aria-hidden="true">1</span>
                                        </a>
                                    </li>
                                    <?php } ?>

                                    <li class="pagination active"><a class="page-link active"
                                            href="?page=<?php echo $currentPage ?>"><?php echo $currentPage ?></a>
                                    </li>

                                    <?php if($currentPage < $lastPage) { ?>
                                    <li class="pagination "><a class="page-link"
                                            href="?page=<?php echo $currentPage+1 ?>"><?php echo $currentPage+1 ?></a>
                                    </li>
                                    <?php } ?>

                                    <?php if($currentPage < $lastPage) { ?>
                                    <li class="pagination "><a class="page-link"
                                            href="?page=<?php echo $currentPage+1+1 ?>"><?php echo $currentPage+1+1 ?></a>
                                    </li>
                                    <?php } ?>

                                    <?php if($currentPage < $lastPage) { ?>
                                    <li class="pagination "><a class="page-link"
                                            href="?page=<?php echo $currentPage+1+1+1 ?>"><?php echo $currentPage+1+1+1 ?></a>
                                    </li>
                                    <?php } ?>

                                    <?php if($currentPage < $lastPage) { ?>
                                    <li class="pagination"><a class="page-link"
                                            href="?page=<?php echo $nextPage ?>"><?php //echo $nextPage  ?>Next
                                            >></a></li>
                                    <?php } ?>

                                    <li class="pagination">
                                        <a class="page-link" href="?page=<?php echo $lastPage ?>" aria-label="Next">
                                            <span aria-hidden="true">Last</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            <div class="pagi_page">Page <?php echo $currentPage ?> of <?php echo $lastPage ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <?php include('common/footer.php');?>
        <?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>





        
