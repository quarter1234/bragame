<div class="yh_top">
        <div class="yh_t_list">
            <h2>{{ $invite['one_grade_count'] }}</h2>
            <p>一级邀请</p>
        </div>
        <div class="yh_t_list">
            <h2>{{ $invite['two_grade_count'] }}</h2>
            <p>二级邀请</p>
        </div>
</div>
<div class="yh_table">
    <table>
        <thead>
        <tr>
            <td>序号</td>
            <td>名字</td>
            <td>级数</td>
            <td>时间</td>
        </tr>
        </thead>
        <tbody>
        @foreach($invite['list'] as $key => $item)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $item['descendant']['playername'] }}</td>
            <td>{{ $item['ancestor_h'] }}</td>
            <td>{{ $item['descendant']['create_time'] }}</td>
        </tr>
        @endforeach  
        </tbody>
    </table>
</div>