       <style>
            .w-invoice{
                box-shadow:#342;
                border: 12px;
            }
       </style>
       <table class="table dt-table-hover dataTable" style="width:100%">
                                            <thead>
                                                <tr>
                                                  
                                                    <th>Room (Status)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
       <?php
     if($model){
             
        foreach($model as $rows){
            $room_data=$rows["name"];
            $count=" (".$rows["count_patients"].") ";
        echo '<tr>
        <td><div class="w-invoice">
            <p class="w-inv-text"> <span class="usr-name">'.$room_data.'</span><a href=""><span class="inv-number"><font color="red">'.$count.'</front></span></a></p>
            </div></td></tr>';                                                   
                                                }
                  }
?>
                  </tbody>

                  </table>
                                                 