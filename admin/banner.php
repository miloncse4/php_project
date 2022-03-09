<?php
    session_start();
    require_once'../inc/header.php';
    require_once'../db.php';
    require_once'navbar.php';

    $get_banner_query = "SELECT * FROM banners";
    $db_query = mysqli_query($db_conect,$get_banner_query);

?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                  <div class="card mt-4">
                      <div class="card-header">
                          <h5 class="card-title">Card banner add from</h5>
                      </div>
                      <div class="card-body">
                              <form action="banner_poster.php" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="sub_title" placeholder="sub_title" />
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="title_top" placeholder="title_top"/>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="title_bottom" placeholder="title_bottom"/>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="detail" placeholder="detail"/>
                                </div>
                                <div class="mb-3">
                                    <input type="file" class="form-control" name="banner_image" />
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary w-100">Add</button>
                                </div>
                            </form>         
                      </div>
                  </div>  
            </div>
            <div class="col-lg-9">
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="card-title">Banner</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>sub_title</td>
                                    <td>title_top</td>
                                    <td>title_bottom</td>
                                    <td>detail</td>
                                    <td>image_location</td>
                                    <td>active_status</td>
                                    <td>acation</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($db_query as $query_data):?>
                                <tr>
                                    <td><?=$query_data['sub_title']?></td>
                                    <td><?=$query_data['title_top']?></td>
                                    <td><?=$query_data['title_bottom']?></td>
                                    <td><?=$query_data['detail']?></td>
                                    <td>
                                        <img src="../<?=$query_data['image_location']?>" style="width:100px;">
                                </td>
                                <td>-</td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once'../inc/footer.php'; ?>