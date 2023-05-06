<!DOCTYPE html>
<html lang="en">
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
    <style>
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;
        }
        .table-responsive {
            margin: 30px 0;
        }
        .table-wrapper {
            min-width: 1000px;
            background: #fff;
            padding: 20px 25px;
            border-radius: 3px;
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .table-title {
            padding-bottom: 15px;
            background: #435d7d;
            color: #fff;
            padding: 16px 30px;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }
        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }
        .table-title .btn-group {
            float: right;
        }
        .table-title .btn {
            color: #fff;
            float: right;
            font-size: 13px;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }
        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }
        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }
        table.table tr th, table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }
        table.table tr th:first-child {
            width: 60px;
        }
        table.table tr th:last-child {
            width: 100px;
        }
        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }
        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }
        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }
        table.table td:last-child i {
            opacity: 0.9;
            font-size: 22px;
            margin: 0 5px;
        }
        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
            outline: none !important;
        }
        table.table td a:hover {
            color: #2196F3;
        }
        table.table td a.edit {
            color: #FFC107;
        }
        table.table td a.delete {
            color: #F44336;
        }
        table.table td i {
            font-size: 19px;
        }
        table.table .avatar {
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }
        .pagination {
            float: right;
            margin: 0 0 5px;
        }
        .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 2px !important;
            text-align: center;
            padding: 0 6px;
        }
        .pagination li a:hover {
            color: #666;
        }
        .pagination li.active a, .pagination li.active a.page-link {
            background: #03A9F4;
        }
        .pagination li.active a:hover {
            background: #0397d6;
        }
        .pagination li.disabled i {
            color: #ccc;
        }
        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }
        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
        }
        /* Custom checkbox */
        .custom-checkbox {
            position: relative;
        }
        .custom-checkbox input[type="checkbox"] {
            opacity: 0;
            position: absolute;
            margin: 5px 0 0 3px;
            z-index: 9;
        }
        .custom-checkbox label:before{
            width: 18px;
            height: 18px;
        }
        .custom-checkbox label:before {
            content: '';
            margin-right: 10px;
            display: inline-block;
            vertical-align: text-top;
            background: white;
            border: 1px solid #bbb;
            border-radius: 2px;
            box-sizing: border-box;
            z-index: 2;
        }
        .custom-checkbox input[type="checkbox"]:checked + label:after {
            content: '';
            position: absolute;
            left: 6px;
            top: 3px;
            width: 6px;
            height: 11px;
            border: solid #000;
            border-width: 0 3px 3px 0;
            transform: inherit;
            z-index: 3;
            transform: rotateZ(45deg);
        }
        .custom-checkbox input[type="checkbox"]:checked + label:before {
            border-color: #03A9F4;
            background: #03A9F4;
        }
        .custom-checkbox input[type="checkbox"]:checked + label:after {
            border-color: #fff;
        }
        .custom-checkbox input[type="checkbox"]:disabled + label:before {
            color: #b8b8b8;
            cursor: auto;
            box-shadow: none;
            background: #ddd;
        }
        /* Modal styles */
        .modal .modal-dialog {
            max-width: 400px;
        }
        .modal .modal-header, .modal .modal-body, .modal .modal-footer {
            padding: 20px 30px;
        }
        .modal .modal-content {
            border-radius: 3px;
        }
        .modal .modal-footer {
            background: #ecf0f1;
            border-radius: 0 0 3px 3px;
        }
        .modal .modal-title {
            display: inline-block;
        }
        .modal .form-control {
            border-radius: 2px;
            box-shadow: none;
            border-color: #dddddd;
        }
        .modal textarea.form-control {
            resize: vertical;
        }
        .modal .btn {
            border-radius: 2px;
            min-width: 100px;
        }
        .modal form label {
            font-weight: normal;
        }
    </style>
    <script>
    // sorting task
        function sortByCreator() {
            var currentPage = $('.active').text().trim();
            if (!($('#sortByCreatorASC').is(":visible"))) {
                $('#sortByCreatorASC').show();
                $('#sortByCreatorDESC').hide();
                window.location.assign('/listtask?currentPage=' + currentPage + '&sortTask=creator&operatorOrder=ASC');
            } else {
                $('#sortByCreatorASC').hide();
                $('#sortByCreatorDESC').show();
                window.location.assign('/listtask?currentPage=' + currentPage + '&sortTask=creator&operatorOrder=DESC');
            }
        }

        function sortByTitle() {
            var currentPage = $('.active').text().trim();
            if (!($('#sortByTitleASC').is(":visible"))) {
                $('#sortByTitleASC').show();
                $('#sortByTitleDESC').hide();
                window.location.assign('/listtask?currentPage=' + currentPage + '&sortTask=title&operatorOrder=ASC');
            } else {
                $('#sortByTitleASC').hide();
                $('#sortByTitleDESC').show();
                window.location.assign('/listtask?currentPage=' + currentPage + '&sortTask=title&operatorOrder=DESC');
            }
        }

    function sortByDescription() {
        var currentPage = $('.active').text().trim();
        if (!($('#sortByDescriptionASC').is(":visible"))) {
            $('#sortByDescriptionASC').show();
            $('#sortByDescriptionDESC').hide();
            window.location.assign('/listtask?currentPage=' + currentPage + '&sortTask=description&operatorOrder=ASC');
        } else {
            $('#sortByDescriptionASC').hide();
            $('#sortByDescriptionDESC').show();
            window.location.assign('/listtask?currentPage=' + currentPage + '&sortTask=description&operatorOrder=DESC');
        }
    }

    function sortByStatus() {
        var currentPage = $('.active').text().trim();
        if (!($('#sortByStatusASC').is(":visible"))) {
            $('#sortByStatusASC').show();
            $('#sortByStatusDESC').hide();
            window.location.assign('/listtask?currentPage=' + currentPage + '&sortTask=status&operatorOrder=ASC');
        } else {
            $('#sortByStatusASC').hide();
            $('#sortByStatusDESC').show();
            window.location.assign('/listtask?currentPage=' + currentPage + '&sortTask=status&operatorOrder=DESC');
        }
    }

        // change element to input element
        function changeToInputRecord(id){
            $("#titleOfTask" + id).hide();
            $("#descriptionOfTask" + id).hide();
            $("#statusOfTask" + id).hide();
            $("#editTask" + id).hide();

            $("#titleOfTaskInput" + id).show();
            $("#descriptionOfTaskInput" + id).show();
            $("#statusOfTaskInput" + id).show();
            $("#checkWhenUpdateTask" + id).show();

        }

        //update task by id
        function updateTaskById(id) {
            //get data from input
            let title = $("#titleOfTaskInput" + id).val();
            let description = $("#descriptionOfTaskInput" + id).val();
            let status = $("#statusOfTaskSelect" + id).val();

            // validate data
            if (title.trim() == '') {
                alert('Title cannot be empty ');
                return
            }
            if (description.trim() == '') {
                alert('Description cannot be empty ');
                return
            }
            if (status == '0') {
                alert('Please choose your status ');
                return
            }

            let task = {
                'id': id,
                'title': title,
                'description': description,
                'status': status
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: '/updateTaskById',
                data: task,
                success: function () {
                    window.location.assign('/updateTask');
                }
            });
        }

        //delete task
        function deleteTaskById(id) {
            let confirm = window.confirm('Are you sure delete this record?');
            if (!confirm) return;
            let task = [];
            task.push(id);
            window.location.assign('/deleteTask?ids=' + task.toString());
        }

        //delete many task
        var listask = @json($listTask);
        function deleteTaskByListId() {
            //check all of items want to delete
            let listTaskDelete = [];

            for (let i = 0; i < listask.length; i++) {
                if ($('#checkbox' + listask[i].id).is(":checked")) {
                    listTaskDelete.push(listask[i].id);
                }
            }
            window.location.assign('/deleteTaskByListId?ids=' + listTaskDelete.toString());
        }

        function showMessageValidate() {
            let listTaskDelete = [];
            for (let i = 0; i < listask.length; i++) {
                if ($('#checkbox' + listask[i].id).is(":checked")) {
                    listTaskDelete.push(listask[i].id);
                }
            }

            if (listTaskDelete.length == 0) {
                $('#messsageDeleteConfirm').hide();
                $('#messageDeleteValidate').show();
                $('#deleteTaskById').attr("disabled", true);

            } else {
                $('#messsageDeleteConfirm').show();
                $('#messageDeleteValidate').hide();
                $('#deleteTaskById').attr("disabled", false);
            }
        }

        function checkExtentionFile(extentionToUper) {
            if (extentionToUper == 'DOC' || extentionToUper == 'DOCX' || extentionToUper == 'PNG'
                || extentionToUper == 'MP4' || extentionToUper == 'JPG' || extentionToUper == 'JPEG') {
                return true;
            }
            return false;
        }

        $(document).ready(function(){
            //show number of record for each page
            var totalRecord = @json($totalRecord);
            var searchTask = @json($searchTask);
            var sortTask = @json($sortTask);
            var operator = @json($operator);

            function showSortIcon() {
                if (sortTask == 'creator') {
                    if (operator == 'ASC') {
                        $('#sortByCreatorASC').show();
                        $('#sortByCreatorDESC').hide();
                    } else {
                        $('#sortByCreatorASC').hide();
                        $('#sortByCreatorDESC').show();
                    }
                }

                if (sortTask == 'title') {
                    if (operator == 'ASC') {
                        $('#sortByTitleASC').show();
                        $('#sortByTitleDESC').hide();
                    } else {
                        $('#sortByTitleASC').hide();
                        $('#sortByTitleDESC').show();
                    }
                }

                if (sortTask == 'description') {
                    if (operator == 'ASC') {
                        $('#sortByDescriptionASC').show();
                        $('#sortByDescriptionDESC').hide();
                    } else {
                        $('#sortByDescriptionASC').hide();
                        $('#sortByDescriptionDESC').show();
                    }
                }

                if (sortTask == 'status') {
                    if (operator == 'ASC') {
                        $('#sortByStatusASC').show();
                        $('#sortByStatusDESC').hide();
                    } else {
                        $('#sortByStatusASC').hide();
                        $('#sortByStatusDESC').show();
                    }
                }
            }

            showSortIcon();

            var numberOfPage = 5;
            var currentPage = $('.active').text();

            function showNumberRecord() {
                if (searchTask != null) {
                    $('#boxTextSearchTask').val(searchTask);
                }

                if (totalRecord < 5) {
                    $('#numberOfRecord').html("Showing <b>" + totalRecord + "</b> out of " + "<b>" + totalRecord + "</b>  entries");
                } else {
                    if (numberOfPage * currentPage <= totalRecord) {
                        $('#numberOfRecord').html("Showing <b>" + numberOfPage * currentPage
                            + "</b> out of " + "<b>" + totalRecord + "</b>  entries");
                    } else {
                        $('#numberOfRecord').html("Showing <b>" + totalRecord
                            + "</b> out of " + "<b>" + totalRecord + "</b>  entries");
                    }
                }
            }

            showNumberRecord();

            // hide messgage after delete record
            setTimeout(() => {
                $('#messageCreateSuccess').hide();
            }, 3000);

            setTimeout(() => {
                $('#messageUpdateSuccess').hide();
            }, 3000);

            setTimeout(() => {
                $('#messageDeleteSuccess').hide();
            }, 3000);

            //Add evidences
            $('#addEvidence').click(function (){
                $('#allEvidences').append("<input type='file' id='fileEvidence' name='evidences[]' class='fileEvidence'>");
            })
            $('#addEvidenceUpdate').click(function (){
                $('#allEvidences').append("<input type='file' id='fileEvidence' name='evidences[]' class='fileEvidence'>");
            })

            // Check validate when add task
            $("#addTask").click(function () {
                if ($('#addTitle').val().trim() == '') {
                    alert('Title cannot be empty ');
                    return
                }
                if ($('#addDescription').val().trim() == '') {
                    alert('Description cannot be empty ');
                    return;
                }
                if ($('#addStatus').val() == '0') {
                    alert('Please choose your status ');
                    return;
                }

                let isSubmit = true;
                $('.fileEvidence').each(function () {
                    let file = $(this).prop('files');
                    if (file.length != 0) {
                        let fileName = file[0].name;
                        let extention = fileName.split('.')[1];
                        console.log(extention);
                        if (!checkExtentionFile(extention.toString().toUpperCase())) {
                            alert('File have to extention are: doc, docx, png, jpg, jpeg, mp4');
                            isSubmit = false;
                        }
                    }
                })

                if(isSubmit){
                    $('#createTask').submit();
                }else {
                    return;
                }

            });

            //search task
            $('#searchTask').click(function () {
                var currentPage = $('.active').text().trim();
                textSeartchTask = $('#boxTextSearchTask').val().trim();
                window.location.assign('/listtask?currentPage=' + currentPage + '&searchTask=' + textSeartchTask);
            })

            // Activate tooltip
            $('[data-toggle="tooltip"]').tooltip();

            // Select/Deselect checkboxes
            var checkbox = $('table tbody input[type="checkbox"]');
            $("#selectAll").click(function(){
                if(this.checked){
                    checkbox.each(function(){
                        this.checked = true;
                    });
                } else{
                    checkbox.each(function(){
                        this.checked = false;
                    });
                }
            });
            checkbox.click(function(){
                if(!this.checked){
                    $("#selectAll").prop("checked", false);
                }
            });
        });
    </script>
