<div class="modal_w_two">
        <div class="modal_w_two modal_sub_content">
        <div class="kl"></div> 
               <p></p>
               <button class="modal_sub_ok">OK</button>
        </div>
</div>
<style>
    .modal_w_two{
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
    
.notScroll_two {
    overflow: hidden;
}
.kl{
        width:100px;
        height:100px;
        background:url(/mobile/deep/images/hs_ico.png) no-repeat;
        background-size:100px 100px;
        margin:10px auto;
    }
.modal_w_two{
    width:260px;
    padding:10px 0;
    height:220px;
    background:#fff;
    border-radius:10px;
    position:absolute;
    left:50%;
    top:50%;
    margin:-110px 0 0 -130px;
    text-align:center;
    font-size:14px;
}
.modal_w_two p{
    color:#000;
    padding-top:20px;
}
.modal_w_two button{
    width:180px;
    height:30px;
    background:#05b3e6;
    border-radius:5px;
    color:#fff;
    font-size:14px;
}
</style>
<script>
    function showModalSub(msg) {
        $('.modal_sub_content p').text(msg);
        $('.modal_w_two').show()
    }
   
    function hideModalSub() {
        $('.modal_w_two').hide()
        $('.modal_sub_content p').text('');
    }

    $(function(){
       $('.modal_w_two button').click(function(){
        $('body,html').removeClass('notScroll')
        $('.modal_w_two').hide()
       })
    })
</script>