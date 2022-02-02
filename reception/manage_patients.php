<?php include("../includes/config/conn.php"); ?>
<?php 
include("session.php"); 
?>
<?php include("includes/header.php"); ?>

<?php include("includes/sidebar.php"); ?>

<?php include("includes/navigation.php"); ?>
    
    <div class="paraoverview">
        <p style="font-size: 1.3em;">All Registered Patients</p>
    </div>
    
    <div class="card" style="padding: 16px;">
      <p>Patient Infomation</p>
       <div class="row">
           <div class="col-md-8">
           <input type="text" id="search" class="form-control" autocomplete="off" placeholder="Search Patients here.."><br>
           </div>
           
    
       </div>

       <div class="result">

       </div>
        
          
           
    </div>

    <!-- JQUERY AJAC LIVE SEARCH -->
    <script type="text/javascript">
            $(document).ready(function(){
                //fetch data form the table without reload/refresh page
                loadData();
                function loadData(query) {
                    $.ajax({
                        url: "../includes/ajax/todayPatients_ajax.php",
                        type: "POST",
                        chache: false,
                        data:{query:query},
                        success:function(response) {
                            $(".result").html(response);
                        }
                    })
                }

                //live search data from the table without realod/refresh page
                $("#search").keyup(function() {
                    var search = $(this).val();
                    if(search !="") {
                        loadData(search)
                    }else {
                        loadData();
                    }
                });
            });
    </script>
    
<?php include("includes/footer.php"); ?>