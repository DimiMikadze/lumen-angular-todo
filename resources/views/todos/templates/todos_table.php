<table class="table table-striped" >
    <thead>
    <tr>
        <th>
            Name
            <span class="glyphicon glyphicon-triangle-bottom" ng-click="sortBy('name')"></span>
            <span class="glyphicon glyphicon glyphicon-triangle-top" ng-click="sortBy('-name')"></span>
        </th>
        <th>
            Created
            <span class="glyphicon glyphicon-triangle-bottom" ng-click="sortBy('created_at')"></span>
            <span class="glyphicon glyphicon glyphicon-triangle-top" ng-click="sortBy('-created_at')"></span>
        </th>
        <th>
            Updated
            <span class="glyphicon glyphicon-triangle-bottom" ng-click="sortBy('updated_at')"></span>
            <span class="glyphicon glyphicon glyphicon-triangle-top" ng-click="sortBy('-updated_at')"></span>
        </th>
        <th>
            Completed
            <span class="glyphicon glyphicon-triangle-bottom" ng-click="sortBy('completed')"></span>
            <span class="glyphicon glyphicon glyphicon-triangle-top" ng-click="sortBy('-completed')"></span>
        </th>
        <th>Delete</th>
    </tr>
    </thead>

    <tbody ui-sortable ng-model="todos">
    <tr ng-repeat="todo in todos | filter:search | orderBy: orderBy" class="completed{{ todo.completed }} todo">
        <td ng-click="showEditForm(todo)" class="todo-name">{{ todo.name }}</td>
        <td>{{ todo.created_at | timeAgo }}</td>
        <td>{{ todo.updated_at | timeAgo }}</td>
        <td>
            <input type="checkbox" ng-model="todo.completed" ng-click="complete(todo.id, todo.completed)"/>
        </td>
        <td>
            <form ng-submit="delete(todo)">
                <button type="submit" class="btn btn-danger">delete</button>
            </form>
        </td>
    </tr>
    </tbody>
</table>