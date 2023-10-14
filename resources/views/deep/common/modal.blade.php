<div class="modal_w">
        <div class="modal modal_content">
              <div class="modal_top"></div>
              <div class="kl"></div> 
              <p></p>
        </div>
</div>
<style>
    .modal_w{
        width:100%;
        height:100%;
        position:fixed;
        z-index:9999;
        background:rgba(0, 0, 0, 0.8);
        display:none;
        top:0;
        left:0;
        overflow:hidden;
    }
    .kl{
        width:100px;
        height:100px;
        background:url(/mobile/deep/images/hs_ico.png) no-repeat;
        background-size:100px 100px;
        margin:10px auto;
    }
    
.notScroll {
    overflow: hidden;
}
.modal{
    width:260px;
    height:220px;
    background:#fff;
    border-radius:10px;
    position:absolute;
    left:50%;
    top:50%;
    margin:-110px 0 0 -130px;
    text-align:center;
    color:#000;
    display:table-cell;
    text-align:center;
    vertical-align:middle;
}
.modal p{
    width:100%;
    clear:both;
    font-size:16px;
}
.modal_top{
    width:20px;
    height:20px;
    float:right;
    background:url(../mobile/img/gb_ico.png) no-repeat;
    background-size:20px 20px;
    margin-right:5px;
    margin-top:5px;
}
</style>
<script>
    function showModal(msg) {
        $('.modal_content p').text(msg);
        $('body,html').addClass('notScroll')
        $('.modal_w').show()
    }
   
    function hideModal() {
        $('.modal_w').hide()
        $('.modal_content p').text('');
    }

    $(function(){
       $('.modal_top').click(function(){
            $('body,html').removeClass('notScroll')
            $('.modal_w').hide()
            $('.modal_content p').text('');
       })
    })
</script>