<?php

include_once 'includes/_header.php';
include_once './database/database.php';
include_once './database/checkinput.php';
if (isset($_GET['p']) && $_GET['p'] != '') {
} else {
    header('location:../shop');
    die();
}
$post = checkinput::check_string($_GET['p']);
$con = database::connection("shop", "", "localhost", 'root');
$sql = $con->prepare("SELECT * FROM post WHERE unic_title=:unic");
$sql->bindParam(":unic", $post);
$sql->execute();
if ($sql->rowCount() == 1) {
} else {
    header('location:../shop');
    die();
}
$id;
$auther;
$date;
$time;
$title;
$img;
$content;
$mata_name;
$mata_descript;
$tags = [];
$fname_auther;
$lname_auther;
$avatar;
$category;
$category_name;
$category_url;
foreach ($sql->fetchAll() as $data) {
    $id = (int)$data['id'];
    $auther = (int)$data['auther'];
    $date = $data['date'];
    $time = $data['time'];
    $title = $data['title'];
    $img = $data['image'];
    $content = $data['content'];
    $mata_name = $data['meta_name'];
    $mata_descript = $data['mata_description'];
}


$sql2 = $con->prepare("SELECT user.name,user.last_name,user.avatar FROM user WHERE id=:id");
$sql2->bindParam(":id", $auther);
$sql2->execute();
if ($sql2->rowCount() == 1) {
} else {
    header('location:../shop');
    die();
}

foreach ($sql2->fetchAll() as $data2) {
    $fname_auther = $data2['name'];
    $lname_auther = $data2['last_name'];
    $avatar = $data2['avatar'];
}

$sql3 = $con->prepare("SELECT tags.name FROM tags WHERE post_id=:id");
$sql3->bindParam(":id", $id);
$sql3->execute();

foreach ($sql3->fetchAll() as $data3) {
    $tags[] = $data3['name'];
}


$sql4 = $con->prepare("SELECT id_category FROM post_help_category WHERE id_post=:id");
$sql4->bindParam(":id", $id);
$sql4->execute();
$sql4->rowCount();
foreach ($sql4->fetchAll() as $data4) {
    $category = $data4['id_category'];
}


$sql5 = $con->prepare("SELECT post_category.title ,post_category.url FROM post_category WHERE id=:id");
$sql5->bindParam(":id", $category);
$sql5->execute();
foreach ($sql5->fetchAll() as $data5) {
    $category_name = $data5['title'];
    $category_url = $data5['url'];
}

?>

<!-- index-content -->

