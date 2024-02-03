{{--loading开始--}}
    <div class="loadings">
          <div class="gif"></div>
    </div>
  <style>
  .loadings{width:100%;height:100%;position:fixed; background:rgba(0,0,0,.5);z-index:999999;top:0;left:0;display: none;}
  @keyframes loading-1d2e48ee {
	to {
		background-position: -6912px
	}
}
  .gif{
    width: 144px;
	height: 200px;
	transform: scale(.3);
	animation: loading-1d2e48ee 2.5s steps(48) 0s infinite;
  background:url(/mobile/black/images/loading.png);
  position:absolute;
  z-index:999999;
  top:50%;
  left:50%;
  margin:-100px 0 0 -72px;
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