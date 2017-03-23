module.exports = function(grunt) {

    // 1. All configuration goes here 
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        concat: {   
            dist: {
                src: [
                    'js/libs/*.js', // All JS in the libs folder
                    'js/global-working.js'  // This specific file
                ],
                dest: 'js/global.js',
            }
        }
        ,uglify: {
            build: {
                src: 'js/global.js',
                dest: 'js/global.min.js'
            }
        }
      ,sass: {
          dist: {
                  options: {
                      style: 'compressed'
                  },
                  files: {
                      'style.css': 'sass/style.scss'
                  }
              } 
      }
      ,watch: {
          scripts: {
              files: ['js/*.js'],
              tasks: ['concat', 'uglify'],
              options: {
                  spawn: false,
              },
          }
        ,css: {
          files: ['sass/*.scss', 'sass/*/*.scss'],
          tasks: ['sass'],
          options: {
              spawn: false,
          }
        }
      }


    });

    // 3. Where we tell Grunt we plan to use this plug-in.
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-sass');
  
    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('default', ['concat', 'uglify', 'watch', 'sass']);
  

};