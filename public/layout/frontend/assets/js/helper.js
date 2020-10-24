
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return ""; 
}

////
function alertBox(message,type,errorHolder,close){
    var icons = {}; 
    icons['success'] = 'check-circle';
    icons['info'] = 'info-circle';
    icons['warning'] = 'exclamation-circle';
    icons['danger'] = 'exclamation-circle';
    icons['primary'] = 'info-circle';
                
    var html = "<div class='alert alert-"+type+" alert-styled-left alert-dismissible'>";
    html += "<a href='#' class='close' data-dismiss='alert'><span>Ă—</span></a>";
        html += "<span class='font-weight-semibold'>"+message+"</span>";
        html += "</div>";
    $(errorHolder).html(html);
    setTimeout(function(){$(".alerts").fadeOut();}, 3000);
}

function showLoading(classBox) {
    var html = '<div class="linear-progress-material">';
        html += '<div class="bar bar1"></div>';
        html += '<div class="barx bar2"></div>';
        html += '</div>';
        $(classBox).html(html);
    $(classBox+' .linear-progress-material').show();
}
function hideLoading(classBox) {
    $(classBox).html('');
    $(classBox+' .linear-progress-material').hide();
}


// click get value cookie


function checkValueFormInput(modalForm,username,password,categoryId){
    if(username == ''){
        $(modalForm+' input[name="username"]').addClass('is-invalid');
        $(modalForm+' .alert_username').show();
    }else{
        $(modalForm+' input[name="username"]').removeClass('is-invalid');
        $(modalForm+' .alert_username').hide();
    }
    if(password == ''){
        $(modalForm+' input[name="password"]').addClass('is-invalid');
        $(modalForm+' .alert_password').show();
    }else{
        $(modalForm+' input[name="password"]').removeClass('is-invalid');
        $(modalForm+' .alert_password').hide();
    }
    if(categoryId == ''){
        $(modalForm+' select[name="category_id"]').addClass('is-invalid');
        $(modalForm+' .alert_category').show();
    }else{
        $(modalForm+' select[name="category_id"]').removeClass('is-invalid');
        $(modalForm+' .alert_category').hide();
    }

    if(username == '' || password == '' || categoryId == '')
    {
        return false;
    }
    return true;
}

function checkAllCheckbox(model){
    var isChecked = model.checked;
    if(isChecked) {
        $('input[name="id[]"]').each(function() {
            this.checked = true;
            $('.uniform-checker span').addClass('checked');
        });
    } else {
        $('input[name="id[]"]').each(function() {
            this.checked = false;
            $('.uniform-checker span').removeClass('checked');
        });
    }
}

function removeAllAccount(confirm){
    if(confirm == true){
        let arr = [];
        let _token = $('input[name="_token"]').val();
        $('input[name="id[]"]:checked').each(function() {
            arr.push($(this).val());
        });
        if(arr == ''){
            alertBox('Vui lĂ²ng chá»n tĂ i khoáº£n','danger','.alertListAccount',true);
        }else{
            $.ajax({
                url: "/setting/destroyAll",
                type: 'POST',
                dataType: 'json',
                data: {ids:arr,_token:_token},
                beforeSend:showLoading('.showLoading'),
                success:function(result){
                    if(result.status == true){
                        alertBox(result.message,'success','.alertListAccount',true);
                        setTimeout(function(){
                            window.location.reload();
                         }, 1000)
                         hideLoading('.showLoading');
                    }
                    
                },
            });
        }
    
    }
}

function checkCookie(){
    let arr = [];
    let _token = $('input[name="_token"]').val();
    $('input[name="id[]"]:checked').each(function() {
        arr.push($(this).val());
    });
    if(arr == ''){
        alertBox('Vui lĂ²ng chá»n tĂ i khoáº£n Facebook','danger','.alertListAccount',true);
    }else{
        $.ajax({
            url: "/setting/checkCookie",
            type: 'POST',
            dataType: 'json',
            data: {ids:arr,_token:_token},
            beforeSend:showLoading('.showLoading'),
            success:function(result){
                if(result.status == true){
                    alertBox(result.message,'success','.alertListAccount',true);
                    hideLoading('.showLoading');
                    setTimeout(function(){
                        window.location.reload();
                     }, 1000)
                }
                
            }
        });
    }
}

