<!-- //https://codepen.io/jagan/pen/OgdpZp -->

<style>
    .dt-button {
    padding: 10px;
    border: 2px solid;
    margin: 5px;
}
</style>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.15/r-2.1.1/datatables.min.css">
<br><br>
<div class="clearfix"></div>

<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
    <thead>
        <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Type</th>
            <th>Area</th>
            <th>Budget</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Type</th>
            <th>Area</th>
            <th>Budget</th>
        </tr>
    </tfoot>
    <tbody>
        <tr>
            <td>1 </td>
            <td>guru</td>
            <td>guru@gmail.com</td>
            <td>8220453235776</td>
            <td>14</td>
            <td>tambaram</td>
            <td>2000000</td>

        </tr>
        <tr>
            <td>2 </td>
            <td>jagan</td>
            <td>jagan@gmail.com</td>
            <td>8567432454564</td>
            <td>13</td>
            <td>chrompet</td>
            <td>2000000</td>


            

        </tr>
        <tr>
            <td>3 </td>
            <td>narmatha</td>
            <td>matha@gmail.com</td>
            <td>8767654575675</td>
            <td>9</td>
            <td>saidapet</td>
            <td>2500000</td>


            

        </tr>
        <tr>
            <td>4 </td>
            <td>gayathri</td>
            <td>athri@gmail.com</td>
            <td>7878sdf787878</td>
            <td>6</td>
            <td>porur</td>
            <td>2500000</td>



        </tr>
        <tr>
            <td>5 </td>
            <td>gohan</td>
            <td>gohan@gmail.com</td>
            <td>8794654646</td>
            <td>7</td>
            <td>guindy</td>
            <td>5000000</td>
        </tr>
    </tbody>
</table>

  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.15/r-2.1.1/datatables.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script src="http://cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="http://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
<script src="http://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
<script src="http://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
<script src="http://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search Here",
            },
            dom: 'Bfrtip',
            buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
            ]

        });
      
      $('.btn-copy').click(function(){
        $('.buttons-copy').trigger('click');
      });
      $('.btn-csv').click(function(){
        $('.buttons-csv').trigger('click');
      });
      $('.btn-excel').click(function(){
        $('.buttons-excel').trigger('click');
      });
      $('.btn-pdf').click(function(){
        $('.buttons-pdf').trigger('click');
      });
      $('.btn-print').click(function(){
        $('.buttons-print').trigger('click');
      });
    });
</script>
