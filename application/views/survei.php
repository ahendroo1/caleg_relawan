<?php include 'header.php' ?>
             <!-- Large modal -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Tambah Pertanyaan</h4>
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
                <h2>Survei <small>___</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                
                    <a href="<?php echo base_url() ?>survei_data" type="button" class="btn btn-warning btn-sm" >Data Survei</a>
                
                </ul>
                    <div class="clearfix">
                    </div>
                </div>
                <div class="x_content">

                <!-- <p class="text-muted font-13 m-b-30">
                    The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                </p> -->

                <?php echo $this->session->flashdata('add_success') ?>
                <form method="post" action="<?php echo base_url() ?>questions/save_ans">

                    <?php
                        foreach($list_questions->result() as $row_que ){
                    ?>
                
                    <div class="form-group">    
                        <label for="exampleInputEmail1"><?php echo $row_que->question ?></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="ans[]" placeholder="<?php echo $row_que->question ?>" required>
                    </div>

                    <?php } ?>

                    <button class="btn btn-primary btn-sm pull-right" type="submit" >Kirim Survei</button>

                </form>

                </div>
            </div>
            </div>
        </div>

        <script>

        </script>

 <?php include 'footer.php' ?>