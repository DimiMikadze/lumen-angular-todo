<div>
    <h3>Add Todo</h3>
    <br />

    <form ng-submit='addTodo()' name="addForm" novalidate>

        <input type="text" name="name" placeholder="task name" id="form-name" ng-model="name"
               class="form-control" required ng-minlength="5" ng-maxlength="50"/>    <br />

        <span class="form-error" ng-show="addForm.name.$error.required && submitted">Todo name is required</span>
        <span class="form-error" ng-show="addForm.name.$error.minlength && submitted">Minimum 5 characters</span>
        <span class="form-error" ng-show="addForm.name.$error.maxlength && submitted">Maximum 50 characters!</span>

        <textarea rows="6" name="description" placeholder="task content" ng-model="description" class="form-control"/></textarea>  <br />

        <div class="submit-button">
            <img src="images/loading.gif" class="loading-gif" ng-if="showLoading">
            <button type="submit" class="btn btn-success btn-block" ng-if="showSubmitButton">Add</button>
        </div>
    </form>
</div>