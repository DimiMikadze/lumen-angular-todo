angular.module('directives', [])

.directive('addForm', function() {
    return {
        restrict: "E",
        replace: true,
        templateUrl: "add-form"
    }
})

.directive('editForm', function() {
    return {
        restrict: "E",
        replace: true,
        templateUrl: "edit-form"
    }
})

.directive('todosTable', function() {
    return {
        restrict: "E",
        replace: true,
        templateUrl: "todos-table"
    }
});