module.exports = function(grunt) {

	grunt.initConfig({
		concat: {
			dist: {
				src: [
					'resources/js/moment.min.js', 'resources/js/main.js', 
					'resources/js/directives.js', 'resources/js/controllers.js'
					],
				dest: 'public/js/app.js',
			},
		},
		uglify: {
			options: {
    			mangle: false
  			},
			my_target: {
				files: {
					'public/js/app.min.js': ['public/js/app.js']
				}
			}
		},
		watch: {
			scripts: {
				files: ['resources/js/**/*.js'],
				tasks: ['concat'],
			},
		},
	});

	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.registerTask('default', ['concat', 'uglify', 'watch']);

};