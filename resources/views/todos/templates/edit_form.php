<div>
    <h3>Update Todo</h3>

    <br />

    <form ng-submit='updateTodo()' name="updateForm" novalidate >

        <input type="text" name="name" placeholder="task name" id="form-name" ng-model="name"
               class="form-control" required ng-minlength="5" ng-maxlength="50"/>    <br />

        <span class="form-error" ng-show="updateForm.name.$error.required && submitted">Todo name is required</span>
        <span class="form-error" ng-show="updateForm.name.$error.minlength && submitted">Minimum 5 characters</span>
        <span class="form-error" ng-show="updateForm.name.$error.maxlength && submitted">Maximum 50 characters!</span>

        <textarea rows="6" name="description" placeholder="task content" ng-model="description" class="form-control"/></textarea>  <br />

        <div class="checkbox">
            <label for="completed">
                <input type="checkbox" ng-model="completed" name="completed" ng-click="complete(id, completed)"/>
                Completed
            </label>
        </div>

        <br />
        <div class="submit-button">
            <img src="images/loading.gif" class="loading-gif" ng-show="showLoading">
            <button type="submit" class="btn btn-success btn-block" ng-show="showSubmitButton">Update Todo</button>
        </div>

    </form>
</div>