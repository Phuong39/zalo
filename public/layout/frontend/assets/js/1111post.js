var path_url = window.location.origin;
$(".fb_presets .fbp").on("click",function() {
    var statusPreview = $(".postPreview .message");
        statusPreview.removeClass();
        statusPreview.addClass("message");
    if($(this).data("psid")!=0){
        $("#fb_preset_id").val($(this).data("psid")); 
        statusPreview.addClass("fbpb");
        statusPreview.addClass("fbpb-"+$(this).data("psid"));
    }
});

function send(tab) {
    $(tab).children('.emojioneemoji').each(function () {
        $(this).replaceWith($(this).prop('alt'))
    });
}

// $('textarea[name="message"]').keyup(function(){
//     let message = $(this).val();
//     $('.postPreview .message').html(message);
// });

$(document).ready(function(){
    $('#tabImage div').keyup(function() {
       let data = $('#tabImage .emojionearea-editor').html();
       let dataIcon = send('#tabImage .emojionearea-editor');
       $('.box-view .message').html(data);
    });
    $('#tabStatus div').keyup(function() {
        let data = $('#tabStatus .emojionearea-editor').html();
        let dataIcon = send('#tabStatus .emojionearea-editor');
        $('.box-view .message').html(data);
     });
     $('#tabLink div').keyup(function() {
        let data = $('#tabLink .emojionearea-editor').html();
        let dataIcon = send('#tabLink .emojionearea-editor');
        $('.box-view .message').html(data);
     });
     $('#tabVideo div').keyup(function() {
        let data = $('#tabVideo .emojionearea-editor').html();
        let dataIcon = send('#tabVideo .emojionearea-editor');
        $('.box-view .message').html(data);
     });
});

function savePostStatus(tab)
{
    let message = $('.box-view .message').html();
    let title = $(tab+' input[name="title"]').val();
    let fb_preset_id = $(tab+' input[name="fb_preset_id"]').val();
    let cateId  = $(tab+ ' select[name="cate_id"]').val();
    let _token = $('input[name="_token"]').val();
    let type = "status";
    let content = JSON.stringify({"content":message,"fb_preset_id":fb_preset_id});
    let validate = validateFormStatus(tab,title,message,cateId);
    if(validate == true){
        $.ajax({
            url: "/post/store",
            type: 'POST',
            dataType: 'json',
            data: {title:title,content:content,cate_id:cateId,type:type,_token:_token},
            beforeSend:showLoading('.showLoading'),
            success:function(result){
                if(result.status == true){
                    alertBox(result.message,'success','.alertPost',true);
                    setTimeout(function(){
                        window.location.reload();
                     }, 2000)
                     hideLoading('.showLoading');
                }
            },
        });
    }
}

function savePostCart(tab)
{
    let fb_preset_id = 0;
    let message = $('.box-view .message').html();
    let title = $(tab+' input[name="selltitle"]').val();
    let price = $(tab+' input[name="sellprice"]').val();
    let location = $(tab+' input[name="selllocation"]').val();
    let cateId  = $(tab+ ' select[name="cate_id"]').val();
    let description  = $(tab+ ' textarea[name="selldescription"]').val();
    let _token = $('input[name="_token"]').val();
    let arr_img = [];
    $(tab+' input[name="image[]"]').each(function () {
        arr_img.push($(this).val());
     })
    let type = "cart";
    let content = JSON.stringify({"content":message,"fb_preset_id":fb_preset_id,"title":title,"price":price,"location":location,"description":description,"image":arr_img});
    let validate = validateFormCart(tab,title,price,location,description,cateId);
    if(validate == true){
        $.ajax({
            url: "/post/store",
            type: 'POST',
            dataType: 'json',
            data: {title:title,content:content,cate_id:cateId,type:type,_token:_token},
            beforeSend:showLoading('.showLoading'),
            success:function(result){
                if(result.status == true){
                    alertBox(result.message,'success','.alertPost',true);
                    setTimeout(function(){
                        window.location.reload();
                     }, 2000)
                     hideLoading('.showLoading');
                }
            },
        });
    }
}

