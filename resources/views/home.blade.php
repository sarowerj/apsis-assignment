@extends('layouts.app')

@section('content')
<div class="container-fluid mainContent dashboardContent">
    <div class="row">
        <div class="col-xs-12 text-center bg-white loader dashboardTaskLoader">
            Loading...
        </div>
    </div>
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
                            <a href="javascript:void(0)" onclick="changeColor('yellow')" class="yellow">
                                <i class="fas fa-sticky-note"></i>
                            </a>
                            <a href="javascript:void(0)" onclick="changeColor('green')" class="green">
                                <i class="fas fa-sticky-note"></i>
                            </a>
                            <a href="javascript:void(0)" onclick="changeColor('cyan')" class="cyan">
                                <i class="fas fa-sticky-note"></i>
                            </a>
                            <a href="javascript:void(0)" onclick="changeColor('purple')" class="purple">
                                <i class="fas fa-sticky-note"></i>
                            </a>
                            <a href="javascript:void(0)" onclick="changeColor('magenda')" class="magenda">
                                <i class="fas fa-sticky-note"></i>
                            </a>
                            <a href="javascript:void(0)" onclick="changeColor('red')" class="red">
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
                        <textarea required name="taskDetails" id="taskDetails" rows="10" placeholder="Task Details" class="form-control"></textarea>
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
                        console.log(response);
                    });
                event.preventDefault();
            });
        })


        function loadDashboardTasks() {
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
                            jQuery('#category').append('<option value="' + item.category_slug + '">' + item.category_title + '</option>');
                        })
                    }
                });
        }

        function appendTaskInDashboard(data) {
            for (i = 0; i < data.length; i++) {
                var currentItem = data[i];
                var item = "<div class='col-xs-3 item'>" +
                    "<div class='panel panel-default " + currentItem.color + "'>" +
                    "<div class='panel-heading'>" + currentItem.task_title + "</div>" +
                    "<div class='panel-body'>" +
                    currentItem.task_details +
                    "</div>" +
                    "</div>" +
                    "< /div>";
                jQuery('.dashboardContent .row').append(item);
            }
        }

        function changeColor(color) {
            jQuery('#color').val(color);
        }
    </script>

    @endsection