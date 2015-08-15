angular.module('app', ['controllers', 'directives'])

// Set CSRF protection on post requests
.config(function($httpProvider, CSRF_TOKEN) {
	$httpProvider.defaults.headers.post['_token']= CSRF_TOKEN;
})

.filter('timeAgo', function() {
   	return function(date) {
    	return moment.utc(date).fromNow();
   	}
});