function savePostLink(tab)
{
    let message = $('.box-view .message').html();
    let title = $(tab+' input[name="title"]').val();
    let link = $(tab+' input[name="link"]').val();
    let picture = $(tab+' input[name="picture"]').val();
    let name = $(tab+' input[name="name"]').val();
    let caption = $(tab+' input[name="caption"]').val();
    let description = $(tab+' input[name="description"]').val();
    let fb_preset_id = 0;
    let cateId  = $(tab+ ' select[name="cate_id"]').val();
    let _token = $('input[name="_token"]').val();
    let type = "link";
    let content = JSON.stringify({"content":message,"fb_preset_id":fb_preset_id,"link":link,"picture":picture,"name":name,"caption":caption,"description":description});
    let validate = validateFormLink(tab,title,message,link,cateId);
    if(validate == true){
        $.ajax({
            url: "/post/store",
            type: 'POST',
            dataType: 'json',
            data: {title:title,content:content,cate_id:cateId,type:type,_token:_token},
            beforeSend:showLoading('.showLoading'),
            success:function(result){
                if(result.status == true){
                    alertBox(result.message,'success','.alertPost',true);
                    setTimeout(function(){
                        window.location.reload();
                     }, 2000)
                     hideLoading('.showLoading');
                }
            },
        });
    }
}

function savePostImage(tab)
{
    let message = $('.box-view .message').html();
    let title = $(tab+' input[name="title"]').val();
    let image = [];
    $(tab+' input[name="image[]"]').each(function () {
        image.push($(this).val());
     })
    let fb_preset_id = 0;
    let cateId  = $(tab+ ' select[name="cate_id"]').val();
    let _token = $('input[name="_token"]').val();
    let type = "image";
    let content = JSON.stringify({"content":message,"fb_preset_id":fb_preset_id,"image":image});
    let validate = validateFormImage(tab,title,message,image,cateId);
    if(validate == true){
        $.ajax({
            url: "/post/store",
            type: 'POST',
            dataType: 'json',
            data: {title:title,content:content,cate_id:cateId,type:type,_token:_token},
            beforeSend:showLoading('.showLoading'),
            success:function(result){
                if(result.status == true){
                    alertBox(result.message,'success','.alertPost',true);
                    setTimeout(function(){
                        window.location.reload();
                     }, 2000)
                     hideLoading('.showLoading');
                }
            },
        });
    }
}

function savePostVideo(tab)
{
    let message = $('.box-view .message').html();
    let title = $(tab+' input[name="title"]').val();
    let video = $(tab+' input[name="video"]').val();
    let fb_preset_id = 0;
    let cateId  = $(tab+ ' select[name="cate_id"]').val();
    let _token = $('input[name="_token"]').val();
    let type = "video";
    let content = JSON.stringify({"content":message,"fb_preset_id":fb_preset_id,"video":video});
    let validate = validateFormVideo(tab,title,message,video,cateId);
    if(validate == true){
        $.ajax({
            url: "/post/store",
            type: 'POST',
            dataType: 'json',
            data: {title:title,content:content,cate_id:cateId,type:type,_token:_token},
            beforeSend:showLoading('.showLoading'),
            success:function(result){
                if(result.status == true){
                    alertBox(result.message,'success','.alertPost',true);
                    setTimeout(function(){
                        window.location.reload();
                     }, 2000)
                     hideLoading('.showLoading');
                }
            },
        });
    }
}

function validateFormStatus(tab,title,content,cateId){
    if(title == ''){
        $(tab+' input[name="title"]').addClass('is-invalid');
        $(tab+' .alert_title').show();
    }else{
        $(tab+' input[name="title"]').removeClass('is-invalid');
        $(tab+' .alert_title').hide();
    }
    if(content == ''){
        $(tab+' .emojionearea-editor').addClass('is-invalid');
        $(tab+' .alert_content').show();
    }else{
        $(tab+' .emojionearea-editor').removeClass('is-invalid');
        $(tab+' .alert_content').hide();
    }
    if(cateId == ''){
        $(tab+' select[name="cate_id"]').addClass('is-invalid');
        $(tab+' .alert_category').show();
    }else{
        $(tab+' select[name="cate_id"]').removeClass('is-invalid');
        $(tab+' .alert_category').hide();
    }

    if(title == '' || content == '' || cateId == '')
    {
        return false;
    }
    return true;
}

