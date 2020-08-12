            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php
                if (isset($_SESSION['active'])) {
                    # code...
                    echo $userInfo['name'];
                }
                ?></h2>
              </div>
            </div>