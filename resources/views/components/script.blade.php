<script type="text/javascript">

    function getDistrict(e){
        e.preventDefault();
        $("#districts_select").attr("disabled",true)
        $("#wards_select").attr("disabled",true)
        let province_code = $("#provinces_select").val();
        // alert(province_code);
        let districtWrapper = `
            <option selected>Chọn huyện/quận...</option>
        `;
        $.ajax({
            type:'GET',
            url:"{{url("/api/local")}}?parent_id="+province_code,
            success:function(data){
                var districtData = data.local
                console.log(districtData)
                for (let i =0 ; i < districtData.length ; i++){
                    districtWrapper += `
                       <option value="${districtData[i].code}">${districtData[i].name}</option>
                    `
                }
                $("#districts_select").html(districtWrapper);
                $("#districts_select").attr("disabled",false)
            }
        });
    }
    function getWard(e){
        e.preventDefault();
        $("#wards_select").attr("disabled",true)
        let province_code = $("#districts_select").val();
        let wardWrapper = `
            <option selected>Chọn xã/phường...</option>
        `;
        $.ajax({
            type:'GET',
            url:"{{url("/api/local")}}?parent_id="+province_code,
            success:function(data){
                var districtData = data.local
                console.log(districtData)
                for (let i =0 ; i < districtData.length ; i++){
                    wardWrapper += `
                       <option value="${districtData[i].id}">${districtData[i].name}</option>
                    `
                }
                $("#wards_select").html(wardWrapper);
                $("#wards_select").attr("disabled",false)
            }
        });
    }

    function  handleGetManager(e,id,parent_id){
        e.preventDefault();
        let department_selected = $(".department_select").val();
        $(".manager_select_mbf").attr("disabled",true)
        $.ajax({
            type:'GET',
            url:"{{url("/member/get-manager")}}",
            data:{
                department_id:department_selected
            },
            success:function(data){
                var managerData = data;
                let managerWrapper = `
                    <option value="0" ${parent_id !==0 ? '' :'selected' } >Chọn quản lý...</option>
                `;
                for (let i =0 ; i < managerData.length ; i++){
                    if(managerData[i].id !== id){
                        managerWrapper += `
                       <option value="${managerData[i].id}"  ${parent_id == managerData[i].id?'selected' :'' } >${managerData[i].member_name}</option>
                    `
                    }

                }
                $(".manager_select_mbf").html(managerWrapper);
                $(".manager_select_mbf").attr("disabled",false)
            }
        });
    }
</script>