function validateFormCart(tab,title,price,location,description,cateId){
    if(title == ''){
        $(tab+' input[name="selltitle"]').addClass('is-invalid');
        $(tab+' .alert_selltitle').show();
    }else{
        $(tab+' input[name="selltitle"]').removeClass('is-invalid');
        $(tab+' .alert_selltitle').hide();
    }
    if(price == ''){
        $(tab+' input[name="sellprice"]').addClass('is-invalid');
        $(tab+' .alert_sellprice').show();
    }else{
        $(tab+' input[name="sellprice"]').removeClass('is-invalid');
        $(tab+' .alert_sellprice').hide();
    }
    if(location == ''){
        $(tab+' input[name="selllocation"]').addClass('is-invalid');
        $(tab+' .alert_selllocation').show();
    }else{
        $(tab+' input[name="selllocation"]').removeClass('is-invalid');
        $(tab+' .alert_selllocation').hide();
    }
    if(description == ''){
        $(tab+' textarea[name="selldescription"]').addClass('is-invalid');
        $(tab+' .alert_selldescription').show();
    }else{
        $(tab+' textarea[name="selldescription"]').removeClass('is-invalid');
        $(tab+' .alert_selldescription').hide();
    }
    if(cateId == ''){
        $(tab+' select[name="cate_id"]').addClass('is-invalid');
        $(tab+' .alert_category').show();
    }else{
        $(tab+' select[name="cate_id"]').removeClass('is-invalid');
        $(tab+' .alert_category').hide();
    }


    if(title == '' || price == '' || cateId == '' || location == '' || description == '')
    {
        return false;
    }
    return true;
}

function validateFormLink(tab,title,content,link,cateId){
    if(title == ''){
        $(tab+' input[name="title"]').addClass('is-invalid');
        $(tab+' .alert_title').show();
    }else{
        $(tab+' input[name="title"]').removeClass('is-invalid');
        $(tab+' .alert_title').hide();
    }
    if(content == ''){
        $(tab+' .emojionearea-editor').addClass('is-invalid');
        $(tab+' .alert_content').show();
    }else{
        $(tab+' .emojionearea-editor').removeClass('is-invalid');
        $(tab+' .alert_content').hide();
    }
    if(link == ''){
        $(tab+' input[name="link"]').addClass('is-invalid');
        $(tab+' .alert_link').show();
    }else{
        $(tab+' input[name="title"]').removeClass('is-invalid');
        $(tab+' .alert_link').hide();
    }
    if(cateId == ''){
        $(tab+' select[name="cate_id"]').addClass('is-invalid');
        $(tab+' .alert_category').show();
    }else{
        $(tab+' select[name="cate_id"]').removeClass('is-invalid');
        $(tab+' .alert_category').hide();
    }

    if(title == '' || content == '' || cateId == '' || link =='')
    {
        return false;
    }
    return true;
}

function validateFormImage(tab,title,content,image,cateId){
    if(title == ''){
        $(tab+' input[name="title"]').addClass('is-invalid');
        $(tab+' .alert_title').show();
    }else{
        $(tab+' input[name="title"]').removeClass('is-invalid');
        $(tab+' .alert_title').hide();
    }
    if(content == ''){
        $(tab+' .emojionearea-editor').addClass('is-invalid');
        $(tab+' .alert_content').show();
    }else{
        $(tab+' .emojionearea-editor').removeClass('is-invalid');
        $(tab+' .alert_content').hide();
    }
    if(image == ''){
        $(tab+' input[name="image[]"]').addClass('is-invalid');
        $(tab+' .alert_image').show();
    }else{
        $(tab+' input[name="image[]"]').removeClass('is-invalid');
        $(tab+' .alert_image').hide();
    }
    if(cateId == ''){
        $(tab+' select[name="cate_id"]').addClass('is-invalid');
        $(tab+' .alert_category').show();
    }else{
        $(tab+' select[name="cate_id"]').removeClass('is-invalid');
        $(tab+' .alert_category').hide();
    }

    if(title == '' || content == '' || cateId == '' || image == '')
    {
        return false;
    }
    return true;
}

function validateFormVideo(tab,title,content,video,cateId){
    if(title == ''){
        $(tab+' input[name="title"]').addClass('is-invalid');
        $(tab+' .alert_title').show();
    }else{
        $(tab+' input[name="title"]').removeClass('is-invalid');
        $(tab+' .alert_title').hide();
    }
    if(content == ''){
        $(tab+' .emojionearea-editor').addClass('is-invalid');
        $(tab+' .alert_content').show();
    }else{
        $(tab+' .emojionearea-editor').removeClass('is-invalid');
        $(tab+' .alert_content').hide();
    }
    if(video == ''){
        $(tab+' input[name="video"]').addClass('is-invalid');
        $(tab+' .alert_image').show();
    }else{
        $(tab+' input[name="video"]').removeClass('is-invalid');
        $(tab+' .alert_video').hide();
    }
    if(cateId == ''){
        $(tab+' select[name="cate_id"]').addClass('is-invalid');
        $(tab+' .alert_category').show();
    }else{
        $(tab+' select[name="cate_id"]').removeClass('is-invalid');
        $(tab+' .alert_category').hide();
    }

    if(title == '' || content == '' || cateId == '' || video == '')
    {
        return false;
    }
    return true;
}

