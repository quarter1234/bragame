<div class="yh_top">
        <div class="yh_t_list">
            <h2>{{ $invite['one_grade_count'] }}</h2>
            <p>Convite nível 1{{--一级邀请--}}</p>
        </div>
        <div class="yh_t_list">
            <h2>{{ $invite['two_grade_count'] }}</h2>
            <p>Convite nível 1{{--二级邀请--}}</p>
        </div>
</div>

{{--loading组件--}}
@include('mobile.common.loading')

<div class="yh_table">
    <table>
        <thead>
        <tr>
      
            <td>prenome</td>
            <td>série</td>
            <td>tempo</td>
        </tr>
        </thead>
        <tbody id="tab3_content_invites">
        </tbody>
    </table>
    
    <div style="width:100%;text-align:center;margin-top:1rem">
        <button id="invite_load_more" page="0" onclick="loadInvites()"  style="color:#fff; font-size:14px;">{{--点击加载更多--}}Clique para carregar mais</button>
    </div>

</div>

<script>
    function loadInvites() {
        let page = $('#invite_load_more').attr('page');
          showLoading();
          $.ajax({
              url : "{{url('mobile/share/invites')}}",
              type : 'GET',
              data : {page: parseInt(page) + 1},
              success : function (data) {
                hideLoading();
                $('#invite_load_more').attr('page', data.data.current_page);
                data.data.data.forEach(element => {
                    let item = '<tr><td>'+element.descendant.playername+'</td><td>'+element.ancestor_h+'</td><td>'+element.descendant.create_time+'</td></tr>';
                  $('#tab3_content_invites').append(item)
                })
              }
          })
    }
    
    $(document).ready(function() {
            loadInvites();  
    })
</script>