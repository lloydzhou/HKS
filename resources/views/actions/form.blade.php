<div class="form-row ml-5">
    <div class="form-group col-md-4">
        <label for="action_title">Action 具體作為</label>
        <input type="text" class="form-control" name="act_title" id="action_title" value="{{ $action ? $action->title:'' }}">
    </div>
    <div class="form-group col-md-2">
        <label for="started_at">起始日</label>
        <input autocomplete="off" class="form-control" name="st_date" id="started_at" value="{{  $action ? $action->started_at:'' }}">
    </div>
    <div class="form-group col-md-2">
        <label for="finished_at">完成日</label>
        <input autocomplete="off" class="form-control" name="fin_date" id="finished_at" value="{{  $action ? $action->finished_at:'' }}">
    </div>
    <div class="form-group col-md-2">
    <label for="priority">優先度</label>
    <select id="priority" class="form-control" name="priority" >
        @foreach($priorities as $priority)
        @if($action)
            @if($action->priority==$priority->id)
            <option selected value="{{$priority->id}}">{{$priority->priority}}</option>
            @else
            <option value="{{$priority->id}}">{{$priority->priority}}</option>
            @endif
        @else
        <option value="{{$priority->id}}">{{$priority->priority}}</option>
        @endif
        @endforeach
    </select>
    </div>
    <div class="form-group col-md-2">
    <label for="krs_id">關聯KR</label>
        <select class="form-control" name="krs_id" id="keyresult" >
            @foreach ($keyresults as $keyresult)
            @if($action)
                @if($keyresult->id==$action->related_kr)
                    <option selected value="{{ $keyresult->id }}">{{ $keyresult->title }}</option>
                @else
                    <option value="{{ $keyresult->id }}">{{ $keyresult->title }}</option>
                @endif
            @else
                <option value="{{ $keyresult->id }}">{{ $keyresult->title }}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-12">
        <label for="action_content">內容</label>
        <textarea class="form-control" id="action_content" rows="15" name="act_content" >{{ $action ? $action->content:'' }}</textarea>
    </div>
        <div class="col-md-12">
            @if(!empty($files))
            @foreach($files as $file)
            <a href="{{ route('actions.destroyFile',['id'=>$action->id,'file_path'=>$file]) }}"><i class="fas fa-times"></i></a>    
            :
                <a href="{{ route('download',['file'=>$file,'action_id'=>$action->id]) }}" >
                {{ $file }}
                </a>  |
            @endforeach
        @endif
    </div>
    <div class="form-group col-md-11">
        <label for="files">上傳附件</label>
        <input type="file" class="form-group" name="files[]" id="files" multiple>
    </div>
    <button class="btn btn-primary btn-sm mb-1 mt-1 " type="submit">送出</button>
</div> 