function clickTablPreview(tab)
{

    var html = '';
    if(tab == 'status'){
        html += '<p class="message" id="message">';
        html += '<span class="defaultMessage" style="width: 60%"></span>';
        html += '<span class="defaultMessage" style="width: 80%"></span>';
        html += '<span class="defaultMessage" style="width: 40%"></span>';
        html += '</p>';
        $('.post .box-view').html(html);
    }else if(tab == 'cart'){
        html += '<p class="message clearfix">';
        html += '<span class="defaultMessage" style="width: 60%"></span>';
        html += '<span class="defaultMessage" style="width: 80%"></span>';
        html += '<span class="defaultMessage" style="width: 40%"></span>';
        html += '</p>';
        html += '<p class="sell_title_prev"></p>';
        html += '<p class="sell_price_prev"></p>';
        html += '<p class="sell_localtion_prev"></p>';
        html += '<p class="sell_description_prev"></p>';
        html += '<div class="previewImageType pit1"><div class="image_1"></div></div>'
        $('.post .box-view').html(html);
    }else if(tab == 'link'){
        html += '<p class="message" id="message">';
        html += '<span class="defaultMessage" style="width: 60%"></span>';
        html += '<span class="defaultMessage" style="width: 80%"></span>';
        html += '<span class="defaultMessage" style="width: 40%"></span>';
        html += '</p>';
        html += '<div class="previewLinkType">'
        html += '<div class="previewLink"></div>';
        html += '<div class="postDetails">';
        html += '<p class="name"><span class="defaultName"></span></p>';
        html += '<p class="description"><span class="defaultDescription"></span><span class="defaultDescription"></span><span class="defaultDescription"></span><span class="defaultDescription"></span><span class="defaultDescription"></span></p>';
        html += '<p class="caption"><span class="defaultCaption"></span></p></div>';
        html += '</div>';
        $('.post .box-view').html(html);
    }else if(tab == 'image'){
        html += '<p class="message" id="message">';
        html += '<span class="defaultMessage" style="width: 60%"></span>';
        html += '<span class="defaultMessage" style="width: 80%"></span>';
        html += '<span class="defaultMessage" style="width: 40%"></span>';
        html += '</p>';
        html += '<p class="sell_title_prev"></p>';
        html += '<p class="sell_price_prev"></p>';
        html += '<p class="sell_localtion_prev"></p>';
        html += '<p class="sell_description_prev"></p>';
        html += '<div class="clearfix"></div>';
        html += '<div class="previewImageType pit1"><div class="image_1"></div></div>'
        $('.post .box-view').html(html);
    }else{
        html += '<p class="message" id="message">';
        html += '<span class="defaultMessage" style="width: 60%"></span>';
        html += '<span class="defaultMessage" style="width: 80%"></span>';
        html += '<span class="defaultMessage" style="width: 40%"></span>';
        html += '</p>';
        html += '<div class="clearfix"></div>';
        html += '<div class="previewVideoType"></div>';
        $('.post .box-view').html(html);
    }
    
}

$(document).ready(function(){
    $('input[name="selltitle"]').keyup(function(){
        let title = $(this).val();
        $('.box-view .sell_title_prev').html(title);
    });
    $('input[name="sellprice"]').keyup(function(){
        let price = $(this).val();
        $('.box-view .sell_price_prev').html(price);
    });
    $('input[name="selllocation"]').keyup(function(){
        let location = $(this).val();
        $('.box-view .sell_localtion_prev').html(location);
    });
    $('textarea[name="selldescription"]').keyup(function(){
        let description = $(this).val();
        $('.box-view .sell_description_prev').html(description);
    });
});