<div class="index">

    <div class="row">
        <div class="col-lg-3">

            <!-- sidebar -->
            <div class="sidebar">
                <?php include_once 'includes/_morpost.php' ?>

                <?php include_once 'includes/_sidebar.php' ?>
            </div>
        </div>
        <div class="col-lg-9">

            <div class="real-whay">
                <div class="text-whay">
                    <p>
                        <a href="./">خانه</a>
                        <i class="fa fa-angle-left" aria-hidden="true"></i> <a href="posts-category.php?category=all">مطالب</a>
                        <i class="fa fa-angle-left" aria-hidden="true"></i> <a
                        href="posts-category.php?category=<?php echo $category_url .'">'. $category_name; ?></a>
                        <i class="fa fa-angle-left" aria-hidden="true"></i> <?php echo $title; ?>
                    </p>
                </div>
            </div>

            <div class="box-post">
                <h2 class="title"><?php echo $title; ?></h2>
                <div class="row">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="aurther"><img class="aurther-img" src="images/testimo2.png" alt="">
                            <p><?php echo $fname_auther . ' ' . $lname_auther; ?></p>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                        <div class="date-post"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $date; ?>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                        <div class="visit"><i class="fa fa-eye" aria-hidden="true"></i> بازدید : 7273</div>
                    </div>
                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                        <div class="save"><i class="fa fa-heart-o" aria-hidden="true"></i> افزودن به علاقه مندی</div>
                    </div>
                </div>

                <img src="images/<?php echo $img; ?>" class="post-imge" alt="">
                <p class="p-content-blog">
                    <?php echo $content; ?>
                </p>


                <div class="tags">
                    <i class="fa fa-tags tags-icon" aria-hidden="true"></i>
                    <p class="tags-p">برچسب ها :</p>

                    <?php
                    foreach ($tags as $tag) {
                        echo '<a href="./search?s=' . $tag . '" target="_blank" class="tags-tagses">' . $tag . '</a>';
                    }
                    ?>

                </div>
            </div>

            <!-- slides-of-blogs -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="spetial-box">
                        <div class="spetial-box-head">
                            <p><i class="fa fa-link" aria-hidden="true"></i> مطالب مرتبط </p>
                            <div class="zel"></div>
                        </div>
                        <div class="slid-boxed slid-boxed3">
                            <div class="owl-carouself owl-carousel owl-theme">
                                <div class="item-blog">
                                    <a class="aproduct-box" href="#" target="_blank" title="">
                                        <span class="new-blog">جدید</span>
                                        <p class="link-to-go-aproduct-box"><a href="#">مشاهده <i class="fa fa-link"
                                                                                                 aria-hidden="true"></i></a>
                                        </p>
                                        <img class="item-blog-blog" src="images/size-300x181-what-is-Cloudflare.jpg"
                                             alt="">
                                        <img class="item-blog-blog-auther" src="images/testimo2.png" alt="">
                                        <span class="item-blog-blog-auther-name">علیرضا دورقیان اصل</span>
                                        <h2 class="item-blog-blog-title">آموزش ساخت گوگل اکانت</h2>
                                        <p class="item-blog-blog-mor-to-now">سلام من علی رضا دورقیان هستم و قصد دارم تا
                                            در این صفحه وب مهارت خود را راستی آزمایی کنم و همچنیین...</p>
                                        <div class="item-blog-blog-box-time">
                                            <p class="item-blog-blog-box-time-time"> 1397/05/14 <i class="fa fa-clock-o"
                                                                                                   aria-hidden="true"></i>
                                            </p>
                                            <p class="item-blog-blog-box-time-categorey"> آموزشی <i class="fa fa-list"
                                                                                                    aria-hidden="true"></i>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                <div class="item-blog">
                                    <a class="aproduct-box" href="#" target="_blank" title=""><span class="new-blog">جدید</span>
                                        <p class="link-to-go-aproduct-box"><a href="#">مشاهده <i class="fa fa-link"
                                                                                                 aria-hidden="true"></i></a>
                                        </p>
                                        <img class="item-blog-blog"
                                             src="images/size-300x181-what-is-url-redirect-and-how-does-it-work.jpg"
                                             alt="">
                                        <img class="item-blog-blog-auther" src="images/testimo2.png" alt="">
                                        <span class="item-blog-blog-auther-name">علیرضا دورقیان اصل</span>
                                        <h2 class="item-blog-blog-title">آموزش ساخت گوگل اکانت</h2>
                                        <p class="item-blog-blog-mor-to-now">سلام من علی رضا دورقیان هستم و قصد دارم تا
                                            در این صفحه وب مهارت خود را راستی آزمایی کنم و همچنیین...</p>
                                        <div class="item-blog-blog-box-time">
                                            <p class="item-blog-blog-box-time-time"> 1397/05/14 <i class="fa fa-clock-o"
                                                                                                   aria-hidden="true"></i>
                                            </p>
                                            <p class="item-blog-blog-box-time-categorey"> آموزشی <i class="fa fa-list"
                                                                                                    aria-hidden="true"></i>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                <div class="item-blog">
                                    <a class="aproduct-box" href="#" target="_blank" title=""><span class="new-blog">جدید</span>
                                        <p class="link-to-go-aproduct-box"><a href="#">مشاهده <i class="fa fa-link"
                                                                                                 aria-hidden="true"></i></a>
                                        </p>
                                        <img class="item-blog-blog" src="images/dijital_kala.png" alt="">
                                        <img class="item-blog-blog-auther" src="images/testimo2.png" alt="">
                                        <span class="item-blog-blog-auther-name">علیرضا دورقیان اصل</span>
                                        <h2 class="item-blog-blog-title">آموزش ساخت گوگل اکانت</h2>
                                        <p class="item-blog-blog-mor-to-now">سلام من علی رضا دورقیان هستم و قصد دارم تا
                                            در این صفحه وب مهارت خود را راستی آزمایی کنم و همچنیین...</p>
                                        <div class="item-blog-blog-box-time">
                                            <p class="item-blog-blog-box-time-time"> 1397/05/14 <i class="fa fa-clock-o"
                                                                                                   aria-hidden="true"></i>
                                            </p>
                                            <p class="item-blog-blog-box-time-categorey"> آموزشی <i class="fa fa-list"
                                                                                                    aria-hidden="true"></i>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                <div class="item-blog">
                                    <a class="aproduct-box" href="#" target="_blank" title=""><span class="new-blog">جدید</span>
                                        <p class="link-to-go-aproduct-box"><a href="#">مشاهده <i class="fa fa-link"
                                                                                                 aria-hidden="true"></i></a>
                                        </p>
                                        <img class="item-blog-blog"
                                             src="images/size-300x181-what-is-url-redirect-and-how-does-it-work.jpg"
                                             alt="">
                                        <img class="item-blog-blog-auther" src="images/testimo2.png" alt="">
                                        <span class="item-blog-blog-auther-name">علیرضا دورقیان اصل</span>
                                        <h2 class="item-blog-blog-title">آموزش ساخت گوگل اکانت</h2>
                                        <p class="item-blog-blog-mor-to-now">سلام من علی رضا دورقیان هستم و قصد دارم تا
                                            در این صفحه وب مهارت خود را راستی آزمایی کنم و همچنیین...</p>
                                        <div class="item-blog-blog-box-time">
                                            <p class="item-blog-blog-box-time-time"> 1397/05/14 <i class="fa fa-clock-o"
                                                                                                   aria-hidden="true"></i>
                                            </p>
                                            <p class="item-blog-blog-box-time-categorey"> آموزشی <i class="fa fa-list"
                                                                                                    aria-hidden="true"></i>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                <div class="item-blog">
                                    <a class="aproduct-box" href="#" target="_blank" title=""><span class="new-blog">جدید</span>
                                        <p class="link-to-go-aproduct-box"><a href="#">مشاهده <i class="fa fa-link"
                                                                                                 aria-hidden="true"></i></a>
                                        </p>
                                        <img class="item-blog-blog" src="images/size-300x181-what-are-meta-tags.jpg"
                                             alt="">
                                        <img class="item-blog-blog-auther" src="images/testimo2.png" alt="">
                                        <span class="item-blog-blog-auther-name">علیرضا دورقیان اصل</span>
                                        <h2 class="item-blog-blog-title">آموزش ساخت گوگل اکانت</h2>
                                        <p class="item-blog-blog-mor-to-now">سلام من علی رضا دورقیان هستم و قصد دارم تا
                                            در این صفحه وب مهارت خود را راستی آزمایی کنم و همچنیین...</p>
                                        <div class="item-blog-blog-box-time">
                                            <p class="item-blog-blog-box-time-time"> 1397/05/14 <i class="fa fa-clock-o"
                                                                                                   aria-hidden="true"></i>
                                            </p>
                                            <p class="item-blog-blog-box-time-categorey"> آموزشی <i class="fa fa-list"
                                                                                                    aria-hidden="true"></i>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                <div class="item-blog">
                                    <a class="aproduct-box" href="#" target="_blank" title=""><span class="new-blog">جدید</span>
                                        <p class="link-to-go-aproduct-box"><a href="#">مشاهده <i class="fa fa-link"
                                                                                                 aria-hidden="true"></i></a>
                                        </p>
                                        <img class="item-blog-blog" src="images/rhnmy-khryd-lwzm-khngy-1.png" alt="">
                                        <img class="item-blog-blog-auther" src="images/testimo2.png" alt="">
                                        <span class="item-blog-blog-auther-name">علیرضا دورقیان اصل</span>
                                        <h2 class="item-blog-blog-title">آموزش ساخت گوگل اکانت</h2>
                                        <p class="item-blog-blog-mor-to-now">سلام من علی رضا دورقیان هستم و قصد دارم تا
                                            در این صفحه وب مهارت خود را راستی آزمایی کنم و همچنیین...</p>
                                        <div class="item-blog-blog-box-time">
                                            <p class="item-blog-blog-box-time-time"> 1397/05/14 <i class="fa fa-clock-o"
                                                                                                   aria-hidden="true"></i>
                                            </p>
                                            <p class="item-blog-blog-box-time-categorey"> آموزشی <i class="fa fa-list"
                                                                                                    aria-hidden="true"></i>
                                            </p>
                                        </div>
                                    </a>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="coments-post">
                <div class="spetial-box-head">
                    <p><i class="fa fa-comments-o" aria-hidden="true"></i> نظرات </p>
                    <div class="zel"></div>
                </div>
                <b>
                    <p>دیدگاه خود را درباره نصب بازی بنویسید</p>
                </b>
                <form class="comments-posts-form" action="index.php" method="post">
                    <div class="row">
                        <div class="col-lg-6"><input type="text" class="comments-posts-form-names" name="" value=""
                                                     placeholder="نام"></div>
                        <div class="col-lg-6"><input type="text" class="comments-posts-form-email" name="" value=""
                                                     placeholder="ایمیل"></div>
                    </div>
                    <textarea name="name" placeholder="متن دیدگاه" rows="8" cols="80"
                              class="comments-posts-form-textarea"></textarea>

                    <input type="submit" name="" class="comments-posts-form-submit" value="ثبت نظر ارزشمند شما">

                </form>

            </div>


            <!-- comment-users -->
            <div class="coments-post allcoments">
                <div class="coment-user">
                    <img src="images/testimo2.png" class="coment-user-img">
                    <b>
                        <p class="name-users-comments">حمدید جلالی</p>
                    </b> <span class="date-comments">1398/05/30</span>
                    <p class="name-users-comments-contents">ه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای
                        شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای
                        زیادی در شصت و سه درصد گذشته، حال </p>
                    <button type="button" name="button">پاسخ</button>

                    <div class="like-post">
                        <div class="fhand fhand2"><span>25</span><i class="fa fa-thumbs-down ifhand2"
                                                                    aria-hidden="true"></i></div>
                        <div class="fhand fhand1"><span>25</span><i class="fa fa-thumbs-up ifhand1"
                                                                    aria-hidden="true"></i></div>
                    </div>
                </div>
                <div class="coment-user">
                    <img src="images/testimo2.png" class="coment-user-img">
                    <b>
                        <p class="name-users-comments">حمدید جلالی</p>
                    </b> <span class="date-comments">1398/05/30</span>
                    <p class="name-users-comments-contents">ه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای
                        شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای
                        زیادی در شصت و سه درصد گذشته، حال </p>
                </div>
                <div class="coment-user">
                    <img src="images/testimo2.png" class="coment-user-img">
                    <b>
                        <p class="name-users-comments">حمدید جلالی</p>
                    </b> <span class="date-comments">1398/05/30</span>
                    <p class="name-users-comments-contents">ه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای
                        شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای
                        زیادی در شصت و سه درصد گذشته، حال </p>
                </div>
                <div class="coment-user">
                    <img src="images/testimo2.png" class="coment-user-img">
                    <b>
                        <p class="name-users-comments">حمدید جلالی</p>
                    </b> <span class="date-comments">1398/05/30</span>
                    <p class="name-users-comments-contents">ه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای
                        شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای
                        زیادی در شصت و سه درصد گذشته، حال </p>
                </div>
                <div class="coment-user">
                    <img src="images/testimo2.png" class="coment-user-img">
                    <b>
                        <p class="name-users-comments">حمدید جلالی</p>
                    </b> <span class="date-comments">1398/05/30</span>
                    <p class="name-users-comments-contents">ه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای
                        شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای
                        زیادی در شصت و سه درصد گذشته، حال </p>
                </div>
                <div class="coment-user">
                    <img src="images/testimo2.png" class="coment-user-img">
                    <b>
                        <p class="name-users-comments">حمدید جلالی</p>
                    </b> <span class="date-comments">1398/05/30</span>
                    <p class="name-users-comments-contents">ه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای
                        شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای
                        زیادی در شصت و سه درصد گذشته، حال </p>
                </div>
                <div class="coment-user">
                    <img src="images/testimo2.png" class="coment-user-img">
                    <b>
                        <p class="name-users-comments">حمدید جلالی</p>
                    </b> <span class="date-comments">1398/05/30</span>
                    <p class="name-users-comments-contents">ه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای
                        شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای
                        زیادی در شصت و سه درصد گذشته، حال </p>
                </div>


                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">قبلی</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item last-item">
                            <a class="page-link" href="#">بعدی</a>
                        </li>
                    </ul>
                </nav>


            </div>


        </div>
    </div>


</div>
<!-- the-footer -->
<?php include_once 'includes/_footer.php' ?>
<script>
    $('title').html('<?php echo $title?>');
</script>
</body>
</html>