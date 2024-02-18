{{--对话框--}}
<div id="comm-dialog" style="display: none">
    <div class="dialog-box">
        <div class="content">
            <p id="comm-dialog-content"></p>
        </div>
        <div class="button-box">
            <div id="comm-dialog-cancel-btn" class="btn"> Cancelamento</div>
            <div id="comm-dialog-ok-btn" class="btn"> Determinam</div>
        </div>
    </div>
</div>

<script>
    $(function() {
      $('#comm-dialog-cancel-btn').click(function() {
          $('#comm-dialog').css('display', 'none');
      });
    });
</script>

<style>
    #comm-dialog {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 9999;
        width: 100vw;
        height: 100vh;
        background-color: rgba(0, 0, 0, .5);
    }

    #comm-dialog>.dialog-box {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 80%;
        height: 20%;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        background-color: #fff;
        color: #000;
        font-size: 16px;
        border-radius: 8px;
    }

    #comm-dialog>.dialog-box>.content {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 0 20px;
    }

    #comm-dialog>.dialog-box>.content>p {
        text-align: center;
    }

    #comm-dialog>.dialog-box>.button-box {
        display: flex;
        align-items: center;
        border-top: 1px solid rgba(200, 200, 200, .5);
    }

    #comm-dialog>.dialog-box>.button-box .btn {
        flex: 1;
        height: 40px;
        line-height: 40px;
        text-align: center;
    }

    #comm-dialog-cancel-btn {
        border-right: 1px solid rgba(200, 200, 200, .25);
    }

    #comm-dialog-ok-btn {
        border-left: 1px solid rgba(200, 200, 200, .25);
        color: rgb(0, 122, 255);
    }
</style>
