{{--loading开始--}}
    <div class="loadings">
    <div class="parentBox">
    <svg class="scalableBox" viewBox="0 0 128 256" width="128px" height="256px" xmlns="http://www.w3.org/2000/svg">
      <defs>
        <linearGradient id="ap-grad1" x1="0" y1="0" x2="0" y2="1">
          <stop offset="0%" stop-color="hsl(223,90%,55%)" />
          <stop offset="100%" stop-color="hsl(253,90%,55%)" />
        </linearGradient>
        <linearGradient id="ap-grad2" x1="0" y1="0" x2="0" y2="1">
          <stop offset="0%" stop-color="hsl(193,90%,55%)" />
          <stop offset="50%" stop-color="hsl(223,90%,55%)" />
          <stop offset="100%" stop-color="hsl(253,90%,55%)" />
        </linearGradient>
      </defs>
      <circle class="apringBox" r="56" cx="64" cy="192" fill="none" stroke="#ddd" stroke-width="16" stroke-linecap="round" />
      <circle class="apwormOneBox" r="56" cx="64" cy="192" fill="none" stroke="url(#ap-grad1)" stroke-width="16" stroke-linecap="round"
        stroke-dasharray="87.96 263.89" />
      <path class="apwormTwoBox" d="M120,192A56,56,0,0,1,8,192C8,161.07,16,8,64,8S120,161.07,120,192Z" fill="none" stroke="url(#ap-grad2)"
        stroke-width="16" stroke-linecap="round" stroke-dasharray="87.96 494" />
    </svg>
  </div>
  </div>
  <style lang="less" scoped>
  .loadings{width:100%;height:100%;position:fixed; background:rgba(0,0,0,.5);z-index:9999;top:0;left:0;display: none;}
  .parentBox {
    position:absolute;
    top:50%;
    left:50%;
    margin:-70px 0 0 -20px;
      .scalableBox {
        width: 40px;
        height: 70px;
      }
      .apringBox {
        transition: stroke 0.3s;
      }
    
      .apwormOneBox,
      .apwormTwoBox {
        animation-duration: 3s;
        animation-iteration-count: infinite;
      }
      .apwormTwoBox {
        animation-name: worm2;
        visibility: hidden;
      }
      .apwormOneBox {
        animation-name: worm1;
      }
  }
 
@media (prefers-color-scheme: dark) {
  :root {
    --bg: hsl(var(--hue), 10%, 10%);
    --fg: hsl(var(--hue), 10%, 90%);
  }
 
  .apringBox {
    stroke: hsla(var(--hue), 10%, 90%, 0.9);
  }
}
 
@keyframes worm1 {
  from {
    animation-timing-function: ease-in-out;
    stroke-dashoffset: -87.96;
  }
 
  20% {
    animation-timing-function: ease-in;
    stroke-dashoffset: 0;
  }
 
  60% {
    stroke-dashoffset: -791.68;
    visibility: visible;
  }
 
  60.1%,
  to {
    stroke-dashoffset: -791.68;
    visibility: hidden;
  }
}
 
@keyframes worm2 {
  from,
  60% {
    stroke-dashoffset: -87.96;
    visibility: hidden;
  }
 
  60.1% {
    animation-timing-function: cubic-bezier(0, 0, 0.5, 0.75);
    stroke-dashoffset: -87.96;
    visibility: visible;
  }
 
  77% {
    animation-timing-function: cubic-bezier(0.5, 0.25, 0.5, 0.88);
    stroke-dashoffset: -340;
    visibility: visible;
  }
 
  to {
    stroke-dashoffset: -669.92;
    visibility: visible;
  }
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