function submitCategory(){
    let name = $('input[name="cate_id"').val();
    let _token = $('input[name="_token"]').val();
    if(name == ''){
        alertBox('Vui lĂ²ng nháº­p tĂªn danh má»¥c','danger','.alertBoxCate',true);
    }else{
        $.ajax({
            url:"/setting/postCategory",
            type:"POST",
            data:{cate_name:name,_token:_token},
            beforeSend:showLoading('.loadCate'),
            success:function(result){
                if(result.status == true){
                    alertBox(result.message,'success','.alertBoxCate',true);
                    hideLoading('.loadCate');
                    setTimeout(function(){
                        window.location.reload();
                     }, 1000);
                }else{
                   alertBox(result.message,'danger','.alertBoxCate',true);
                    hideLoading('.loadCate');
                    setTimeout(function(){
                        window.location.reload();
                     }, 1000);
                }
                
            }
        });
    }
}

function filterCateGroup(){
    let group = [];
    $('select[name="cate_group[]"]').each(function() {
        group.push($(this).val());
    }); 
    if(group){
        $('#formSubmit').closest("form").submit()
    }
}

function changeAccount(model){
    let id = $(model).data('id');
    $('#modal_update').modal('show');
    if(id){
        $.ajax({
            url:"/setting/getInfoAccountAjax",
            type:"GET",
            data:{id:id},
            success:function(result){
                if(result.status == 200){
                   $('#modal_update input[name="username"]').val(result.data.fb_id);
                   if(result.data.proxy != null){
                    $('#modal_update input[name="proxy"]').val(result.data.proxy);
                   } 
                   var cate_id = result.data.category_id;
                   $("#modal_update select option[value="+cate_id+"]").attr('selected', 'selected');
                }
            }
        });
    }
}

function deleteCategory(confirm){
    if(confirm == true){
        let arr = [];
        let _token = $('input[name="_token"]').val();
        $('input[name="id[]"]:checked').each(function() {
            arr.push($(this).val());
        });
        if(arr == ''){
            alertBox('Vui lĂ²ng chá»n danh má»¥c','danger','.alertListAccount',true);
        }else{
            $.ajax({
                url: "/setting/category/deleteAll",
                type: 'POST',
                dataType: 'json',
                data: {ids:arr,_token:_token},
                beforeSend:showLoading('.showLoading'),
                success:function(result){
                    if(result.status == true){
                        alertBox(result.message,'success','.alertListAccount',true);
                        setTimeout(function(){
                            window.location.reload();
                         }, 1000)
                         hideLoading('.showLoading');
                    }
                    
                },
            });
        }
    
    }
}

function updateCategory(model){
    let id   = $(model).data('id');
    let name = $(model).data('name');
    $('#modal_update').modal('show');
    $('#modal_update input[name="cate_id"]').val(id);
    $('#modal_update input[name="cate_name"]').val(name);
}

function saveFormUpdateCategory(){
    let id   = $('#modal_update input[name="cate_id"]').val();
    let name = $('#modal_update input[name="cate_name"]').val();
    let _token = $('input[name="_token"]').val();
    if(name == ''){
        alertBox('TĂªn danh má»¥c khĂ´ng Ä‘Æ°á»£c bá» trá»‘ng','danger','.modalBox',true);
    }else{
        $.ajax({
            url: "/setting/category/update",
            type: 'POST',
            dataType: 'json',
            data: {id:id,name:name,_token:_token},
            beforeSend:showLoading('.modalBox'),
            success:function(result){
                if(result.status == 200){
                    alertBox(result.message,'success','.modalBox',true);
                    setTimeout(function(){
                        window.location.reload();
                     }, 1000)
                     hideLoading('.modalBox');
                }else{
                    alertBox(result.message,'danger','.modalBox',true);
                }
                
            },
        });
    }
}

