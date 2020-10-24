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
    if(close) html += "<a href='#' class='close' data-dismiss='alert'><span>Ă—</span></a>";
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

function checkProxy()
{
    var proxy = $('input[name="proxy"]').val();
    if(proxy != ''){
        $.ajax({
            url: '/setting/checkProxy',
            type: 'get',
            contentType: 'application/x-www-form-urlencoded',
            data: {proxy:proxy},
            beforeSend:showLoading('.modalBox'),
            success:function(data){
                if(data.status == '200'){
                    hideLoading('.modalBox'),
                    alertBox(data.message,'success','.alertBox',true);
                    return true;
                }else{
                    showLoading('.modalBox');
                    alertBox(data.message,'danger','.alertBox',true);
                    return false;
                }
            },
            
        });
    }
   return true;
}


function loginFacebookViaPass(modalForm){
    let user_agent = $(modalForm+' input[name="user_agent"]').val();
    let proxy      = $(modalForm+' input[name="proxy"]').val();
    let username   = $(modalForm+' input[name="username"]').val();
    let password   = $(modalForm+' input[name="password"]').val();
    let _token     = $(modalForm+' input[name="_token"]').val();
    let categoryId = $(modalForm+' select[name="category_id"]').val(); 
    let checkInput = checkValueFormInput(modalForm,username,password,categoryId);
    
    if (user_agent == '') {
        user_agent = 'Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; rv:11.0) like Gecko';
    }
    if(checkInput == true){
        $.ajax({
            url: '/setting/postLoginFb',
            dataType: 'json',
            type: 'post',
            contentType: 'application/x-www-form-urlencoded',
            data: {username: username,password: password,user_agent: user_agent,proxy: proxy,_token:_token},
            beforeSend:showLoading('.modalBox'),
            success: function( data, textStatus, jQxhr ){
                if(data.status == "202"){
                    var html = '';
                    html += '<input type="hidden" name="fb_dtsg"  value="'+data.fb_dtsg+'">';
                    html += '<input type="hidden" name="nh"  value="'+data.nh+'">';
                    html += '<input type="hidden" name="checkpoint" value="'+data.checkpoint+'">';
                    html += '<input type="hidden" name="datr" value="'+data.datr+'">';
                    html += '<input type="hidden" name="fr" value="'+data.fr+'">';
                    $(modalForm+' .checkPoint').append(html);
                    $(modalForm+' .checkPoint').show();
                    $(modalForm+' .btn_cookie').hide();
                    return false;
                }
                if(data.status == "200"){
                }else{
                    alertBox(data.message,'danger','.alertBox',true);
                }
            },
            error: function( jqXhr, textStatus, errorThrown ){ 
    
            },
            complete: function() {
                hideLoading(modalForm+' .modalBox');
            }
        });
    }
    
}

// click get value cookie

function getValueCookie(modalForm){
    let code    = $(modalForm+' input[name="code"]').val();
    let user_agent = $(modalForm+' input[name="user_agent"]').val();
    let proxy   = $(modalForm+' input[name="proxy"]').val();
    let cookie  = $(modalForm+' input[name="checkpoint"]').val();
    let fb_dtsg = $(modalForm+' input[name="fb_dtsg"]').val();
    let datr    = $(modalForm+' input[name="datr"]').val();
    let _token  = $(modalForm+' input[name="_token"]').val();
    let fr      = $(modalForm+' input[name="fr"]').val();
    let nh      = $(modalForm+' input[name="nh"]').val();
    let username = $(modalForm+' input[name="username"]').val();
    let categoryId = $(modalForm+' select[name="category_id"]').val();
    if (user_agent == '') {
        user_agent = 'Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; rv:11.0) like Gecko';
    }
    $.ajax({
        url: '/setting/postLoginCheckout',
        dataType: 'json',
        type: 'post',
        contentType: 'application/x-www-form-urlencoded',
        data: {cookie:cookie,fb_dtsg:fb_dtsg,code:code,datr:datr,fr:fr,user_agent:user_agent,proxy:proxy,nh:nh,username:username,categoryId:categoryId,_token:_token},
        beforeSend:showLoading('.modalBox'),
        success:function(data){
            if(data.status == "200"){
                location.reload();
            }else{
                alertBox(data.message,'danger','.alertBox',true);
            }
            hideLoading('.modalBox')
        },
        
    });
}

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

