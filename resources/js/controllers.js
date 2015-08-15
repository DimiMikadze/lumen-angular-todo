angular.module('controllers', [])

.controller('TodosController', function($scope, $http, $timeout, $filter){

    $scope.submitted = false;
    $scope.isVisibleAddForm = false;
    $scope.isVisibleEditForm = false;
    $scope.isVisibleFormContainer = false;
    $scope.showLoading = false;
    $scope.showSubmitButton = true;
    $scope.showLoadMoreButton = false;

    /**
     *  get all todos
     *  get todos count
     */
    var getTodos = function() {

        $scope.lastpage = 1;

        $http.get('todos', { params: { page:  $scope.lastpage }} )
            .success(function(todos){

                if(todos.todos.current_page !== todos.todos.last_page && todos.todos.last_page !== 0){
                    $scope.showLoadMoreButton = true;
                }

                $scope.todos = todos.todos.data;
                $scope.todosCount = todos.todos.total;
                $scope.currentpage = todos.todos.currentpage;
                $scope.remaining = todos.remaining;
            });

    }

    /**
     * Load More Todos
     */
    $scope.loadMore = function() {

        $scope.lastpage ++;

        $http.get('todos', { params: { page:  $scope.lastpage }} )
            .success(function (data) {
                $scope.todos = $scope.todos.concat(data.todos.data);
                if(data.todos.current_page === data.todos.last_page  && data.todos.last_page !== 0){
                    $scope.showLoadMoreButton = false;
                    return false;
                }
            });
    };

     /**
     * Update Todo
     */
    $scope.updateTodo = function() {

        $scope.submitted = true;

        if( ! $scope.updateForm.$valid) {
            return false;
        }

        for(var i=0; i < $scope.todos.length; i++) {
            if($scope.todos[i].id === $scope.id) {

                var todo = {
                    name: $scope.name,
                    description: $scope.description,
                    completed: $scope.completed,
                    created_at: $scope.todos[i].created_at,
                    updated_at: $filter('timeAgo')(new Date())
                }
                $scope.todos[i] = todo;
            }
        }

        $http.post('update/' + $scope.id, todo);

        getTodos();

        $scope.showSubmitButton = false;
        $scope.showLoading = true;
        $timeout(function(){
            $scope.isVisibleFormContainer = false;
            $scope.showLoading = false;
            $scope.showSubmitButton = true;
            $scope.id = null;
            $scope.name = null;
            $scope.description = null;
            $scope.submitted = false;
        }, 500);

    }

    /**
     * Create Todo
     */
    $scope.addTodo = function() {

        $scope.submitted = true;

        if( ! $scope.addForm.$valid){
            return false;
        }

        var todo = {
            name: $scope.name,
            description: $scope.description,
            completed: false,
            created_at: $filter('timeAgo')(new Date()),
            updated_at: $filter('timeAgo')(new Date())
        };

        document.getElementById("form-name").focus();
        $scope.todos.push(todo);

        $scope.name = "";
        $scope.description = "";

        $http.post('add-todo', todo);
        getTodos();

        $scope.submitted = false;

    }

    /**
     * Delete todo
     */
    $scope.delete = function(todo) {
        $scope.todos.splice( $scope.todos.indexOf(todo), 1 );
        $scope.todosCount--;
        $scope.remaining--;
        $http.post('/todos/delete/' + todo.id);
    }
    /**
     * post complete todo
     */
    $scope.complete = function(id, completed) {

        var c = (completed ? 1 : 0);

        if(c){
            $scope.remaining--;
        } else {
            $scope.remaining++;
        }

        $http.post('/todos/complete/' + id + '/' + c);

    }

    /**
     * Show ADD Form
     */
    $scope.showAddForm = function() {

        $scope.isVisibleFormContainer = true;
        $scope.isVisibleAddForm = true;
        $scope.isVisibleEditForm = false;

    }

    /**
     * show EDIT form
     */
    $scope.showEditForm = function(todo) {

        for(var i=0; i<$scope.todos.length; i++) {
            if($scope.todos[i].id === todo.id) {
                $scope.id = todo.id;
                $scope.name = todo.name;
                $scope.description = todo.description;
                $scope.completed = todo.completed;
            }
        }
        $scope.isVisibleFormContainer = true;
        $scope.isVisibleEditForm = true;
        $scope.isVisibleAddForm = false;

    }
    
    /**
     * hide ADD or EDIT form
     */
    $scope.hideActionForm = function() {
        $scope.submitted = false;
        $scope.showLoading = false;
        $scope.showSubmitButton = true;
        $scope.id = null;
        $scope.name = null;
        $scope.description = null;
        $scope.isVisibleFormContainer = false;

    }

    /**
     * Order todos function
     */
    $scope.orderBy = '-created_at';
    $scope.sortBy = function(order) {
        $scope.orderBy = order;
    }

    /**
     * init Get Todos function
     */
    getTodos();

})