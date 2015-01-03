module.exports = function(grunt) {

	grunt.initConfig({

		sass: {
			dist: {
				options: {
					sourcemap: 'none',
					style: 'expanded'
				},
				files: {
					'style.css': 'sass/style.scss'
				}
			}
		},

		fixindent: {
			scripts: {
				src: [
					'style.css'
				],
				dest: 'style.css',
				options: {
					style: 'tab',
					size: 1
				}
			}
		},

		cssmin: {
			combine: {
				files: {
					'style.min.css': ['style.css']
				}
			}
		},

		uglify: {
			my_target: {
				files: {
					'js/penguin.min.js': ['js/masonry-options.js', 'js/smooth-scroll.js', 'js/navigation.js', 'js/fluidvids.js', 'js/skip-link-focus-fix.js']
				}
			}
		},

		watch: {
			options: {
				livereload: true,
			},
			js: {
				files: ['js/*.js'],
				tasks: ['uglify'],
			},
			css: {
				files: ['sass/**/*.scss'],
				tasks: ['sass', 'fixindent', 'cssmin'],
			},
		}

	});

grunt.loadNpmTasks('grunt-contrib-sass');
grunt.loadNpmTasks('grunt-fixindent');
grunt.loadNpmTasks('grunt-contrib-cssmin');
grunt.loadNpmTasks('grunt-contrib-uglify');
grunt.loadNpmTasks('grunt-contrib-watch');

grunt.registerTask('default', ['watch']);
grunt.registerTask('css', ['sass','fixindent','cssmin']);
grunt.registerTask('js', ['uglify']);

};