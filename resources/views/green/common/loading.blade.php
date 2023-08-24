{{--loading开始--}}
    <div class="loadings">
          <div class="gif"><img src="https://baxigame1.s3.sa-east-1.amazonaws.com/bx_4/public/static/images/20150210104952902.gif" /></div>
    </div>
  <style>
  .loadings{width:100%;height:100%;position:fixed; background:rgba(0,0,0,.5);z-index:9999;top:0;left:0;display: none;}
  .gif{width:32px;height:32px; position:absolute;top:50%;left:50%;margin:-16px 0 0 -16px;}
</style>
<script>
  function showLoading() {
    $('.loadings').show()
  }

  function hideLoading() {
    $('.loadings').hide()
  }
</script>
{{--loading结束--}}