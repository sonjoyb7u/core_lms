<?php 
    require_once ("./../database/db.php");

    $run_students_info = mysqli_query($conn, "SELECT * FROM `tbl_students`");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Print All Students</title>
    <link rel="stylesheet" href="./../assets/vendor/style.css">
</head>
<body onload="window.print()">
        <?php
//            echo page_header();
            $sl_no = 1;
            $page_no = 1;
    
            $total_data = mysqli_num_rows($run_students_info);
//            echo $total_data;
            
            $per_page_data = 25;
    
            while ($row_students_info = mysqli_fetch_assoc($run_students_info)) :
                if($sl_no % $per_page_data == 1) {
                    echo page_header();
                }
        ?>

               <tr>
                   <td><?= $sl_no; ?></td>
                   <td><?= $row_students_info['f_name'] ?></td>
                   <td><?= $row_students_info['l_name'] ?></td>
                   <td><?= $row_students_info['roll'] ?></td>
                   <td><?= $row_students_info['reg'] ?></td>
                   <td><?= $row_students_info['email'] ?></td>
                   <td><?= $row_students_info['phone'] ?></td>
               </tr>

       <?php
                if($sl_no % $per_page_data == 0 || $total_data == $per_page_data) {
                    echo page_footer($page_no++);
                }
                
            $sl_no++;
            endwhile;
//            echo page_footer(); 
       ?>
   
<?php
  
    function page_header() {
        $header = '
                    <div class="print-page-content">
                       <div class="header">
                           <h2>Web Apps Dev, Chittagong.</h2>
                           <h3>ওয়েব এপস্ ডেভ, চট্টগ্রাম।</h3>
                           <h3>All Student List</h3>
                       </div>

                      <div class="data-info">
                            <table>
                               <tr>
                                   <th>Sl No.</th>
                                   <th>First Name</th>
                                   <th>Last Name</th>
                                   <th>Roll No.</th>
                                   <th>Reg. No.</th>
                                   <th>Email</th>
                                   <th>Mobile No.</th>
                               </tr>
               
        ';
        return $header;
    }
    
    function page_footer($page_no) {
        $footer = '
                            </table>
                            <div class="page-no">Page :- '.$page_no.'</div>

                        </div>
                    </div>
        
        
        ';
        return $footer;
    }
    
?>
    
</body>
</html>