<?php include_once 'includes/_header.php' ?>

  <!-- index-content -->
  <div class="index connect">

    <div class="connectus">
      <p class="connect-us-i-p">ارتباط با ما</p>
      <p class="connect-us-i-p connect-us-i-p2">شما می توانید از طریق فرم زیر با ما در ارتباط باشد</p>
      <img class="connect-us-i" src="images/web-support.jpg">
      <div class="form-connect">

        <div class="row border-connectus">
          <form class="col-lg-12 connectus-form" action="index.php" method="post">

            <div class="class-lable"><label for="connect-us-name" class="inpute-connect-us-lable">نام</label>
              <input type="text" class="inpute-connect-us" id="connect-us-name" name="" value="" placeholder="لطفا نام خود را به درستی وارد کنید">
            </div>
            <div class="class-lable"><label for="connect-us-phone" class="inpute-connect-us-lable">تلفن</label>
              <input type="text" class="inpute-connect-us" id="connect-us-phone" name="" value="" placeholder="لطفا تلفن خود را به درستی وارد کنید">
            </div>
            <div class="class-lable"><label for="connect-us-email" class="inpute-connect-us-lable">ایمیل</label>
              <input type="text" class="inpute-connect-us" id="connect-us-email" name="" value="" placeholder="لطفا ایمیل خود را به درستی وارد کنید">
            </div>
            <div class="class-lable"><label for="connect-us-subject" class="inpute-connect-us-lable">موضوع</label>
              <input type="text" class="inpute-connect-us" id="connect-us-subject" name="" value="" placeholder="لطفا موضوع پیام خود را وارد کنید">
            </div>
            <div class="class-lable"><label for="connect-us-info" class="inpute-connect-us-lable">توضیحات</label>
              <textarea class="inpute-connect-us" id="connect-us-info" name="" value="" placeholder="پیغام ود را وارد کنید" rows="8" cols="80"></textarea>
            </div>

            <div class="row">
              <div class="col-lg-3">
                <div class="class-lable"><label for="connect-us-email" class="inpute-connect-us-lable">کد تایید</label>
                  <input type="text" class="sequrty-cod" id="connect-us-emails" name="" value="" placeholder="لطفا کد تمنیتی را وارد کنید">
                </div>
              </div>
              <div class="col-lg-3"><img class="sequrty-cod-img" src="images/size-300x181-what-is-Cloudflare.jpg"></div>
              <div class="col-lg-6">
                <input type="submit" name="" value="ارسال فرم پشتیبانی" class="send-form">
              </div>
            </div>

          </form>
        </div>

      </div>
    </div>

  </div>


<!-- the-footer -->
  <?php include_once 'includes/_footer.php' ?>
</body>
</html>
