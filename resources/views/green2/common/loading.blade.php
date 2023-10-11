{{--loading开始--}}
    <div class="loadings">
          <div class="gif"><img src="../mobile/green2/images/local-loading-01f7cf76.gif" /></div>
    </div>
  <style>
  .loadings{width:100%;height:100%;position:fixed; background:rgba(20, 20, 19, 1);z-index:999999;top:0;left:0;display: none;}
  @keyframes loading-1d2e48ee {
	to {
		background-position: -6912px
	}
}
  .gif{
    width:180px;
    height:108px;
    position:absolute;
    left:50%;
    top:50%;
    margin:-54px 0 0 -90px;
  }

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