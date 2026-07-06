
How to get filter value, agar URL me value pass karte hai to usko kaise recive kare or 
datatable me kaise send kare


<script>

var table = $('#AddEmployee_data').DataTable({
processing: true,
serverSide: true,
lengthMenu: [
    [10, 25, 50, 5000],
    ['10', '25', '50', 'All']
],
dom: 'lBfrtip',
buttons: [],
ajax: {
    url: "{{ url('/daily_report_get') }}",
    type: "GET",
    dataType: "json",
    data: function (data) {
        const params = new URLSearchParams(window.location.search);
        data.from_date = params.get('from_date');//$('#from_date').val();
        data.to_date = params.get('to_date');//$('#to_date').val();
    }
},
columns: [
    { data: "date" },
    { data: "job_posted" },
    { data: "ForwardedToHR" }
]
});

$("#filter_btn").on('click', function (e) {
//e.preventDefault();
table.draw();
});
    </script>










-----------------------------------------------------------------------------

If datatable me date show karna ho to kya kare,
upper wala code me date ka value pass kiya hu jo special case me karte hai, 
<?php
public function daily_report_get(Request $request){
        $from = $request->from_date
            ? Carbon::parse($request->from_date)
            : Carbon::today()->subDays(9);
    
        $to = $request->to_date
            ? Carbon::parse($request->to_date)
            : Carbon::today();
    
        $dates = CarbonPeriod::create($from, $to);
        
        $recordsTotal = collect(CarbonPeriod::create($from, $to));
        $recordsTotal=$recordsTotal->count();
        $recordsFiltered=$recordsTotal;
        
        $limit=$request->input('length');
        $start=$request->input('start');


        if(!empty($request->input('search.value'))){
            $search=$request->input('search.value');
             //yaha code niche wala dalna hai, kyoki yaha search nahi rahega
        }else{
          
            
            $from = $request->from_date
                ? Carbon::parse($request->from_date)
                : Carbon::today()->subDays(9);
            
            $to = $request->to_date
                ? Carbon::parse($request->to_date)
                : Carbon::today();
            
            $offset = $request->start ?? 0;   // DataTables start
            $limit  = $request->length ?? 10; // DataTables length
            
            $record = collect(CarbonPeriod::create($from, $to))
                ->reverse()
                ->skip($offset)
                ->take($limit)
                ->values();
        }
        $data= array();
        
        if(!empty($record)){
            foreach ($record as  $value) {
                $status="";
                $action="";
                $jobpost=Jobdata::whereDate('created_at', $value->format('Y-m-d'))->count();
                $result=[];
                $result['date']=$value->format('d-m-Y');
                $result['job_posted']=$jobpost;
                
                $data[] = $result;
            }
        }
        $output = array(
            "draw" => $request->input('draw'),
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            "data" => $data
        );
        return json_encode($output);
    }
