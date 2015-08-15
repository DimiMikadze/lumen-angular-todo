<!doctype html>
<html lang="en" ng-app="app">
<head>
    <meta charset="UTF-8">
    <title>Todo App</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/css/main.css"/>
</head>
<body ng-controller="TodosController">

<div class="container main-container">

    <h1 class="pull-left">
        Todos
        <small>All (<span ng-bind="todosCount"></span>) Remaining (<span ng-bind="remaining"></span>)</small>
    </h1>

    <button ng-click="showAddForm()" class="btn btn-success pull-right add-form-button">Add Todo</button>

    <!-- search -->
    <div class="form-group">
        <input type="text" placeholder="filter todos" ng-model="search" class="form-control"/>
    </div>

    <!-- todos table -->
    <todos-table></todos-table>

    <button ng-if="showLoadMoreButton" ng-click="loadMore()" class="btn btn-primary btn-block">Load More</button>

    <!-- Add Edit Form -->

    <div id="add-form-container" ng-show="isVisibleFormContainer">
        <div id="add_todo_form" class="form-group col-xs-10 col-xs-offset-1">
            <span ng-click="hideActionForm()" class="glyphicon glyphicon-remove close-add-form"></span>

                <add-form ng-show="isVisibleAddForm"></add-form>
                <edit-form ng-show="isVisibleEditForm"></edit-form>

        </div>  <!-- end add todo form -->
    </div> <!-- end Add/Update Form -->

</div>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
<script src="/js/app.min.js"></script>
<script>
    angular.module("app").constant("CSRF_TOKEN", '<?php echo csrf_token(); ?>');
</script>

</body>
</html>