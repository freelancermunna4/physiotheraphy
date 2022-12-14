    <footer class="main_footer">
        <div class="footer_container">
          <div class="footer_left">
          <?php echo $website['f_text'];?>
          </div>
          <ul class="footer_right">
            
            <li>
              <a href="tel:<?php echo $website['phone'];?>" style="color: #0072ffc9">
              <i class="fa-solid fa-square-phone"></i>
              </a>
            </li>
            <li>
              <a href="mailto:<?php echo $website['gmail'];?>" style="color: #0072ffc9">
              <i class="fa-solid fa-square-envelope"></i>
              </a>
            </li>
            <li>
              <a href="<?php echo $website['facebook'];?>" style="color: #0072ffc9">
              <i class="fa-brands fa-facebook"></i>
              </a>
            </li>

            <li>
              <a href="<?php echo $website['youtube'];?>" style="color: #0072ffc9">
              <i class="fa-brands fa-youtube"></i>
              </a>
            </li>
            
            <li>
              <a href="<?php echo $website['linkedin'];?>" style="color: #0072ffc9">
                <i class="fab fa-linkedin"></i>
              </a>
            </li>
          </ul>
        </div>
      </footer>

  <script>    
    $('#summernote').summernote({
    placeholder: 'Write here details',
    tabsize: 2,
    height: 200,
    toolbar: [
    ['style', ['style']],
    ['font', ['bold', 'underline', 'clear']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['table', ['table']],
    ['insert', ['link', 'picture', 'video']],
    ['view', ['fullscreen', 'codeview', 'help']]
    ]
});
  </script>

      </div>
    <!--===== main page content =====-->
  </main>
  <script src="js/main.js"></script>

</body>

</html>