function removePost(confirm){
    if(confirm == true){
        let arr = [];
        let _token = $('input[name="_token"]').val();
        $('input[name="id[]"]:checked').each(function() {
            arr.push($(this).val());
        });
        if(arr == ''){
            alertBox('Vui lĂ²ng bĂ i viáº¿t','danger','.alertListAccount',true);
        }else{
            $.ajax({
                url: "/post/destroy",
                type: 'POST',
                dataType: 'json',
                data: {id:arr,_token:_token},
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

function submitCategory(){
    let name = $('input[name="cate_id"').val();
    let _token = $('input[name="_token"]').val();
    if(name == ''){
        alertBox('Vui lĂ²ng nháº­p tĂªn danh má»¥c','danger','.alertBoxCate',true);
    }else{
        $.ajax({
            url:"/post/postAjaxCategory",
            type:"POST",
            data:{cate_name:name,_token:_token},
            beforeSend:showLoading('.loadCate'),
            success:function(result){
                if(result.status == 200){
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

function loadSite(model)
{
    let link = $(model).val();
    let _token = $('input[name="_token"]').val();
    if(link != ''){
        $.ajax({
            url:'/post/ajax/info',
            type:"POST",
            data:{url:link,_token:_token},
            beforeSend:showLoading(),
            success:function(result){
                let img = '<img src="'+result.image+'" with="100%">';
                $('.previewLinkType .previewLink').html(img);
                $('.postDetails .name').html(result.title);
                $('.postDetails .caption').html(result.caption);
                $('.postDetails .description').html(result.description);
                $('input[name="picture"]').val(result.image);
                $('input[name="name"]').val(result.title);
                $('input[name="caption"]').val(result.caption);
                $('input[name="description"]').val(result.description);
                hideLoading();
            }
        });
    }
}

// var buttonStatus = document.getElementById( 'ckfinder-popup-1' );
// var buttonImage = document.getElementById( 'ckfinder-popup-2' );
// var buttonVideo = document.getElementById( 'ckfinder-popup-3' );
//     buttonStatus.onclick = function() {
//         selectFileWithCKFinder( '#tabCart' );
//     };
//     buttonImage.onclick = function() {
//         selectFileWithCKFinder( '#tabImage' );
//     };
//     buttonVideo.onclick = function() {
//         selectFileWithCKFinder( '#tabVideo' );
//     };
//     function selectFileWithCKFinder( elementId ) {
//         CKFinder.modal( {
//             chooseFiles: true,
//             width: 1200,
//             height: 800,
//             onInit: function( finder ) {
//                 finder.on( 'files:choose', function( evt ) {
//                     var file = evt.data.files.first();
//                     var output = document.getElementById( elementId );
//                     showUploadedImage(elementId,file.getUrl());
//                 } );

//                 finder.on( 'file:choose:resizedImage', function( evt ) {
//                     var output = document.getElementById( elementId );
//                     output.value = evt.data.resizedUrl;
//                     showUploadedImage(elementId,evt.data.resizedUrl );
//                 } );
//             }
//         } );
//     }
    function showUploadedImage( tab,url ) {
        var link = $('input[name="hostname"').val()+'/'+url;
        var n = $(tab+" .loadImg .box_img" ).length;
            n = n+1;
        var box_img = '<div class="box_img imgid'+n+'">';
            box_img +='<i class="icon-cancel-square icon-2x bg-danger-600" onclick="removeImage(this)" data-classid="imgid'+n+'" data-id="'+n+'"></i>';
            box_img +='<img src="'+link+'">';
            box_img +=' <input type="hidden"  name="image[]" value="'+link+'">';
            box_img += '</div>';
        $(tab+' .loadImg' ).append( box_img );
        
        html = '<div class="image_'+n+'"><img src="'+link+'"</div>';
        if(n == 1){
            $('.box-view .previewImageType').html(html); 
        }
        if(n == 2){
            $('.box-view .previewImageType').append(html); 
        }
        if(n ==3){
            $('.box-view .previewImageType').removeClass('pit2');
            $('.box-view .previewImageType').addClass('pit3');
            $('.box-view .previewImageType').append(html); 
        }
        if(n == 4){
            $('.box-view .previewImageType').removeClass('pit3');
            $('.box-view .previewImageType').addClass('pit4');
            $('.box-view .previewImageType').append(html); 
        }
        if(n == 5){
            var div = '<div class="moreImages">+'+n+'</div>';
            $('.box-view .previewImageType .image_4').append(div);
        }
        if(n >5){
            $('.box-view .previewImageType .moreImages').html('+'+n);
        }
        //get url video
        $(tab+' input[name="video"]').val(link);
        var htmlVideo = '<video controls=""><source src="'+link+'"></video>';
        $('.box-view .previewVideoType').html(htmlVideo);
    }

function removeImage(model){
   let cid = $(model).data('classid');
   let id = $(model).data('id');
  $('.'+cid).remove();
  if(id == 5){
      $('.previewImageType .image_4 .moreImages').remove();
  }
  if(id > 5){
    var nid = Number(id)-1;
    $('.previewImageType .image_4 .moreImages').text('+'+nid);
  }
  if(id == 1){
    $('.previewImageType .image_1').html('');
  }
  if(id == 2){
    $('.previewImageType .image_2').remove();
  }
  if(id == 3){
    $('.box-view .previewImageType').removeClass('pit4');
    $('.box-view .previewImageType').addClass('pit2');
    $('.previewImageType .image_3').remove();
  }
  if(id == 4){
    $('.previewImageType .image_4').remove();
  }
}