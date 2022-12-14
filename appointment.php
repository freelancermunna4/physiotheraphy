<?php include('common/header.php');?>
<?php 
if(isset($_POST['save'])){
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $message = $_POST['message'];
  $date = $_POST['date'];
  $time = time();

  $file_name = $_FILES['file']['name'];
  $file_tmp = $_FILES['file']['tmp_name'];
  move_uploaded_file($file_tmp,"upload/$file_name");

  $sql = "INSERT INTO appointment( `name`, `phone`, `email`, `address`, `message`, `date`, `time`, `file`) VALUE('$name','$phone','$email','$address','$message','$date','$time','$file_name')";
  $query = mysqli_query($conn,$sql);
  if($query){
    $msg = "Successfully Appointed";
    header("location:appointment.php?msg=$msg");
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

                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="dc_box_container">
                                        <h6>
                                            <span class="text">Appointment Now</span>
                                        </h6> 
                                    </div>
                            </div>

                            <div class="dc_box_container">

                                <div>
                                    <label for="twitter_p">Full Name</label>
                                    <div class="base_input_icon">
                                        <div class="icon"><span><i class="fa-solid fa-file-signature"></i></span></div>
                                        <input required name="name" type="text" placeholder="Ex: John Doa" />
                                    </div>
                                </div>
                                <br />

                                <div>
                                    <label for="twitter_p"> Phone</label>
                                    <div class="base_input_icon">
                                        <div class="icon"><span><i class="fa-solid fa-phone"></i></span></div>
                                        <input required name="phone" type="text" placeholder="Ex: 01......" />
                                    </div>
                                </div>
                                <br />

                                <div>
                                    <label for="twitter_p"> Email (optional)</label>
                                    <div class="base_input_icon">
                                        <div class="icon"><span><i class="fa-solid fa-envelope"></i></span></div>
                                        <input name="email" type="text" placeholder="Ex: example.gmail.com" />
                                    </div>
                                </div>
                                <br />

                                <div>
                                    <label for="twitter_p"> Address</label>
                                    <div class="base_input_icon">
                                        <div class="icon"><span><i class="fa-solid fa-location-dot"></i></span></div>
                                        <input required name="address" type="text" placeholder="Ex: Road#46, House#34, Gulshan-2, Dhaka-1212, Bangladesh" />
                                    </div>
                                </div>
                                <br />

                                <div>
                                    <label for="twitter_p"> Date (optional)</label>
                                    <div class="base_input_icon">
                                        <div class="icon"><span><i class="fa-regular fa-calendar"></i></span></div>
                                        <input name="date" type="date" />
                                    </div>
                                </div>
                                <br />

                                <div>
                                    <label for="twitter_p">Discribe Your Problem</label>
                                    <div class="base_input_icon">
                                    <textarea required name="message" class="textarea" placeholder=""></textarea>
                                    </div>
                                </div>
                                <br />  

                                <div>
                                    <label for="twitter_p">Upload Your Recent Prescription (optional)</label>
                                    <div class="base_input_icon">
                                        <input type="file" name="file" style="margin:0;padding:0;padding-top:10px;padding-left:10px;">
                                    </div>
                                </div>
                                <br />   

                                <input name="save" type="submit" class="base_btn" value="Appointment Now" />
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </main> 
        <?php include('common/footer.php');?>
        <?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>
