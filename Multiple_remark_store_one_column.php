If multiple remark ko ek hi column me store karna ho :

public function auto_save_data_remark(Request $request){

    $id = $request->getid;
    $old_remark = DB::table('demo')->where('id', $id)->value('remark');
    $remarks_ary = [];
    if (!empty($old_remark)) {
        $remarks_ary = unserialize($old_remark);
    }
    $remarks_ary[] = [
        'remark' => $request->remark,
        'date'   => date('Y-m-d')
    ];
    
    $remark = serialize($remarks_ary);
    
    DB::table('demo')->where('id', $id)->update(["remark" => $remark]);
    
    return response()->json(["status" => true,"message" => "Remark Add Successfully"]);
}




if(!empty($lead->remark)){
   $all_remark=unserialize($lead->remark);
}

$remark='<i class="fa fa-comments remarkclick" aria-hidden="true" data-toggle="modal" data-target="#myModal" data-id="'.$lead->id.'" data-remark=\''.json_encode($all_remark).'\'></i>';


<script>
document.addEventListener("DOMContentLoaded",function(){
    document.addEventListener("click",function(e){
        var rebtn=e.target.closest(".remarkclick");
        if(!rebtn) return
        var id=rebtn.dataset.id;
        document.querySelector("input[name='getid']").value=id;
        
         let html = '';
         if(rebtn.dataset.remark!=''){
             let remarks = JSON.parse(rebtn.dataset.remark);
            remarks.forEach(function(item) {
                html += `<li>${item.date} - ${item.remark}</li>`;
            });
            document.getElementById("myRemark").innerHTML = html;
         }
        
    });
});
</script>
