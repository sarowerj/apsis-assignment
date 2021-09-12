@extends('layouts.app')

@section('content')
<div class="container-fluid mainContent dashboardContent">
    <div class="col-xs-12 text-center bg-white loader dashboardTaskLoader">
        Loading...
    </div>

    @foreach($category as $item)
    <h3 class="categoryTitle">{{$item->category_title}}</h3>
    <div class="row {{$item->category_slug}}">FF</div>
    @endforeach
</div>

<!-- Modal -->
<div class="modal fade" id="createNewTask" tabindex="-1" role="dialog" aria-labelledby="createNewTaskLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-xs-4">
                        <h4 class="modal-title" id="createNewTaskLabel">Create New Task</h4>
                    </div>
                    <div class="col-xs-7">
                        <div class="color-pallet">
                            <a href="#" onclick="changeColor('yellow')" class="yellow">
                                <i class="fas fa-sticky-note"></i>
                            </a>
                            <a href="#" onclick="changeColor('green')" class="green">
                                <i class="fas fa-sticky-note"></i>
                            </a>
                            <a href="#" onclick="changeColor('cyan')" class="cyan">
                                <i class="fas fa-sticky-note"></i>
                            </a>
                            <a href="#" onclick="changeColor('purple')" class="purple">
                                <i class="fas fa-sticky-note"></i>
                            </a>
                            <a href="#" onclick="changeColor('magenda')" class="magenda">
                                <i class="fas fa-sticky-note"></i>
                            </a>
                            <a href="#" onclick="changeColor('red')" class="red">
                                <i class="fas fa-sticky-note"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <form id="newTaskForm">
                <input type="hidden" name="color" id="color" value="yellow">
                <div class="modal-body">
                    <div class="form-group">
                        <select name="category" id="category" class="form-control">
                        </select>
                    </div>
                    <div class="form-group">
                        <input required name="task_title" id="task_title" placeholder="Task Title" class="form-control" />
                    </div>
                    <div class="form-group">
                        <textarea required name="task_details" id="task_details" maxlength="300" rows="10" placeholder="Task Details" class="form-control"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <input type="date" required name="task_date" id="task_date" placeholder="Select Date" class="form-control" />
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <input type="time" required name="task_time" id="task_time" placeholder="Select Date" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveTask">Save</button>
                </div>
            </form>
        </div>
    </div>
    @endsection

    @section('footer')

    <script>
        jQuery(document).ready(function() {
            loadDashboardTasks();
            loadAllCategories();

            $("#newTaskForm").submit(function(event) {
                jQuery.ajax({
                        method: "post",
                        url: "/api/task/create",
                        data: jQuery('#newTaskForm').serialize(),
                        beforeSend: function(xhr) {
                            console.log('loading...');
                        }
                    })
                    .done(function(response) {
                        if (response.data) {
                            jQuery('#createNewTask').modal('hide');
                            loadDashboardTasks();
                            resetNewTaskForm();
                        }
                    });
                event.preventDefault();
            });
        })


        function loadDashboardTasks() {
            jQuery('.dashboardContent .row').html('');
            jQuery.ajax({
                    method: "post",
                    url: "/api/task",
                    beforeSend: function(xhr) {
                        jQuery('.dashboardTaskLoader').fadeIn();
                    }
                })
                .done(function(response) {
                    jQuery('.dashboardTaskLoader').hide();
                    if (response.data && response.data.length > 0) {
                        appendTaskInDashboard(response.data);
                    } else {
                        console.log('dashboard is empty');
                    }
                });
        }

        function loadAllCategories() {
            jQuery.ajax({
                    method: "post",
                    url: "/api/category",
                })
                .done(function(response) {
                    if (response.data && response.data.length > 0) {
                        response.data.map(function(item, index) {
                            jQuery('#category').append('<option value="' + item.id + '">' + item.category_title + '</option>');
                        })
                    }
                });
        }

        function appendTaskInDashboard(data) {
            for (i = 0; i < data.length; i++) {
                var currentItem = data[i];
                var item = "<div class='col-xs-3 item'>" +
                    "<div class='panel panel-default " + currentItem.color + "'>" +
                    "<div class='panel-heading'>" + currentItem.task_title + "<br/>" + currentItem.task_deadline + "</div>" +
                    "<div class='panel-body'>" +
                    currentItem.task_details +
                    "</div>" +
                    "</div>";
                jQuery('.dashboardContent .row.' + currentItem.category_slug).append(item);
            }
        }

        function changeColor(color) {
            jQuery('#color').val(color);
            var colorObj = {
                yellow: '#ffff66',
                green: '#92ff8a',
                cyan: '#76d9ff',
                purple: '#c484ed',
                magenda: '#fb5eee',
                red: '#ff2e2e',
            };
            jQuery('#createNewTask .modal-header').css('background', colorObj[color]);
        }

        function resetNewTaskForm() {
            jQuery('#color').val('yellow');
            jQuery('#task_title').val('');
            jQuery('#task_details').val('');
            jQuery('#task_date').val('');
            jQuery('#task_time').val('');
            jQuery('#createNewTask .modal-header').css('background', 'white');
        }
    </script>

    @endsection