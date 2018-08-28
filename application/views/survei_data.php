<?php include 'header.php' ?>
        <!-- Large modal -->

        <div class="right_col" role="main">
          <div class="row">
            <div class="x_panel">
                <div class="x_title">
                <h2>Data Survei <small>___</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <a href="<?php echo base_url() ?>survei" class="btn btn-primary btn-sm" >Tambah</a>
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
                        <th>Relawan</th>
                        <th>Tanggal</th>
                        <th>Tools</th>
                    </tr>
                    </thead>

                    <tbody>

                        <?php
                            $no = 1 ;
                            foreach ($list_answer->result() as $row_answer) {
                        ?>

                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row_answer->nama_caleg;  ?></td>
                            <td><?php echo $row_answer->nama_relawan;  ?></td>
                            <td><?php echo $row_answer->tgl_answer;  ?></td>
                            <td>
                                <div class="btn-group pull-right">
                                    <a href="<?php echo base_url() ?>questions/survei/<?php echo $row_answer->id_answer  ?>" class="btn btn-warning btn-sm" >Show</a>
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

        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button> -->

        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content id_ans">
                </div>
            </div>
        </div>

        <script 
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
        </script>

        <script>
        
            function show_survei(id_answer){
                console.log(id_answer)
                // var id = parseInt(id_answer) ;
                // $('.id_ans').html(id);
                // $('.modal').modal('show');

                // $(document).ready(function() {
                // });

            }

            // $(document).ready(function() {
            //     $('.id_ans').html(id);
            //     $('.modal').modal('show');
            // });

        </script>

 <?php include 'footer.php' ?>