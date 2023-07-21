<div class="modal_w_two">
        <div class="modal_w_two">
               <p>11111</p>
               <button>111111</button>
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
.modal_w_two{
    width:260px;
    padding:10px 0;
    height:120px;
    background:#fff;
    border-radius:10px;
    position:absolute;
    left:50%;
    top:50%;
    margin:-50px 0 0 -130px;
    text-align:center;
    font-size:14px;
}
.modal_two p{
    color:#000;
    padding-top:20px;
}
.modal_two button{
    width:180px;
    height:30px;
    background:#05b3e6;
    border-radius:5px;
    color:#fff;
    font-size:14px;
}
</style>
<script>
    
    $(function(){
       $('body,html').addClass('notScroll')
       $('.modal button').click(function(){
        $('body,html').removeClass('notScroll')
        $('.modal_w_two').hide()
       })
    })
</script>