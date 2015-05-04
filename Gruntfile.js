module.exports = function(grunt) {

  grunt.initConfig({

    cssmin: {
      index: {
        files: {
          'template/styles/styles.min.css': [

            //CSS files 
            'template/vendor/normalize-css/normalize.css',
            'template/_css/helper/grid.css',
            'template/_css/helper/grid-ie.css',
            'template/_css/helper/helper.css',
            'template/_css/custom.css'
          ]
        }
      }
    },

    uglify: {
      index: {
        src: [
          //JS vendor files
          'template/vendor/enquire/dist/enquire.js',
          'template/vendor/hammerjs/dist/jquery.hammer.js',          
          'template/vendor/jquery.lazyload/jquery.lazyload.js',               
          'template/vendor/picturefill/picturefill.js',

          //JS files 
          'template/_js/custom.js'
        ],
        dest: 'template/scripts/scripts.min.js'
      }
    }

  });

  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-uglify');

  // Default task
  grunt.registerTask('default', ['cssmin','uglify']);

};
