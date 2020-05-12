<?php $hasil=$data[0]?>
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit User <?=$hasil["name"]?></h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
        <form method="POST" action="<?=base_url()?>user/editAction">
            <div class="form-group">
            <label for="exampleInputPassword1">Nama</label>
            <input type="text" class="form-control" id="exampleInputPassword1" value="<?=$hasil['name']?>" name="name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$hasil['email']?>" name="email">
                </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
            </div>
            <input type="hidden" name="id" value="<?=$hasil["id"]?>">

            <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
