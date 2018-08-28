<?php include 'header.php' ?>
             <!-- Large modal -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Tambah Caleg</h4>
                    </div>
                    <div class="modal-body">
                        <form  action="<?php echo base_url() ?>caleg/relawan_add" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Caleg</label>
                                <select class="form-control" name='id_caleg'>
                                    <option>- Pilih -</option>
                                    <?php
                                        foreach($list_caleg->result() as $opt_caleg){
                                            echo "<option value='".$opt_caleg->id_caleg."'>".$opt_caleg->nama_caleg."</option>";
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Relawan</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="nama_relawan" placeholder="Nama" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="pass" placeholder="Password" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-sm">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="right_col" role="main">
          <div class="row">
            <div class="x_panel">
                <div class="x_title">
                <h2>Relawan Caleg <small>___</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bs-example-modal-lg">Tambah</button>
                </ul>
                    <div class="clearfix">
                        
                    </div>
                </div>
                <div class="x_content">

                <!-- <p class="text-muted font-13 m-b-30">
                    The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                </p> -->

                <?php echo $this->session->flashdata('add_success') ?>
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Caleg</th>
                        <th>Nama</th>
                        <th>Partai</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                        <?php
                            $no = 1 ;
                            foreach ($list_relawan->result() as $row_relawan) {
                        ?>

                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row_relawan->nama_caleg?></td>
                            <td><?php echo $row_relawan->nama_relawan?></td>
                            <td><?php echo $row_relawan->email?></td>
                            <td>
                                <div class="btn-group pull-right">
                                    <button class="btn btn-success btn-sm" >Edit</button>
                                    <button class="btn btn-danger btn-sm" >Hapus</button>
                                </div>
                            </td>
                        </tr>

                        <?php } ?>
                    </tbody>

                </table>
                </div>
            </div>
            </div>
        </div>

 <?php include 'footer.php' ?>