</head>
<body>
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">

                    @if (session()->has('messageDeleteSuccess'))
                        <h4 class="alert alert-success" style="text-align: right; color: red"
                            id="messageDeleteSuccess">
                            {{ session()->get('messageDeleteSuccess') }}
                        </h4>
                    @endif

                    @if (session()->has('messageCreateSuccess'))
                        <h4 class="alert alert-success" style="text-align: right; color: red"
                            id="messageCreateSuccess">
                            {{ session()->get('messageCreateSuccess') }}
                        </h4>
                    @endif

                    @if (session()->has('messageUpdateSuccess'))
                        <h4 class="alert alert-success" style="text-align: right; color: red"
                            id="messageUpdateSuccess">
                            {{ session()->get('messageUpdateSuccess') }}
                        </h4>
                    @endif

                    <div class="col-xs-6">
                        <h2>Manage <b>List Task Of User</b></h2>
                        <div>
                            <input id="boxTextSearchTask" type="text" placeholder="Enter text want to search"
                                   style="width: 240px; color: #1a202c" >
                            <button style="color: red" id="searchTask"><b>Search</b></button>
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <a href="{{route('logout')}}" class="btn btn-warning" data-toggle="modal"><span>Log out </span></a>
                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Task</span></a>
                        <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal" onclick="showMessageValidate()"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>
								<span class="custom-checkbox">
									<input type="checkbox" id="selectAll">
									<label for="selectAll"></label>
								</span>
                    </th>
                    <th onclick="sortByCreator()">
                        Creator &nbsp;
                        <span class="glyphicon glyphicon-chevron-down" style="display: none" id="sortByCreatorDESC"></span>
                        <span class="glyphicon glyphicon-chevron-up" style="display: none" id="sortByCreatorASC"></span>
                    </th>
                    <th onclick="sortByTitle()">
                        Title &nbsp;
                        <span class="glyphicon glyphicon-chevron-down" style="display: none" id="sortByTitleDESC"></span>
                        <span class="glyphicon glyphicon-chevron-up" style="display: none" id="sortByTitleASC"></span>
                    </th>
                    <th onclick="sortByDescription()">
                        Description &nbsp;
                        <span class="glyphicon glyphicon-chevron-down" style="display: none" id="sortByDescriptionDESC"></span>
                        <span class="glyphicon glyphicon-chevron-up" style="display: none" id="sortByDescriptionASC"></span>
                    </th>
                    <th onclick="sortByStatus()">
                        Status &nbsp;
                        <span class="glyphicon glyphicon-chevron-down" style="display: none" id="sortByStatusDESC"></span>
                        <span class="glyphicon glyphicon-chevron-up" style="display: none" id="sortByStatusASC"></span>
                    </th>
                    <th>Evidence</th>
                    <th>Actions</th>
                </tr>
                </thead>
                @foreach($listTask as $data)
                <tbody>
                <tr>
                    <td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox{{$data['id']}}" name="options[]" value="1">
									<label for="checkbox{{$data['id']}}"></label>
								</span>
                    </td>

                    <td>
                        <div id ="userNameOfTask{{$data['id']}}">{{$data['user_name']}}</div>
                    </td>

                    <td>
                        <div id="titleOfTask{{$data['id']}}">{{$data['title']}}</div>
                        <input id="titleOfTaskInput{{$data['id']}}" value="{{$data['title']}}" hidden>
                    </td>

                    <td>
                        <div id="descriptionOfTask{{$data['id']}}">{{$data['description']}}</div>
                        <input id="descriptionOfTaskInput{{$data['id']}}" value="{{$data['description']}}" hidden>
                    </td>

                    @switch($data['status'])
                        @case('1')
                        <td id="statusOfTask{{$data['id']}}">Open</td>
                        <td id="statusOfTaskInput{{$data['id']}}" hidden>
                            <select class="" id="statusOfTaskSelect{{$data['id']}}" required>
                                <option value="0">Please select status of task</option>
                                <option value="1" selected>Open</option>
                                <option value="2">Inprogress</option>
                                <option value="3">Review</option>
                                <option value="4">Done</option>
                            </select>
                        </td>
                        @break

                        @case('2')
                        <td id="statusOfTask{{$data['id']}}">Inprogress</td>
                        <td id="statusOfTaskInput{{$data['id']}}" hidden>
                            <select class="" id="statusOfTaskSelect{{$data['id']}}" required>
                                <option value="0">Please select status of task</option>
                                <option value="1">Open</option>
                                <option value="2" selected>Inprogress</option>
                                <option value="3">Review</option>
                                <option value="4">Done</option>
                            </select>
                        </td>
                        @break

                        @case('3')
                        <td id="statusOfTask{{$data['id']}}">Review</td>
                        <td id="statusOfTaskInput{{$data['id']}}" hidden>
                            <select class="" id="statusOfTaskSelect{{$data['id']}}" required>
                                <option value="0">Please select status of task</option>
                                <option value="1">Open</option>
                                <option value="2">Inprogress</option>
                                <option value="3" selected>Review</option>
                                <option value="4">Done</option>
                            </select>
                        </td>
                        @break

                        @case('4')
                        <td id="statusOfTask{{$data['id']}}">Done</td>
                        <td id="statusOfTaskInput{{$data['id']}}" hidden>
                            <select class="" id="statusOfTaskSelect{{$data['id']}}" required>
                                <option value="0">Please select status of task</option>
                                <option value="1">Open</option>
                                <option value="2">Inprogress</option>
                                <option value="3">Review</option>
                                <option value="4" selected>Done</option>
                            </select>
                        </td>
                        @break
                        @default
                        <td id="statusOfTask{{$data['id']}}"></td>
                        <td id="statusOfTaskInput{{$data['id']}}" hidden>
                            <select class="" id="statusOfTaskSelect{{$data['id']}}" required>
                                <option value="0">Please select status of task</option>
                                <option value="1">Open</option>
                                <option value="2">Inprogress</option>
                                <option value="3">Review</option>
                                <option value="4">Done</option>
                            </select>
                        </td>
                    @endswitch
                    <td>
                        <a href="/evidence?taskID={{$data['id']}}" id="evidenceAElement{{$data['id']}}">View evidence</a>
                    </td>
                    <td>
                        <a href="" class="edit" data-toggle="modal">
                            <i class="material-icons" data-toggle="tooltip" title="Edit" id="editTask{{$data['id']}}"
                               onclick="changeToInputRecord({{$data['id']}})">&#xE254;</i>
                            <i class="material-icons" id="checkWhenUpdateTask{{$data['id']}}" hidden
                               onclick="updateTaskById({{$data['id']}})" style="color: green">check</i>
                        </a>

                        <a href="" class="delete" data-toggle="modal" onclick="deleteTaskById({{$data['id']}})"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
                        {{ csrf_field() }}
                    </td>
                </tr>
                </tbody>
                @endforeach
            </table>
            <div class="clearfix">
                <div class="hint-text" id ='numberOfRecord'></div>
                <ul class="pagination">
                    @php
                        $num = $totalRecord/5;
                        $totalPage = floor($num) == $num ? $num : (floor($num) +1);
                    @endphp

                    @if($currentPage == 1)
                        <li class="page-item disabled"><a href="">Previous</a></li>
                    @endif
                    @if($currentPage != 1)
                        <li class="page-item"><a href="/listtask?currentPage={{$currentPage - 1}}">
                                Previous</a></li>
                    @endif

                    @for ($i=1; $i <= $totalPage; $i++)
                        @if( $i == $currentPage)
                            <li class="page-item active">
                                <a href="/listtask?currentPage={{$i}}" class="page-link">{{$i}}</a>
                            </li>
                        @endif
                        @if($i != $currentPage)
                            <li class="page-item"><a href="/listtask?currentPage={{$i}}" class="page-link">{{$i}}</a>
                            </li>
                        @endif
                    @endfor

                    @if($currentPage == $totalPage)
                        <li class="page-item disabled"><a href=""
                                                          class="page-link">Next</a></li>
                    @endif
                    @if($currentPage != $totalPage)
                        <li class="page-item"><a href="/listtask?currentPage={{$currentPage + 1}}"
                                                 class="page-link">Next</a></li>
                    @endif

                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('insertTask')}}", method="post" id="createTask" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add Task</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" id="addTitle"required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" id="addDescription"required>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="" name="status" id="addStatus" required>
                            <option value="0">Please select status of task</option>
                            <option value="1">Open</option>
                            <option value="2">Inprogress</option>
                            <option value="3">Review</option>
                            <option value="4">Done</option>
                        </select>
                    </div>
                    <div class="form-group" id="allEvidences">
                        <label>Evidences</label>
                        <input type="file" id="fileEvidence" name="evidences[]" class="fileEvidence">
                    </div>
                    <div class="form-group">
                        <input type="button" class="btn btn-info" value="More" id="addEvidence">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="button" class="btn btn-success" value="Add" id="addTask">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Edit Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Delete Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body" id="messsageDeleteConfirm">
                    <p>Are you sure you want to delete these Records?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>

                <div class="modal-body" id="messageDeleteValidate" hidden>
                    <b>Please choose some task you want to delete!</b>
                </div>

                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="button" class="btn btn-danger" value="Delete" id="deleteTaskById" onclick="deleteTaskByListId()">
                </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>
