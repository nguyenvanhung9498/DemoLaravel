<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mock project</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
@if(isset($userName))
    <h2 style="color: orange"><b> List Evidence of task created by user: {{$userName}}</b></h2>
    <br>
@endif
@if(session()->has('messageUpdateEvidence'))
    <h4 style="color: red; text-align: center" class="messageChange">
      <b>{{session()->get('messageUpdateEvidence')}}</b></h4>
@endif

@if(session()->has('messageAddEvidence'))
    <h4 style="color: red; text-align: center" class="messageChange">
        <b> {{session()->get('messageAddEvidence')}}</b></h4>
@endif

@if(sizeof($listEvidenceByTaskID) != 0)
        <br>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">Link</th>
                <th scope="col">Type</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @for($i = 0 ; $i< sizeof($listEvidenceByTaskID); $i++)
                <tr>
                    <th scope="row">{{$i+1}}</th>
                    <td class="filePath{{$listEvidenceByTaskID[$i]->id}}">
                        <a href="{{asset('storage/store/evidence/'.$listEvidenceByTaskID[$i]->file_path)}}"
                           id="phpImage">{{$listEvidenceByTaskID[$i]->file_path}} </a>
                    </td>
                    <td class="formUpdateEvidence{{$listEvidenceByTaskID[$i]->id}}" hidden>
                        <form action="{{route('updateEvd')}}" enctype="multipart/form-data" method="post" id="formUpdateEvidence{{$listEvidenceByTaskID[$i]->id}}">
                            @csrf
                            <div class="form-group">
                                <input type="file" name="evidence" id="fileUpdate">
                                <input type="text" name="taskID" value="{{$taskID}}" hidden>
                                <input type="text" name="evidenceID" value="{{$listEvidenceByTaskID[$i]->id}}" hidden>
                            </div>
                        </form>
                    </td>
                    @if(strtoupper($listEvidenceByTaskID[$i]->file_type) == 'PNG'
                            || strtoupper($listEvidenceByTaskID[$i]->file_type) =='JPG')
                        <td>Image</td>
                    @endif

                    @if(!(strtoupper($listEvidenceByTaskID[$i]->file_type) == 'PNG'
                            || strtoupper($listEvidenceByTaskID[$i]->file_type) =='JPG'))
                        <td>Document</td>
                    @endif

                    <td>
                        <a href="" class="add" data-toggle="modal">
                            <i class="material-icons" hidden style="color: green" onclick="submitFormAddEvidence()"
                               id="checkAddFile{{$listEvidenceByTaskID[$i]->id}}">check</i>
                            <i class="material-icons" data-toggle="tooltip"
                               title="add" style="color: aqua" id="addFile{{$listEvidenceByTaskID[$i]->id}}"
                                        onclick="showButtoncheckAddFile({{$listEvidenceByTaskID[$i]->id}})">
                                add</i>
                        </a>
                        <a href="" class="edit" data-toggle="modal">
                            <i class="material-icons" data-toggle="tooltip" title="Edit"
                               onclick="showButtoncheckUpdateFile({{$listEvidenceByTaskID[$i]->id}})"
                              id="editFile{{$listEvidenceByTaskID[$i]->id}}" style="color: blue">&#xE254;</i>
                            <i class="material-icons" hidden style="color: green"
                               onclick="submitFormUpdateEvidence({{$listEvidenceByTaskID[$i]->id}})"
                               id="checkUpdateFile{{$listEvidenceByTaskID[$i]->id}}">check</i>
                        </a>
                        <a href="" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip"
                                                                         title="Delete"
                                                                         style="color: red">&#xE872;</i></a>
                    </td>
                </tr>

            @endfor
            </tbody>

        </table>

        <form action="{{route('addEvd')}}" enctype="multipart/form-data" method="post" id="formAddEvidence">
            @csrf
            <div class="form-group" hidden id="addEvidence">
                <input type="file" name="evidence" id="fileAddEvidence">
                <input type="text" name="taskID" value="{{$taskID}}" hidden>
            </div>
        </form>

@endif

@if(sizeof($listEvidenceByTaskID) == 0)
    <h3 style="color: blue">This task has no evidence</h3>
    <br>
    <div style="color: red"> Add evidence for this task</div>
    <form action="{{route('addEvd')}}" enctype="multipart/form-data" method="post" id="formInsertEvidence">
        @csrf
        <div class="form-group">
            <input type="file" name="evidence" id="fileInsertEvidence">
            <input type="text" name="taskID" value="{{$taskID}}" hidden>
        </div>
        <button class="btn btn-success" data-toggle="modal" type="button"
                onclick="submitFormInsertEvidence()"><span>Add New Evidence</span></button>
    </form>

@endif

</body>
<script>
    //Add evidence
    function showButtoncheckAddFile(id) {
        $('#addEvidence').show();
        $('#checkAddFile' + id).show();
        $('#addFile' + id).hide();
    }

    function submitFormAddEvidence(){
        let file = $('#fileAddEvidence').val();
        if (file == '') {
            alert('you must choose a file!!!');
            return;
        }
        $('#formAddEvidence').submit();
    }
    //Update evidence
    function showButtoncheckUpdateFile(id) {
        $('.formUpdateEvidence'+id).show();
        $('.filePath' +id).hide();
        $('#checkUpdateFile' + id).show();
        $('#addFile' + id).hide();
    }
    function submitFormUpdateEvidence(id){
        let file = $('#fileUpdate').val();
        if (file == '') {
            alert('you must choose a file!!!');
            return;
        }
        $('#formUpdateEvidence'+id).submit();
    }

    function submitFormInsertEvidence() {
        let file = $('#fileInsertEvidence').val();
        if (file == '') {
            alert('you must choose a file!!!');
            return;
        } else {
            $('#formInsertEvidence').submit();
        }
    }

    $(document).ready(function () {
        setTimeout(() => {
            $('.messageChange').hide();
        }, 3000)
    });
</script>
</html>
